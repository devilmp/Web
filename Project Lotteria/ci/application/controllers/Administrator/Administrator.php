<?php
	class Administrator extends CI_Controller{
		public function index(){
			session_start();
			if(isset($_SESSION['admin_account']))
				$this->load->view('Admin/Administrator');
			else
				$this->load->view('Admin/Log-in');
		}
	}
