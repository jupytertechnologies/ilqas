<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'lab.php';

Class Requests extends Labs {
	
	//Get test categories from the database 
	public function get_test_categories(){
		$sql = "select test_category_name from test_category";
		$result = $this->connect()->query($sql);
		
		while($row = $result->fetch_assoc()){
			$datas[] = $row;
			}
		return $datas;
	}
	
	//Get schedule from the database
	public function get_schedule(){
		$sql = "select schedule_name from schedule";
		$result = $this->connect()->query($sql);
		while($datas = $result->fetch_assoc()){
			$row[] = $datas;
		}
		return $row;
	}
	
	//Get category_id from the database
	public function get_category_id($category_name){
		$sql = "select test_category_id from test_category where test_category_name = '$category_name' ";
		$result = $this->connect()->query($sql);
		if($datas = $result->fetch_assoc()){
			$id = $datas;
		}
		return $id;
	}
	
	//Get all parameters from the database
	public function get_parameters(){
		$sql = "select test_name from parameters";
		$result = $this->connect()->query($sql);
		while($datas = $result->fetch_assoc()){
			$row[] = $datas;
		}
		return $row;
	}
	
	//Enter form details
	public function insert_cat($user_id, $category, $schedule, $parameter, $other_parameter, $equipment, $technique, $rdt, $invoice_name){
		//Create a database connection object that will escape the data entries
		$objConn = new Db();
		$conn = $objConn->connect();
		
		//Escape the data entries
		$cats = $conn->real_escape_string($category);
		$schedules = $conn->real_escape_string($schedule);
		$parameters = $conn->real_escape_string($parameter);
		$other = $conn->real_escape_string($other_parameter);
		$equipments = $conn->real_escape_string($equipment);
		$techniques = $conn->real_escape_string($technique);
		$rdts = $conn->real_escape_string($rdt);
		$invoice_names = $conn->real_escape_string($invoice_name);
		
		$sql = "INSERT INTO cart(user_id, category_name, schedule_name, parameter_name, other_parameters, equipment, technique, is_rapid_test, invoice_name) VALUES ('$user_id', '$cats', '$schedules', '$parameters', '$other', '$equipments', '$techniques', '$rdts', '$invoice_names')";
		$result = $this->connect()->query($sql);
		if($result){
				$sql = "select `cost` from `parameters` where `test_name` = '$parameters'";
				$result = $this->connect()->query($sql);
				$numRows = $result->num_rows;
				if($numRows > 0){
					$row = $result->fetch_assoc();
					$cost = $row['cost'];
					//$schedule = $row['schedule_name'];
					//Convert cost to integer
					$item_cost = intval($cost);
					if($schedules == 'Monthly'){
						$frequency = 12;
					}elseif($schedules == 'Every 2 months'){
						$frequency = 6;
					}elseif($schedules == 'Quarterly'){
						$frequency = 4;
					}elseif($schedules == 'Three times a year'){
						$frequency = 3;
					}elseif($schedules == 'Twice a year'){
						$frequency = 2;
					}elseif($schedules == 'Once a year'){
						$frequency = 1;
					}else{
						$frequency = "";
					}
					/*switch($schedules){
						case 'Monthly':
							$frequency = 12; 
							break;
						case 'Every 2 months':
							$frequency = 6;
							break;
						case 'Quarterly':
							$frequency = 4;
							break;
						case 'Twice a year':
							$frequency = 2;
							break;
						case 'Once a year':
							$frequency = 1;
							break;
						default:
							$frequency = "";
							break;
					}*/
					$amount = $item_cost * $frequency;
					$sql = "update `cart` set `request_date` = NOW(), `cost` = '$cost', `frequency` = '$frequency', `amount` = '$amount' where parameter_name = '$parameters'";
					$result = $this->connect()->query($sql);
					if($result){
						echo"<script>window.open('make_request.php?user_id=$user_id,'_self')</script>";
					}else{
						echo"<script>alert('Data not entered..')</script>";
					}
				}
				
			}
		
	}
	
	public function get_cart_items($user_id){
		$sql = "SELECT * FROM `cart` WHERE `user_id` = '$user_id'";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if($numRows == 0){
			$row = "";
		}else{
			while($datas = $result->fetch_assoc()){
					$row[] = $datas;
			}
			return $row;
		}
	}
	
	public function count_cart_items($user_id){
		$sql = "select count(*) as total from `cart` where `user_id` = '$user_id'";
		$result = $this->connect()->query($sql);
		$count = $result->fetch_assoc();
		if($count){
			return $count['total'];
		}else{
			echo " "; 
		}
	}
	
	public function sum_cart_costs($user_id){
		$sql = "select sum(amount) as total from `cart` where `user_id` = '$user_id'";
		$result = $this->connect()->query($sql);
		$sum = $result->fetch_assoc();
		if($sum){
			//Convert the sum to a number format that has commas
			$total_amount = number_format($sum['total']);
			//Get dollar equivalent by rounding off the sum that has been converted into integer and divided by dollar rate of 3700
			$dollar = round((intval($sum['total'])/3700),2);
			echo $total_amount. 'Shs | ' .$dollar. 'Usd';
		}else{
			echo " "; 
		}
	}
	
	public function get_cart_subtotal($user_id){
		$sql = "select sum(amount) as total from `cart` where `user_id` = '$user_id'";
		$result = $this->connect()->query($sql);
		$sum = $result->fetch_assoc();
		if($sum){
			//Convert the sum to a number format that has commas
			$total_amount = intval($sum['total']);
		}return $total_amount;
	}
	
	
	public function count_requests($user_id){
		$sql = "select count(*) as total from `request` where `user_id` = '$user_id'";
		$result = $this->connect()->query($sql);
		$count = $result->fetch_assoc();
		if($count){
			echo $count['total'];
		}else{
			echo "0"; 
		}
	}
	
	public function generate_invoice($user_id){
		//Get all tests/parameters entered in cart
		$sql = "select * from `cart` where `user_id` = '$user_id'";
		$result = $this->connect()->query($sql);
		while($datas = $result->fetch_assoc()){
			$items[] = $datas;
		}return $items;
		//Get cart amount
		$sql = "select sum(cost) as amount from `cart` where `user_id` = '$user_id'";
		$result = $this->connect()->query($sql);
		$sum = $result->fetch_assoc();
		$total = number_format($sum['amount']);
		$sql = "insert into `invoice` (`user_id`, `invoice_details`,`invoice_amount`) values ('$user_id','$items','$total')";
		
	}
	
	public function get_panel_status($status_id){
		$sql = "select * from `panel_status` where `panel_status_id` = '$status_id'";
		$result = $this->connect()->query($sql);
		if($result){
			$row = $result->fetch_assoc();
			$status = $row['status_name'];
		}return $status;
	}
	
	public function get_payment_status($pay_status_id){
		$sql = "select * from `payment_status` where `status_id` = '$pay_status_id'";
		$result = $this->connect()->query($sql);
		if($result){
			$row = $result->fetch_assoc();
			$pay_status = $row['status_name'];
		}return $pay_status;
	}
	
	public function save_invoice($user_id){
		//Get all items from the cart table into an array using the get_cart_items function in this class
		$cart_items = self::get_cart_items($user_id);
		$items = json_encode($cart_items); //Convert the array into a string to be able to save into the invoice details column
		//Get the total cart amount from the cart table using the get_cart_subtotal function in this class
		$cart_sub_total = self::get_cart_subtotal($user_id);
		//Get number of cart items
		$parameters = self::count_cart_items($user_id);
		//Set payment status id to the default of Not Paid, which is 2
		$payment_status = 2;
		//Set panel status id to the default of Pending, which is 1
		$panel_status = 1;
		//Set invoice date to the date this function is called
		$date = date("Y-m-d"); 
		if(is_null($cart_items)||is_null($cart_sub_total)){
			echo"<script>alert('You have no items in the cart. Complete request form and add parameters')</script>";
			echo"<script>window.open('make_request.php?user_id=$user_id,'_self')</script>";
		}else{
		//Insert user_id, the cart array and subtotal into the invoice table
		$sql = "insert into `invoice` (`user_id`,`parameter_count`,`invoice_details`,`invoice_amount`,`invoice_date`,`payment_status`,`panel_status`) values ('$user_id','$parameters','$items','$cart_sub_total','$date','$payment_status','$panel_status')";
		$result = $this->connect()->query($sql);
		if($result){
			//Delete the cart items from cart table for this user
			$sql = "delete from `cart` where `user_id` = '$user_id'";
			$result = $this->connect()->query($sql);
			if($result){
				echo"<script>alert('Please make payment for the request to be sent to the PT Provider')</script>";
				echo"<script>window.open('view_request-3.php?user_id=$user_id','_self')</script>";
			}
		}
	}
	}
	
	public function empty_cart($user_id){
	$sql = "select * from `cart` where `user_id` = '$user_id'";
	$result = $this->connect()->query($sql);
	$numRows = $result->num_rows;
	if($numRows > 0){
	$sql = "delete from `cart` where `user_id` = '$user_id'";
		$result = $this->connect()->query($sql);
		if($result){
			echo"<script>alert('Your cart has been successfully cleared')</script>";
			echo"<script>window.open('request.php?user_id=$user_id,'_self')</script>";
		}
	}else{
		echo"<script>alert('You have no items in the cart. Complete request form and add parameters')</script>";
		echo"<script>window.open('make_request.php?user_id=$user_id,'_self')</script>";
	}
	}
	
	//Get invoice based on user id
	public function get_invoice($user_id){
		$sql = "select * from `invoice` where `user_id` = '$user_id'";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if($numRows == 0){
			$row = "";
		}else{
			while($datas = $result->fetch_assoc()){
				$row[] = $datas;
			}return $row;
		}
	}
	
	//Get invoice details from invoice table based on invoice id
	public function get_invoice_by_id($invoice_id){
		$sql = "select * from `invoice` where `invoice_id` = '$invoice_id'";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if($numRows == 0){
			$row = "";
		}else{
			while($datas = $result->fetch_assoc()){
				$row[] = $datas;
			}return $row;
		}
	}
	
	public function cancel_invoice($invoice_id,$user_id){
		$sql = "update `invoice` set `panel_status`= '4' where `invoice_id` = '$invoice_id'";
		$result = $this->connect()->query($sql);
		if($result){
			echo"<script>alert('The invoice has been canceled successfully')</script>";
			echo"<script>window.open('view_request-3.php?user_id=$user_id','_self')</script>";
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}