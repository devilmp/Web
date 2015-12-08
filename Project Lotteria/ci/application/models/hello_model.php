<?php if ( ! defined('BASEPATH')) exit('No direct script access allow');
	class Hello_Model extends CI_Model{
		public function getProfile($name){
			return array("fullName" => "Phương Duy", "age" => 21);
		}
	}