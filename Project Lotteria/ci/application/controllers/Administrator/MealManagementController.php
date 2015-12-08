<?php
	class MealManagementController extends CI_controller
	{
		public function index()
		{
				if(!isset($_SESSION)) session_start();
				if(isset($_SESSION['admin_role'])&&((int) $_SESSION['admin_role']==2||(int) $_SESSION['admin_role']==1)){
					$this->listMeals(1);
				}
				else{
					$_SESSION['announce'] = "You don't have permission to access this page!";
					redirect_back();
				}
		}
		function __construct()
		{
			parent::__construct();
			
			$this->load->library('form_validation');
			$this->load->model('Admin/MealModel');
		}
		public function listMeals($MealPageNumber)
		{
			if(!isset($_SESSION)) session_start();
			$offset = 4; 
			$data['offset'] = $offset;//set the offset
			//load the necessary model
			$this->load->model('Admin/MealModel');

			//set information for customer-list
			$MealpageNum = 1;
			if(isset($MealPageNumber)){
				$MealpageNum = (int) $MealPageNumber;
			}
			$_SESSION['currentMealPosition'] = $MealpageNum;
			$list_meals = $this->MealModel->show_meals();
			$numMealRows = (int) $list_meals->num_rows();
			$NumOfMealPages = (int) ($numMealRows/$offset);
			if($numMealRows%$offset != 0) $NumOfMealPages++;
			$data['numofMealPages'] = $NumOfMealPages;
			$data['list_meal'] = $list_meals->result();
			$this->load->view('Admin/Meals_Management', $data);
		}
		public function Meal_add()
		{
			$this->load->view('Admin/Meals_Management_Add_New');
		}
		public function Meal_delete()
		{
			if(!isset($_SESSION)) session_start();
			$this->load->model('Admin/MealModel');
			if($_SERVER['REQUEST_METHOD'] == 'POST'&&isset($_POST['ckcMeal'])){
				$count = 0;
				$flag = 0;
				foreach ($_POST['ckcMeal'] as $m_id) {
					$count++;
					if($this->MealModel->deleteMeal((int) $m_id) > 0) $flag++;
				}
				if($count != $flag)
					$_SESSION['announce'] = 'Error!';
				else $_SESSION['announce'] = 'Success!';
					redirect_back();
			}
			else{
				$_SESSION['announce'] = 'Please choose first!';
				redirect_back();
			}
		}
		public function show_meal()
		{
			$this->load->model('Admin/MealModel');
			$data['meal_id']=$this->MealModel->show_meal_id();
			$this->load->view('Admin/Meals_Management_Meal_Infor',$data);
		}
		public function InsertMeal()
		{
			if(!isset($_SESSION)) session_start();
 			$manhom=(int)$_POST["sltGroup"];
			$tenmon=$_POST["txtMeal_Name"];
			$gia=$_POST["txtMeal_Price"];
			$sl=$_POST["txtMeal_Stock"];
			$mota=$_POST["txtMeal_Description"];
			$hinhanh=$_FILES['fImage']['name'];
			$this->load->model('Admin/MealModel');
			$this->form_validation->set_rules('txtMeal_Name','required');
			$this->form_validation->set_rules('txtMeal_Price','required');
			$this->form_validation->set_rules('txtMeal_Stock','required');
			$this->form_validation->set_rules('txtMeal_Description','required|min_length[5]|max_length[100]');
			if($this->form_validation->run()==false||!is_numeric($gia)||!is_numeric($sl))	// neu gia tri nhap vao khong hop le
			{
				$_SESSION['announce'] = "Invailid informaion!";
				$this->load->view('Admin/Meals_Management_Add_New');
			}
			else
			{
				//khai bao mang lay thong tin tu form nhap vao
				// chuyen du lieu xuong model
				$addmeal=$this->MealModel->form_insert($manhom,$tenmon,$gia,$sl,$mota,$hinhanh);
				if($addmeal==1)
					$_SESSION['announce'] = "Success!";
				else
					$_SESSION['announce'] = "Fail!";
				$this->listMeals(1);
			}
		}
		public function EditMeal($mamon)
		{
			$manhom=(int)$_POST["sltGroup"];
			$tenmon=$_POST["txtMeal_Name"];
			$gia=$_POST["txtMeal_Price"];
			$sl=$_POST["txtMeal_Stock"];			$mota=$_POST["txtMeal_Description"];
			$this->load->model('Admin/MealModel');
			$this->form_validation->set_rules('txtMeal_Name','required');
			$this->form_validation->set_rules('txtMeal_Price','required');
			$this->form_validation->set_rules('txtMeal_Stock','required');
			$this->form_validation->set_rules('txtMeal_Description','required|min_length[5]|max_length[100]');
			if($this->form_validation->run()==false)	// neu gia tri nhap vao khong hop le
			{
				$_SESSION['announce'] = "Invailid informaion!";
				$this->load->view('Admin/Meals_Management_Add_New');
			}
			else
			{
				//khai bao mang lay thong tin tu form nhap vao
				// chuyen du lieu xuong model
				$editmeal=$this->MealModel->form_edit($mamon, $manhom,$tenmon,$gia,$sl,$mota);
				if($editmeal==1)
					$_SESSION['announce'] = "Success!";
				else
					$_SESSION['announce'] = "Fail!";
				$this->listMeals($_SESSION['currentMealPosition']);
			}
			/*$data=array(
					'ten'=>$this->input->post('txtMeal_Name'),
					'loai'=>$this->select->(int)post('sltGroup'),	
					'gia'=>$this->input->post('txtMeal_Price'),
					'mota'=>$this->textarea->post('txtMeal_Description'),
					'soluong'=>$this->input->post('txtMeal_Stock'),
				); 
				// chuyen du lieu xuong model
			$this->load->model('Admin/Admin_Meal_Model');
			$this->Admin_Meal_Model->form_edit($data);
			$this->load->view('Admin/Meals_Management_Meal_Infor');*/

		}
		public function DeleteMeal()
		{
			$this->load->model('Admin/MealModel');
			$result=$this->MealModel->form_delete();
			if($result>0)
				$_SESSION['announce'] = "Success!";
			else
				$_SESSION['announce'] = "Fail!";
			$this->load->view('Admin/Meals_Management');
		}
		public function show_meal_id()
		{
			$id=$this->uri->segment(3);
			$data['meal']=$this->Admin_Meal_Model->show_meals();
			$data['single_meal']=$this->Admin_Meal_Model->show_meal_id($id);
			$this->load->view('Admin/Meal_Management');

		}
	}
?>