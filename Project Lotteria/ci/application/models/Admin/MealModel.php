<?php
	class MealModel extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->database();

		}
		public function getCurrentID(){
			$query = $this->db->get('meal');
			$M_id = 1;
			foreach($query->result() as $meal){
				if((int)$meal->M_ID != $M_id) return $M_id;
				else $M_id++;
			}
			return $M_id;
		}		
		public function show_meals()
		{
			$this->db->select('*');
			$this->db->from('meal');
			$this->db->join('mealgroup', 'meal.mg_id = mealgroup.mg_id');
			$query = $this->db->get();
			 if ($query->num_rows() > 0)
			{
			  	return $query;
			}
			else
			{
				$data['result']='No data';
				return $data;
			}
		}
		public function show_meal_id()
		{
			$id=$_GET['id'];
			$this->db->select('*');
			$this->db->from('meal');
			$this->db->join('mealgroup', 'meal.mg_id = mealgroup.mg_id');
			$this->db->where('M_ID',$id);
			$query = $this->db->get();
			 if ($query->num_rows() > 0)
			{
			  	return $query->result();
			}
			else
			{
				$data['result']='No data';
				return $data;
			}
		}
		public function getImageDir($manhom){
			$query = $this->db->get_where('mealgroup', array('mg_id' => $manhom));
			foreach ($query->result() as $mg) {
				return $mg->MG_FolderImage;
			}
		}
		public function form_insert($manhom,$tenmon,$gia,$sl,$mota,$hinhanh)
		{
			$M_id=$this->getCurrentID();
			$group_image_path = $this->getImageDir($manhom);
			$image_full_path = '';
			if($hinhanh == ''||!isset($hinhanh)) $image_full_path = 'image/Menu/Chicken/finger-chicken-200-g.png';
			else $image_full_path = $group_image_path.'/'.$hinhanh;
			$data = array(
						   'M_ID' => $M_id,
						   'M_Name' => $tenmon,
						   'MG_ID' => $manhom,
						   'M_Price' => $gia,
						   'M_Stock' => $sl,
						   'M_Description' => $mota,
						   'M_Image' => $image_full_path
						);
			$this->db->insert('meal',$data);
			$upload_directory = realpath(APPPATH.'../assets/'.$group_image_path);
			$config = array('allowed_types' => 'jpg|jpeg|gif|png', 'upload_path' => $upload_directory);
			$this->load->library('upload', $config);
			$this->upload->do_upload('fImage');
			return $this->db->affected_rows();
		}
		public function form_edit($mamon, $manhom,$tenmon,$gia,$sl,$mota)
		{
			$data = array(
						   'M_Name' => $tenmon,
						   'MG_ID' => $manhom,
						   'M_Price' => $gia,
						   'M_Description' => $mota
						);
			$this->db->where('m_id', $mamon);
			$this->db->update('meal',$data);
			$result = (int) $this->db->affected_rows();
			if($result >= 0){
				$sql = "CALL spUpdateMealStock(?, ?, @result)";
				$parameters = array($mamon, $sl);
	            $this->db->query($sql, $parameters);

	            $query = $this->db->query('SELECT @result AS r');
	            $row = $query->row();
	            if(!empty($row->r))
	            {
	                return (int) $row->r;
	            }
			}
		}
		public function form_deleteall()
		{
			$this->db->empty_table('meal');
		}
		public function form_delete()
		{
			$id=$_GET['id'];
			$this->db->where('M_ID',$id);
			$this->db->delete('meal');
			return $this->db->affected_rows();
		}
		public function deleteMeal($id)
		{
			$this->db->where('M_ID',$id);
			$this->db->delete('meal');
			return $this->db->affected_rows();
		}
	}
?>