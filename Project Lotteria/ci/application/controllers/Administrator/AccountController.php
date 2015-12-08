<?php
	class AccountController extends CI_Controller{
		public function index(){
			if(!isset($_SESSION)) session_start();
			if(isset($_SESSION['admin_role'])&&(int) $_SESSION['admin_role']==1){
				$this->listAccount(1, 1);
			}
			else{
				$_SESSION['announce'] = "You don't have permission to access this page!";
				redirect_back();
			}
		}
		public function LogIn(){
			if(!isset($_SESSION)) session_start();
			$this->load->model('Admin/AccountModel');
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$Username = $_POST['txtUsername'];
				$Password = $_POST['txtPassword'];
				$result = $this->AccountModel->Login($Username, $Password);
				if((int) $result > 0){
					if((int) $result != 6){
						$_SESSION['admin_account'] = $Username;
						$_SESSION['admin_role'] = (int) $result;
						$this->load->view('Admin/Administrator');
					}
					else{
						$data['announce'] = "You don't have permission to log in!";
						$this->load->view('Admin/Log-in', $data);
					}
				}
				else{
					if((int) $result == 0){
						if(isset($_SESSION['admin_account'])) $this->load->view('Admin/Administrator');
						else{
							$data['announce'] = 'This account is log-in at another place!';
							$this->load->view('Admin/Log-in', $data);
						}
					}
					else{
						$data['announce'] = 'Wrong username or password!';
						$this->load->view('Admin/Log-in', $data);
					}
				}
			}
			else {
				if(isset($_SESSION['admin_account'])){
					$data['announce'] = "You don't have permission to access this page!";
					$this->load->view('Admin/Administrator');
				} 
				else{
				 	$data['announce'] = 'Please login first!';
				 	$this->load->view('Admin/Log-in', $data);
				}
			}
		}
		public function LogOut(){
			if(!isset($_SESSION)) session_start();
			$this->load->model('Admin/AccountModel');
			if($this->AccountModel->Logout($_SESSION['admin_account'])){
				unset($_SESSION['admin_account']);
				unset($_SESSION['admin_role']);
				if($_SERVER['REQUEST_METHOD'] != 'POST') $this->load->view('Admin/Log-in');
			}
			else redirect_back();
		}
		public function listAccount($AccountCustomerPageNumber=1, $AccountEmpPageNumber=1){
			if(!isset($_SESSION)) session_start();
			$offset = 2; //both of orders and invoices list have the same offset
			$data['offset'] = $offset;//set the offset
			//load the necessary model
			$this->load->model('Admin/AccountModel');

			//set information for customer-list
			$CustomerpageNum = 1;
			if(isset($AccountCustomerPageNumber)){
				$CustomerpageNum = (int) $AccountCustomerPageNumber;
			}
			$_SESSION['currentCustomerPosition'] = $CustomerpageNum;
			$accounts_customer = $this->AccountModel->getListCustomerAccount();
			$data['list_customers'] = $accounts_customer->result();
			$numCustomerRows = (int) $accounts_customer->num_rows();
			$NumOfCustomerPages = (int) ($numCustomerRows/$offset);
			if($numCustomerRows%$offset != 0) $NumOfCustomerPages++;
			$data['numofCustomerPages'] = $NumOfCustomerPages;

			//set information for employee-list
			$EmployeepageNum = 1;
			if(isset($AccountEmpPageNumber)){
				$EmployeepageNum = (int) $AccountEmpPageNumber;
			}
			$_SESSION['currentEmployeePosition'] = $EmployeepageNum;
			$accounts_employee = $this->AccountModel->getListEmployeeAccount();
			$data['list_employees'] = $accounts_employee->result();
			$numEmpRows = (int) $accounts_employee->num_rows();
			$NumOfEmpPages = (int) ($numEmpRows/$offset);
			if($numEmpRows%$offset != 0) $NumOfEmpPages++;
			$data['numofEmpPages'] = $NumOfEmpPages;


			$this->load->view('Admin/Account_Management', $data);
		}
		public function AccountInforPage(){
			$this->load->model('AreaModel');
			$this->load->model('Admin/AccountModel');
			if(!isset($_SESSION)) session_start();
			if($_SERVER['REQUEST_METHOD'] == 'GET'){
				$data['areas'] = $this->AreaModel->loadAreas();
				$data['sub_areas'] = $this->AreaModel->loadSubAreas(1);
				$data['user_role'] = $this->AccountModel->getListUserRole();
				$this->load->view('Admin/Accounts_Management_Add_New', $data);
			}
			else{
				$Name = $_POST['txtName'];
				$Gender = (int) $_POST['sltGender'];
				$Phone = $_POST['txtPhone'];
				$Birthday = $_POST['dtBirthday'];
				$Address = $_POST['txtAddress'];
				$Area = (int) $_POST['sltArea'];
				$SubArea = (int) $_POST['sltSubArea'];
				$AccName = $_POST['txtUsername'];
				$Password = $_POST['txtPassword'];
				$UserRole = (int) $_POST['sltRole'];
				if($Name == '' || $Address == '' || $Phone == '' || $AccName == ''){
				 	$_SESSION['announce'] = 'You missed some fields!';
					redirect_back();
				}
				else{
					if($this->AccountModel->addnewEmployee($Name, $Gender, $Phone,
					 	$Birthday, $Address, $Area, $SubArea, $AccName, $Password, $UserRole) > 0){
					 	$_SESSION['announce'] = 'Success';
						redirect_back();
					}
				}
			}
		}
		public function AccountEditInforPage($emp_id){
			$this->load->model('AreaModel');
			$this->load->model('Admin/AccountModel');
			if(!isset($_SESSION)) session_start();
			if($_SERVER['REQUEST_METHOD'] == 'GET'){
				$data['areas'] = $this->AreaModel->loadAreas();
				$area_id = 1;
				$employee = $this->AccountModel->getEmployeeInfor($emp_id);
				foreach ($employee as $emp) {
					$area_id = (int) $emp->Area_ID;
				}
				$data['sub_areas'] = $this->AreaModel->loadSubAreas($area_id);
				$data['employee'] = $employee;
				$data['user_role'] = $this->AccountModel->getListUserRole();
				$this->load->view('Admin/Account_Management_Edit', $data);
			}
			else{
				$Emp_ID = (int) $emp_id;
				$Name = $_POST['txtName'];
				$Gender = (int) $_POST['sltGender'];
				$Phone = $_POST['txtPhone'];
				$Birthday = $_POST['dtBirthday'];
				$Address = $_POST['txtAddress'];
				$Area = (int) $_POST['sltArea'];
				$SubArea = (int) $_POST['sltSubArea'];
				$Password = $_POST['txtPassword'];
				$UserRole = (int) $_POST['sltRole'];
				if($Name == '' || $Address == '' || $Phone == '' || $Password == ''){
				 	$_SESSION['announce'] = 'You missed some fields!';
					redirect_back();
				}
				else{
					$result = $this->AccountModel->updateEmployee($Emp_ID, $Name, $Gender, $Phone,
					 $Birthday, $Address, $Area, $SubArea, $Password, $UserRole);
					if($result >= 0){
					 	$_SESSION['announce'] = 'Success';
					}
					else $_SESSION['announce'] = 'Fail to update this employee!';
					redirect_back();
				}
			}
		}
		public function deleteMultipleEmp(){
			if(!isset($_SESSION)) session_start();
			$this->load->model('Admin/AccountModel');
			if($_SERVER['REQUEST_METHOD'] == 'POST'&&isset($_POST['ckcEmp'])){
				$count = 0;
				$flag = 0;
				foreach ($_POST['ckcEmp'] as $emp_id) {
					$count++;
					if($this->AccountModel->deleteEmpUser((int) $emp_id) > 0) $flag++;
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
		public function deleteEmpAccount($emp_id){
			if(!isset($_SESSION)) session_start();
			$this->load->model('Admin/AccountModel');
			if($this->AccountModel->deleteEmpUser((int) $emp_id) > 0){
				 	$_SESSION['announce'] = 'Success';
			}
			else $_SESSION['announce'] = 'Fail to delete this employee!';
			redirect_back();
		}
		public function deleteCusAccount($cus_id){
			if(!isset($_SESSION)) session_start();
			$this->load->model('Admin/AccountModel');
			if($this->AccountModel->deleteCusUser((int) $cus_id) > 0){
				 	$_SESSION['announce'] = 'Success';
			}
			else $_SESSION['announce'] = 'Fail to delete this customer!';
			redirect_back();
		}
		public function deleteMultipleCus(){
			if(!isset($_SESSION)) session_start();
			$this->load->model('Admin/AccountModel');
			if($_SERVER['REQUEST_METHOD'] == 'POST'&&isset($_POST['ckcCus'])){
				$count = 0;
				$flag = 0;
				foreach ($_POST['ckcCus'] as $cus_id) {
					$count++;
					if($this->AccountModel->deleteCusUser((int) $cus_id) > 0) $flag++;
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
	}