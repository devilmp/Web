<?php
	class MealsController extends CI_Controller{
		public function index(){
		}
		public function search(){
			$this->load->model('MealsModel');
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$interest = $_POST['information'];
				$data['group_name'] = 'Search';
				$data['list_meals'] = $this->MealsModel->loadMealsByInfor($interest);
				$this->load->view('Menu',$data);
			}
			else{
				$data['result'] = 'Vui lòng nhập thông tin tìm kiếm trước!';
				$data['back'] = 'http://localhost:8080/ci/index.php/Lotteria';
				$data['linkTitle'] = 'Back to previous page';
				$this->load->view('LotteriaAnnouncement', $data);
			}
		}
	}