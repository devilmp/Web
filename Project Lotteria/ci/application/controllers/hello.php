<?php if ( ! defined('BASEPATH')) exit('No direct script access allow');
	class Hello extends CI_Controller{
		//this is contructor
		public function __construct(){
			parent::__construct();
			echo "Constructor <br>";
		}
		//index method is require when you want to call this page without calling method
		public function index(){
			echo "This is index";
			/*Example: http://localhost:8080/ci/index.php/hello
				=> Constructor 
					This is index
			*/
		}
		//test a method without parameter
		public function TestNoPara(){
			echo 'Hello';
		}
		//test a method with parameters
		public function TestWithPara($a1, $b2){//the name of parameter can be anything, as long as follow $
			echo "Para 1: $a1 Para 2: $b2";
			/* example how to call on browser: http://localhost:8080/ci/index.php/hello/TestWithPara/dkm/vkl
				result: Para 1: dkm Para 2: vkl
				- Can pass anything throught this 2 parameter but can not miss any parameter unless that parameter(s) has/have 
					default value (see the next function)
			*/
		}
		//test a method with parameters and default value
		public function TestWithPara1($a1="dkm", $b2=10){//the default value can be any thing (string, number, bit...)
			echo "Para 1: $a1 Para 2: $b2";
			/* this method can be call like this: http://localhost:8080/ci/index.php/hello/TestWithPara1
				result: Para 1: dkm Para 2: 10
			*/
		}

		//test call view method without parameter
		public function CallView(){
			$this->load->view("one");//one is the name of php file in view folder
			/* example: http://localhost:8080/ci/index.php/hello/CallView
				=>  Constructor 
					This is view
				- Note: Because of the constructor echo "Constructor"
			*/
		}
		public function CallViewWithPara($name){// parameter $name is from url
			$data = array("This_Is_The_Variable_To_Call_In_View" => $name);
			$this->load->view('one', $data);
			/* example: http://localhost:8080/ci/index.php/hello/CallViewWithPara/Phuong
				=>  Constructor 
					This is view

					Chào Phuong
			*/
		}
		public function TestModel($name){
			$this->load->model("hello_model");//hello_model is hello_model.php
			$profile = $this->hello_model->getProfile("Phuong");//getProfile is a method of hello_model.php
			$data = array('This_Is_The_Variable_To_Call_In_View' => $name);
			$data['profile'] = $profile;
			$this->load->view('one',$data);
		}
	}
?>