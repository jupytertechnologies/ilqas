<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db.php';

Class Request extends Labs {
	
	//Get all schedules  from DB
	public function get_schedule(){
        $sql = "SELECT * FROM schedule order by schedule_name asc";
		$result = $this->connect()->query($sql);
		
		while($row = $result->fetch_assoc()){
			$datas[] = $row;
			}
		return $datas;
	}
	
	//Get all tests from DB
	public function get_test(){
		$sql = "SELECT * FROM lab_test order by test_name asc";
		$result = $this->connect()->query($sql);
		while($datas = $result->fetch_assoc()){
			$row[] = $datas;
		}
		return $row;
	}
	
	//Get all parameters from DB
	public function get_parameter(){
		$sql = "SELECT * FROM parameter";
		$result = $this->connect()->query($sql);
		while($datas = $result->fetch_assoc()){
			$row[] = $datas;
		}
		return $row;
	}
	
	//Get all equipment from DB
	public function get_equipment(){
		$sql = "SELECT * FROM equipment";
		$result = $this->connect()->query($sql);
		while($datas = $result->fetch_assoc()){
			$row[] = $datas;
		}
		return $row;
	}
	
	//Get accreditation status from DB
	public function get_accreditation(){
		$sql = "SELECT * FROM accredited_status";
		$result = $this->connect()->query($sql);
		while($datas = $result->fetch_assoc()){
			$row[] = $datas;
		}
		return $row;
	}
	
	
	

	//Enter form1 details
	public function insert_lab1($userid,$lab_name,$region,$district,$level,$street,$email,$phone){
		//Create a database connection object that will escape the data entries
		$objConn = new Db();
		$conn = $objConn->connect();
		
		//Escape the data entries
		$labName = $conn->real_escape_string($lab_name);
		$region = $conn->real_escape_string($region);
		$district = $conn->real_escape_string($district);
		$level = $conn->real_escape_string($level);
		$street = $conn->real_escape_string($street);
		$email = $conn->real_escape_string($email);
		$phone = $conn->real_escape_string($phone);
		
		//check if the laboratory is already in the system using the user ID
		$sql ="SELECT * FROM `lab_details` WHERE `user_id` = '$userid'";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if($numRows > 0){//If the lab exists, go ahead and update its details
		
			$sql = "UPDATE `lab_details` SET `lab_name`='$labName', `region`='$region', `district`='$district', `level`='$level', `street`='$street', `email`='$email', `phone`='$phone'";
			$result = $this->connect()->query($sql);
			if($result){
				echo'<script>alert("Laboratory Details updated successfully. Click: Step 2 to update Admin details");</script>';
			}
			
		}else{
			
		$sql = "INSERT INTO `lab_details`(`user_id`, `lab_name`, `region`, `district`, `level`, `street`, `email`, `phone`) VALUES ('$userid','$labName','$region','$district','$level','$street','$email','$phone')";
		$result = $this->connect()->query($sql);
		if($result){
			echo'<script>alert("Laboratory Details entered successfully. Click: Step 2 to update Admin details");</script>';
		}
		}
	}
	
    //Enter form2 details
	public function insert_lab_details2($user_id,$sur_name,$last_name,$position,$admin_email,$admin_phone){
		//Create a database connection object that will escape the data entries
		$objConn = new Db();
		$conn = $objConn->connect();
		
		//Escape the data entries
		$sur_name = $conn->real_escape_string($sur_name);
		$last_name = $conn->real_escape_string($last_name);
		$position = $conn->real_escape_string($position);
		$admin_email = $conn->real_escape_string($admin_email);
		$admin_phone = $conn->real_escape_string($admin_phone);
		
		$sql = "UPDATE `lab_details` SET `sur_name`='$sur_name',`last_name`='$last_name',`position`='$position',`admin_email`='$admin_email',`admin_phone`='$admin_phone' WHERE `user_id`='$user_id' ";
		
		$result = $this->connect()->query($sql);
		if($result){
			echo'<script>alert("Admin Details updated successfully. Click: Step 3 to update Payment details");</script>';
		}
		
	}
	
	//Enter form3 details
	public function insert_lab_details3($user_id,$entity_name,$relationship,$payment_mode,$mobile_money,$bank_acc,$bank_name){
		//Create a database connection object that will escape the data entries
		$objConn = new Db();
		$conn = $objConn->connect();
		
		//Escape the data entries
		$entity_name = $conn->real_escape_string($entity_name);
		$relationship = $conn->real_escape_string($relationship);
		$payment_mode = $conn->real_escape_string($payment_mode);
		$mobile_money = $conn->real_escape_string($mobile_money);
		$bank_acc = $conn->real_escape_string($bank_acc);
		$bank_name = $conn->real_escape_string($bank_name);
		
		$sql = "UPDATE `lab_details` SET `entity_name`='$entity_name',`relationship`='$relationship',`payment_mode`='$payment_mode',`mobile_money`='$mobile_money',`bank_acc`='$bank_acc',`bank_name`='$bank_name' WHERE `user_id`='$user_id' ";
		$result = $this->connect()->query($sql);
		if($result){
			echo'<script>alert("Payment Details updated successfully.");</script>';
			echo"<script>window.open('dashboard-2.php?user=$user_id','_self')</script>";
		}
		
	}
	
}