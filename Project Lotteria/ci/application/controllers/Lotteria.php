<?php
	class Lotteria extends CI_Controller{
		public function index(){
			$this->load->view('Home');
		}
		public function ShoppingCart(){
			
			$this->load->view('ShoppingCart');
		}
		public function Member(){
			
			$this->load->view('Member');
		}
		public function Promotion(){
			
			$this->load->view('Promotion');
		}
		public function Introduction(){
			
			$this->load->view('Introduction');
		}
		public function Contact(){
			$this->load->view('Contact');
		}
		public function News(){
			$this->load->view('News');
		}
		public function Menu($group_name){
			$this->load->model('MealsModel');
			$meal_group = $this->MealsModel->loadMealGroup(strtoupper($group_name));
			$data['list_meals'] = $this->MealsModel->loadMenu($meal_group);
			$data['list_image_ui'] = $this->MealsModel->loadMenuImageUI($meal_group);
			$data['group_name'] = $group_name;
			$this->load->view('Menu',$data);
		}
		public function MealDetails($meal_id){
			$this->load->model('MealsModel');
			$data['meal'] = $this->MealsModel->loadMealDetails((int)$meal_id);
			$this->load->view('ItemDetails',$data);
		}
	}