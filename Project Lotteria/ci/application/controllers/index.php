<?php
	class Controller extends CI_Controller{
		public function Load($pageName){
			$this->load->view($pageName);
		}
	}