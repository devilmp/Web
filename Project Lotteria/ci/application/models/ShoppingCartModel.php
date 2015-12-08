<?php 
	class ShoppingCartModel extends CI_Model{
		public function getCurrentOrderID(){
			$query = $this->db->get('orders');
			$ord_id = 1;
			foreach($query->result() as $order){
				if((int)$order->Ord_ID != $ord_id && (int)$order->Ord_ID > 0) return $ord_id;
				else $ord_id++;
			}
			return $ord_id;
		}
		public function createNewOrder($cus_id){
			$ord_id = $this->getCurrentOrderID();
			$data = array(
						   'ord_id' => $ord_id,
						   'cus_id' => $cus_id,
						   'ord_cost' => 0,
						   'ord_status' => 0
						);
			$this->db->set('ord_date', 'NOW()', FALSE);
			$this->db->insert('orders', $data); 
			return $ord_id;
		}
		public function updateOrder($ord_id, $m_id, $quantities){
			$sql = "CALL spOrderDetails(?, ?, ?, @result)";
			$parameters = array($quantities, $ord_id, $m_id);
            $this->db->query($sql, $parameters);

            $query = $this->db->query('SELECT @result AS r');
            $row = $query->row();
            if(!empty($row->r))
            {
                return (int) $row->r;
            }
		}
		public function updateDeliveryInfor($Ord_ID, $Name, $Address, $Area, $SubArea, $Phone, $Email){
			$data = array(
						   'ord_id' => $Ord_ID,
						   'del_name' => $Name,
						   'del_phone' => $Phone,
						   'del_email' => $Email,
						   'del_address' => $Address,
						   'sa_id' => $SubArea,
						   'area_id' => $Area
						);
			$this->db->insert('delivery_information', $data); 
			return $this->db->affected_rows();
		}
		public function deleteOrder($order_id){
			$sql = "CALL spDeleteOrder(?, @result)";
			$parameters = array($order_id);
            $this->db->query($sql, $parameters);

            $query = $this->db->query('SELECT @result AS r');
            $row = $query->row();
            if(!empty($row->r))
            {
                return (int) $row->r;
            }
		}
	}