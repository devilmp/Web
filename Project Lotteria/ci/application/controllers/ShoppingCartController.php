<?php
	class ShoppingCartController extends CI_Controller{
		public function index(){
		}
		public function updateCart(){
			session_start();
			$count = 0;
			$meal_id = (int) $_POST['id'];
			$task = $_POST['task'];
			if($task == 'add'){
				if(isset($_SESSION['shoppingcart'])){
					if(isset($_SESSION['shoppingcart'][$meal_id]))
						$_SESSION['shoppingcart'][$meal_id]++;
					else $_SESSION['shoppingcart'][$meal_id] = 1;
				}
				else{
					$_SESSION['shoppingcart'][$meal_id] = 1;
				} 
				foreach ($_SESSION['shoppingcart'] as $item) {
					$count += $item;
				}
				echo $count;
			}
			else{
				if($task == 'decrease'){
					$_SESSION['shoppingcart'][$meal_id]--;
					if($_SESSION['shoppingcart'][$meal_id] < 0) $_SESSION['shoppingcart'][$meal_id] = 0;
					foreach ($_SESSION['shoppingcart'] as $item) {
						$count += $item;
					}
					$output =  array('item_quantities'=>$_SESSION['shoppingcart'][$meal_id],
                 'total'=>$count);
					echo json_encode($output,JSON_FORCE_OBJECT);
				}
				else{
					if($task == 'increase'){
						$_SESSION['shoppingcart'][$meal_id]++;
						foreach ($_SESSION['shoppingcart'] as $item) {
							$count += $item;
						}
						$output =  array('item_quantities'=>$_SESSION['shoppingcart'][$meal_id],
	                 'total'=>$count);
						echo json_encode($output,JSON_FORCE_OBJECT);
					}
					else{
						$_SESSION['shoppingcart'][$meal_id] = 0;
						foreach ($_SESSION['shoppingcart'] as $item) {
							$count += $item;
						}
						echo $count;
					}
				}
			}
		}
		public function viewCart(){
			session_start();
			$this->load->model('MealsModel');
			$this->load->model('AreaModel');
			$data = null;
			if(isset($_SESSION['shoppingcart'])){
				$data['list_items'] = $this->MealsModel->loadMeal($_SESSION['shoppingcart']);
			}
			$data['list_areas'] = $this->AreaModel->loadAreas();
			$data['sub_area'] = $this->AreaModel->loadSubAreas(1);
			$this->load->view('ShoppingCart',$data);
		}
		public function checkout(){
			session_start();
			$this->load->model('AccountModel');
			$this->load->model('ShoppingCartModel');
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				//get customer's information
				$Name = $_POST['txtName'];
				$Address = $_POST['txtAddress'];
				$Area = (int) $_POST['sltArea'];
				$SubArea = (int) $_POST['sltSubArea'];
				$Phone = $_POST['txtPhone'];
				$Email = $_POST['txtEmail'];
				$Cus_ID = 0;

				//check if customer is logging in
				if(isset($_SESSION["username"])){
					$Username = $_SESSION["username"];
					$Customers = $this->AccountModel->getCustomerByAccount($Username);
					foreach($Customers as $Customer) $Cus_ID = (int) $Customer->Cus_ID;
				}
				//create new order and get that order'd id
				$ord_id = (int) $this->ShoppingCartModel->createNewOrder($Cus_ID);
				$result = 0;
				$data['result'] = 'Hoàn tất!';
				if(isset($ord_id)){
					$result = $this->ShoppingCartModel->
						updateDeliveryInfor($ord_id, $Name, $Address, $Area, $SubArea, $Phone, $Email);
					$count = 0;
					while($meal_id = key($_SESSION["shoppingcart"])){
						$quantities = $_SESSION["shoppingcart"][$meal_id];
						if($quantities != 0)
							$result = (int) $this->ShoppingCartModel->updateOrder($ord_id, $meal_id, $quantities);
						if($result <= 0)
							$data['result'] = $data['result']." Mã món ".$meal_id." hiện đang hết hàng <br/>";
						else $count++;
						next($_SESSION["shoppingcart"]);
					}
					if($count != count($_SESSION["shoppingcart"])) {
						$data['result'] = $data['result']." Rất tiếc ".$Name.", chúng tôi chưa thể đáp ứng đơn hàng của bạn!";
						$this->ShoppingCartModel->deleteOrder($ord_id);
					}
					else $data['result'] = $data['result']." Cám ơn ".$Name.", bạn đã đặt hàng thành công!";
					unset($_SESSION["shoppingcart"]);
				}
				$data['back'] = 'http://localhost:8080/ci/index.php/ShoppingCartController/viewCart';
				$data['linkTitle'] = 'Back to previous page';
				$this->load->view('LotteriaAnnouncement', $data);
			}
		}
	}