<?php
	class OrdersInvoicesController extends CI_Controller{
		public function index(){
			if(!isset($_SESSION)) session_start();
			if(isset($_SESSION['admin_role'])&&((int) $_SESSION['admin_role']==3||(int) $_SESSION['admin_role']==1)){
				$this->OrderInvoicesList(1, 1);
			}
			else{
				$_SESSION['announce'] = "You don't have permission to access this page!";
				redirect_back();
			}
		}
		public function OrderInvoicesList($OrderPageNumber=1, $InvoicePageNumber=1){
			if(!isset($_SESSION)) session_start();
			$offset = 2; //both of orders and invoices list have the same offset
			$data['offset'] = $offset;//set the offset
			//load the necessary model
			$this->load->model('Admin/OrdersInvoicesModel');

			//set information for order-list
			$OrderpageNum = 1;
			if(isset($OrderPageNumber)){
				$OrderpageNum = (int) $OrderPageNumber;
			}
			$_SESSION['currentOrderPosition'] = $OrderpageNum;
			$orders_list = $this->OrdersInvoicesModel->loadListOrders();
			$data['list_orders'] = $orders_list->result();
			$numOrderRows = (int) $orders_list->num_rows();
			$NumOfOrderPages = (int) ($numOrderRows/$offset);
			if($numOrderRows%$offset != 0) $NumOfOrderPages++;
			$data['numofOrderPages'] = $NumOfOrderPages;

			//set information for invoice-list
			$InvoicepageNum = 1;
			if(isset($InvoicePageNumber)){
				$InvoicepageNum = (int) $InvoicePageNumber;
			}
			$_SESSION['currentInvoicePosition'] = $InvoicepageNum;
			$invoices_list = $this->OrdersInvoicesModel->loadListInvoices();
			$data['list_invoices'] = $invoices_list->result();
			$numInvoicesRows = (int) $invoices_list->num_rows();
			$NumOfInvoicePages = (int) ($numInvoicesRows/$offset);
			if($numInvoicesRows%$offset != 0) $NumOfInvoicePages++;
			$data['numofInvoicePages'] = $NumOfInvoicePages;


			$this->load->view('Admin/Orders_Invoices_Management', $data);
		}
		public function OrderEdit(){
			$this->load->view('Admin/Orders_Invoices_Management_Edit_Order');
		}
		public function OrderInfor($ord_id){
			//load the necessary model
			$this->load->model('Admin/OrdersInvoicesModel');
			$id = (int) $ord_id;
			$data['order'] = $this->OrdersInvoicesModel->loadOrder($id)->result();
			$data['del_infor'] = $this->OrdersInvoicesModel->loadDeliveryInformations($id)->result();
			$data['order_details'] = $this->OrdersInvoicesModel->loadOrderDetails($id)->result();
			$this->load->view('Admin/Orders_Invoices_Management_Order_Infor', $data);
		}
		public function ConfirmOrder($ord_id){
			//load the necessary model
			$this->load->model('Admin/OrdersInvoicesModel');
			$id = (int) $ord_id;
			$this->OrdersInvoicesModel->convertOrderToInvoice($id);
			redirect_back();
		}
		public function Payment($inv_id){
			//load the necessary model
			$this->load->model('Admin/OrdersInvoicesModel');
			$id = (int) $inv_id;
			$this->OrdersInvoicesModel->paidInvoice($id);
			redirect_back();
		}
		public function DeleteMultipleOrders(){
			if(!isset($_SESSION)) session_start();
			$this->load->model('Admin/OrdersInvoicesModel');
			if($_SERVER['REQUEST_METHOD'] == 'POST'&&isset($_POST['ckcOrder'])){
				$count = 0;
				$flag = 0;
				foreach ($_POST['ckcOrder'] as $ord_id) {
					$count++;
					if($this->OrdersInvoicesModel->deleteOrder((int) $ord_id) > 0) $flag++;
				}
				if($count != $flag)
					$_SESSION['announce'] = 'Error!';
				else $_SESSION['announce'] = 'Success!';
				redirect_back();
			}
			else{
				$_SESSION['announce'] = 'Please choose first!';
				redirect_back();
			}
		}
		public function DeleteOrder($id){
			if(!isset($_SESSION)) session_start();
			$this->load->model('Admin/OrdersInvoicesModel');
			$result=$this->OrdersInvoicesModel->deleteOrder($id);
			$this->OrderInvoicesList(1, 1);
		}
		public function printInvoice($ord_id){
			//load the necessary model
			$this->load->model('Admin/OrdersInvoicesModel');
			$id = (int) $ord_id;
			$data['order'] = $this->OrdersInvoicesModel->loadOrder($id)->result();
			$data['del_infor'] = $this->OrdersInvoicesModel->loadDeliveryInformations($id)->result();
			$data['order_details'] = $this->OrdersInvoicesModel->loadOrderDetails($id)->result();
			$this->load->view('Admin/printInvoice', $data);
		}
	}
