<?php
	class AreaModel extends CI_Model{
		public function loadAreas(){
			$query = $this->db->get('areas');
			return $query->result();
		}
		public function loadSubAreas($area_id){
			$query = $this->db->get_where('sub_areas', array('area_id' => $area_id));
			return $query->result();
		}
	}