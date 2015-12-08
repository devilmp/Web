<?php
	class OrdersInvoicesModel extends CI_Model{
		public function getCurrentInvoiceID(){
			$query = $this->db->get('invoices');
			$inv_id = 1;
			foreach($query->result() as $invoice){
				if((int)$invoice->Inv_ID != $inv_id && (int)$invoice->Inv_ID > 0) return $inv_id;
				else $inv_id++;
			}
			return $inv_id;
		}
		public function loadListOrders(){
			$query = $this->db->query("select * from orders join delivery_information on orders.ord_id = delivery_information.ord_id
			 order by orders.ord_id asc");
			return $query;
		}
		public function loadListInvoices(){
			$query = $this->db->query("select * 
						from invoices INV, orders ORD, delivery_information DI 
						where INV.ord_id = ORD.ord_id and ORD.ord_id = DI.ord_id order by INV.ord_id asc");
			return $query;
		}
		public function loadOrder($id){
			$query = $this->db->query("select * from orders where ord_id = ".$id." order by orders.ord_id asc");
			return $query;
		}
		public function loadDeliveryInformations($ord_id){
			$query = $this->db->query("select *
									    from delivery_information di, areas a, sub_areas sa
									    where di.area_id = a.area_id and di.sa_id = sa.sa_id and di.ord_id = ".$ord_id);
			return $query;
		}
		public function loadOrderDetails($id){
			$query = $this->db->query("select * from orders_details OD join meal M on OD.m_id = M.m_id where ord_id = ".$id);
			return $query;
		}
		public function convertOrderToInvoice($id){
			$order_infor = $this->db->get_where('orders', array('ord_id'=>$id));
			$order = $order_infor->result();
			$totalcost = 0;
			$status = 0;
			foreach ($order as $or) {
				$totalcost = (int) $or->Ord_Cost;
				$status = (int) $or->Ord_Status;
			}
			if($totalcost > 0 && $status == 0){
				$inv_id = $this->getCurrentInvoiceID();
				$data = array(
							'inv_id'=>$inv_id,
							'ord_id'=>$id,
							'emp_id'=>1,
							'inv_cost'=>$totalcost,
							'inv_status'=>0
					);
				$this->db->set('inv_date', 'NOW()', FALSE);
				$this->db->insert('invoices', $data); 
				$result = $this->db->affected_rows();
				if($result > 0) {
					$this->db->query('update orders set ord_status = 1 where ord_id = '.$id);
					return $this->db->affected_rows();
				}
			}
			else return 0;
		}
		public function paidInvoice($id){
			$this->db->query('update invoices set inv_status = 1 where inv_id = '.$id);
			return $this->db->affected_rows();
		}
		public function deleteOrder($id){
			$this->db->where('Ord_ID',$id);
			$this->db->delete('delivery_information');
			if($this->db->affected_rows() >= 0){
				$this->db->where('Ord_ID',$id);
				$this->db->delete('orders_details');
				if($this->db->affected_rows() >= 0){
					$this->db->where('Ord_ID',$id);
					$this->db->delete('invoices');
					if($this->db->affected_rows() >= 0){
						$this->db->where('Ord_ID',$id);
						$this->db->delete('orders');
						return $this->db->affected_rows();
					}
				}
			}
		}
	}