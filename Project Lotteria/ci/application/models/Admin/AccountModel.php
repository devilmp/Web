<?php
	class AccountModel extends CI_Model{
		public function getCurrentAccountID(){
			$query = $this->db->get('employee');
			$emp_id = 1;
			foreach($query->result() as $emp){
				if((int)$emp->Emp_ID != $emp_id && (int)$emp->Emp_ID > 0) return $emp_id;
				else $emp_id++;
			}
			return $emp_id;
		}
		public function Login($Username, $Password){
			$sql = "CALL spLogIn(?, ?, @result)";
			$parameters = array($Username, $Password);
            $this->db->query($sql, $parameters);

            $query = $this->db->query('SELECT @result AS r');
            $row = $query->row();
            if(!empty($row->r))
            {
                return (int) $row->r;
            }
		}
		public function Logout($Username){
			$sql = "CALL spLogOut(?, @result)";
			$parameters = array($Username);
            $this->db->query($sql, $parameters);

            $query = $this->db->query('SELECT @result AS r');
            $row = $query->row();
            if(!empty($row->r))
            {
                return (int) $row->r;
            }
		}
		public function getListCustomerAccount(){
			$query = $this->db->query('select * from customer c, account a
										where c.acc_name = a.acc_name and a.ur_id = 6');
			return $query;
		}
		public function getListEmployeeAccount(){
			$query = $this->db->query('select * from employee c, account a
										where c.acc_name = a.acc_name and a.ur_id != 6 order by emp_id asc');
			return $query;
		}
		public function getListUserRole(){
			$query = $this->db->query('select * from user_role where ur_id between 2 and 5');
			return $query->result();
		}
		public function getEmployeeInfor($emp_id){
			$emp = $this->db->query('select * from employee e, account a
									where e.acc_name = a.acc_name and e.emp_id = '.$emp_id.' order by emp_id asc');
			return $emp->result();
		}
		public function addnewEmployeeAccount($AccName, $Password, $UserRole){
			$data = array(
						   'acc_name' => $AccName,
						   'acc_password' => $Password,
						   'ur_id' => $UserRole,
						   'acc_manager_id' => 'System',
						   'acc_status' => 0
						);
			$this->db->insert('account', $data); 
			return $this->db->affected_rows();
		}
		public function addnewEmployee($Name, $Gender, $Phone, $Birthday, $Address, $Area, $SubArea, $AccName, $Password, $UserRole){
			$emp_id = $this->getCurrentAccountID();
			if((int) $this->addnewEmployeeAccount($AccName, $Password, $UserRole) > 0){
				$data = array(
							   'emp_id' => $emp_id,
							   'emp_name' => $Name,
							   'emp_gender' => $Gender,
							   'emp_birthday' => $Birthday,
							   'emp_address' => $Address,
							   'emp_phone' => $Phone,
							   'area_id' => $Area,
							   'sa_id' => $SubArea,
							   'acc_name' => $AccName
							);
				$this->db->set('emp_joindate', 'NOW()', FALSE);
				$this->db->insert('employee', $data); 
				return $this->db->affected_rows();
			}
		}
		public function updateEmployeeAccount($Acc_Name, $Password, $UserRole){
			$data = array(
							'acc_password' => $Password,
							'ur_id' => $UserRole,
			);
			$this->db->where('acc_name', $Acc_Name);
			$this->db->update('account', $data); 
		return $this->db->affected_rows();
		}
		public function updateEmployee($Emp_ID, $Name, $Gender, $Phone, $Birthday, $Address, $Area, $SubArea, $Password, $UserRole){
			$data = array(
							'emp_name' => $Name,
							'emp_gender' => $Gender,
							'emp_birthday' => $Birthday,
							'emp_address' => $Address,
							'emp_phone' => $Phone,
							'area_id' => $Area,
							'sa_id' => $SubArea
			);
			$this->db->where('emp_id', $Emp_ID);
			$this->db->update('employee', $data); 
			if($this->db->affected_rows() >= 0){
				$emp_acc_name = $this->db->query('select * from employee where emp_id = '.$Emp_ID);
				$acc_name = $emp_acc_name->result();
				$acc = '';
				foreach ($acc_name as $name) {
					$acc = $name->Acc_Name;
				}
				return $this->updateEmployeeAccount($acc, $Password, $UserRole);
			}
			else return -1;
		}
		public function deleteEmpUser($emp_id){
			$sql = "CALL spDeleteUser(?, @result)";
			$parameters = array($emp_id);
            $this->db->query($sql, $parameters);

            $query = $this->db->query('SELECT @result AS r');
            $row = $query->row();
            if(!empty($row->r))
            {
                return (int) $row->r;
            }
		}
		public function deleteCusUser($cus_id){
			$sql = "CALL spDeleteCustomerUser(?, @result)";
			$parameters = array($cus_id);
            $this->db->query($sql, $parameters);

            $query = $this->db->query('SELECT @result AS r');
            $row = $query->row();
            if(!empty($row->r))
            {
                return (int) $row->r;
            }
		}
	}

