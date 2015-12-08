<?php
	class MealsModel extends CI_Model{
		//get the id 
		public function loadMealGroup($group_name){
			$query = $this->db->get_where('mealgroup', array('mg_name_eng' => $group_name));
			foreach($query->result() as $mg_id){
				return $mg_id->MG_ID;
			}
		}
		public function loadMenu($meal_group){
			$query = $this->db->get_where('meal', array('mg_id' => $meal_group));
			return $query->result();
		}
		public function loadMenuImageUI($meal_group){
			$query = $this->db->get_where('mealgroupimageui', array('mg_id' => $meal_group));
			return $query->result();
		}
		public function loadMealDetails($meal_id){
			$this->db->select('*');
			$this->db->from('meal');
			$this->db->join('mealgroup', 'meal.mg_id = mealgroup.mg_id');
			$this->db->where('meal.m_id', $meal_id);
			$query = $this->db->get();
			return $query->result();
		}
		public function loadMeal($list_meal){
			$query = 'select * from meal where';
			$last_key = (int) key(array_slice($list_meal, -1, 1, TRUE));
			do{
				$meal_id = (int) key($list_meal);
				$query = $query.' m_id = '.$meal_id;
				if($meal_id != $last_key) $query = $query.' or ';
				next($list_meal);
			}while($meal_id = key($list_meal));
			$table = $this->db->query($query);
			return $table->result();
		}
		public function loadMealsByInfor($infor){
			$query = null;
			if(is_numeric($infor)){
				$query = $this->db->get_where('meal', array('m_price' => $infor));
			}
			else{
				$sql = "select * from meal join mealgroup on meal.mg_id = mealgroup.mg_id
						where
						LOWER(meal.m_name) like LOWER('$infor') or 
						LOWER(mealgroup.mg_name_eng) like LOWER('$infor') or
						LOWER(mealgroup.mg_name) like LOWER('$infor')";
				$query = $this->db->query($sql);
			}
			return $query->result();
		}
	}
?>