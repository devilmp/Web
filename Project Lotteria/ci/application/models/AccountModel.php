<?php
	class AccountModel extends CI_Model{
		public function getCurrentID(){
			$query = $this->db->get('customer');
			$cus_id = 0;
			foreach($query->result() as $customer){
				if((int)$customer->Cus_ID != $cus_id) return $cus_id;
				else $cus_id++;
			}
			return $cus_id;
		}
		public function checkLogin($Username, $Password){
			$query = $this->db->get_where('account', array('acc_name' => $Username, 'acc_password' => $Password));
			return $query->num_rows();
		}
		public function insertCustomer($Name, $Gender, $Email, $Phone, $Birthday, $Address, $GetOption, $Message, $Username){
			$cus_id = $this->getCurrentID();
			$data = array(
						   'cus_id' => $cus_id,
						   'cus_name' => $Name,
						   'cus_gender' => $Gender,
						   'cus_email' => $Email,
						   'cus_phone' => $Phone,
						   'cus_birthday' => $Birthday,
						   'cus_address' => $Address,
						   'cus_id_card_receivemethod' => $GetOption,
						   'cus_message' => $Message,
						   'acc_name' => $Username
						);
			$this->db->insert('customer', $data); 
			return $this->db->affected_rows();
		}
		public function insertAccount($Username, $Password){
			$sql = "CALL spSignIn(?, ?, @result)";
			$parameters = array($Username, $Password);
            $this->db->query($sql, $parameters);

            $query = $this->db->query('SELECT @result AS r');
            $row = $query->row();
            if(!empty($row->r))
            {
                return (int) $row->r;
            }
		}
		public function getCustomerByAccount($Username){
			$query = $this->db->get_where('customer', array('acc_name' => $Username));
			return $query->result();
		}
	}