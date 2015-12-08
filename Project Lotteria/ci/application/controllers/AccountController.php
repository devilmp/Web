<?php
	class AccountController extends CI_Controller{
		public function index(){
		}
		public function Register(){
			$Name = $_POST["txtName"];
			$Gender = (int)$_POST["rdGender"];
			$Email = $_POST["txtEmail"];
			$Phone = $_POST["txtPhone"];
			$Birthday = $_POST["dtBirthday"];
			$Address = $_POST["txtAddress"];
			$Username = $_POST["txtUsername"];
			$Password = $_POST["txtPassword"];
			$GetOption = (int)$_POST["rdGetOption"];
			$Message = $_POST["txtMessage"];
			$this->load->model('AccountModel');
			if((int) $this->AccountModel->insertAccount($Username, $Password) == 1){
				$addCustomer = $this->AccountModel->insertCustomer($Name, $Gender, $Email, $Phone, $Birthday,
				 $Address, $GetOption, $Message, $Username);
				if($addCustomer == 1)
					$data['result'] = 'Success';
				else $data['result'] = 'Fail';
			}
			else $data['result'] = 'This account is already existed!';
			$data['back'] = 'http://localhost:8080/ci/index.php/Lotteria';
			$data['linkTitle'] = 'Back to home page';
			$this->load->view('LotteriaAnnouncement', $data);
		}
		public function Login(){
			session_start();
			$Username = $_POST["txtUsername"];
			$Password = $_POST["txtPassword"];
			$this->load->model('AccountModel');
			if($this->AccountModel->checkLogin($Username, $Password) == 0){
				$data['result'] = 'Wrong username or password';
				$data['back'] = base_url().'index.php/Lotteria';
				$data['linkTitle'] = 'Back to home page';
				$this->load->view('LotteriaAnnouncement', $data);
			}
			else{
				$_SESSION["username"] = $Username; 
				$this->load->helper('url');
				redirect_back();
			}
		}
		public function Logout(){
			session_start();
			unset($_SESSION["username"]);
			$this->load->helper('url');
			redirect_back();
		}
	}