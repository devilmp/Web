<?php
	class AreaController extends CI_Controller{
		public function viewSubAreas(){
			$this->load->model('AreaModel');
			$task = $_POST['task'];
			if($task == 'view'){
				$area_id = (int) $_POST['id'];
				$sub_areas = $this->AreaModel->loadSubAreas($area_id);
				$result = "";
				$count = 0;
				foreach ($sub_areas as $sub_area) {
					if($count == 0){
						$result = $result."<option value='".($sub_area->SA_ID)."' selected>".($sub_area->SA_Name)."</option>";
						$count++;
					}
					else $result = $result."<option value='".($sub_area->SA_ID)."'>".($sub_area->SA_Name)."</option>";
				}
				echo $result;
			}
		}
	}