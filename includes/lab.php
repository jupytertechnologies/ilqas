<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db.php';

Class Labs extends Db {
	
	//Get all regions from the database 
	public function get_regions(){
		$sql = "select region_name from region";
		$result = $this->connect()->query($sql);
		
		while($row = $result->fetch_assoc()){
			$datas[] = $row;
			}
		return $datas;
	}
	
	//Get all districts from the database
	public function get_districts(){
		$sql = "SELECT * FROM district order by district_name asc";
		$result = $this->connect()->query($sql);
		while($datas = $result->fetch_assoc()){
			$row[] = $datas;
		}
		return $row;
	}
	
	//Get all levels from the database
	public function get_levels(){
		$sql = "SELECT * FROM level";
		$result = $this->connect()->query($sql);
		while($datas = $result->fetch_assoc()){
			$row[] = $datas;
		}
		return $row;
	}
	
	//Get all paymentmodes from the database
	public function get_pay_modes(){
		$sql = "SELECT * FROM payment_mode";
		$result = $this->connect()->query($sql);
		while($datas = $result->fetch_assoc()){
			$row[] = $datas;
		}
		return $row;
	}
	
	//Get all relationships from the database
	public function get_relationships(){
		$sql = "SELECT * FROM relationship";
		$result = $this->connect()->query($sql);
		while($datas = $result->fetch_assoc()){
			$row[] = $datas;
		}
		return $row;
	}
	
	//Laboratory details by ID boolean
	public function lab_exist($user_id){
		$sql = "SELECT * FROM lab_details WHERE user_id = '$user_id'";
		$result = $this->connect()->query($sql);
		$row_count = $result->num_rows;
		if($row_count > 0){
			//if there is a record in the db, return true
			return true;
		}else{//if there is NO record in the db, return false
		return false;
		}
	}
	
	//Get Laboratory details by ID 
	public function get_lab($user_id){
		$sql = "SELECT * FROM `lab_details` WHERE `user_id` = '$user_id'";
		$result = $this->connect()->query($sql);
		while($datas = $result->fetch_assoc()){
			$row[] = $datas;
		}
		return $row;
	}
	
	//Get Laboratory details by Lan Name 
	public function get_lab_name($user_id){
		$sql = "SELECT * FROM `lab_details` WHERE `user_id` = '$user_id'";
		$result = $this->connect()->query($sql);
		if($result){
		$datas[] = $result->fetch_assoc();
		}
		return $datas;
	}
	
	//Get Laboratory details by ID 
	public function edit_lab($user_id){
		$sql = "DELETE FROM lab_details WHERE user_id = '$user_id'";
		$result = $this->connect()->query($sql);
	}
	
	//Lab Admin columns from lab_details table
	public function edit_col1($user_id){
		$sql = "UPDATE `lab_details` SET `sur_name`=NULL,`last_name`=NULL,`position`=NULL,`admin_email`=NULL,`admin_phone`=NULL WHERE `user_id`='$user_id' ";
		
		$result = $this->connect()->query($sql);
	}
	
	//Lab Admin columns from lab_details table
	public function edit_col2($user_id){
		$sql = "UPDATE `lab_details` SET `entity_name`=NULL,`relationship`=NULL,`payment_mode`=NULL,`mobile_money`=NULL,`bank_acc`=NULL, `bank_name`=NULL WHERE `user_id`='$user_id' ";
		
		$result = $this->connect()->query($sql);
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
			//If the user is accredited, open the accredited laboratory dashboard-2
			$sql = "select * from `users` where `user_id`='$user_id' ";
			$result = $this->connect()->query($sql);
			$row = $result->fetch_assoc();
			$accredited = $row['lab_accredited'];
			if($accredited == 1){
			echo'<script>alert("Payment Details updated successfully.");</script>';
			echo"<script>window.open('dashboard-2.php?user=$user_id','_self')</script>";
			}elseif($accredited == 2){
				echo'<script>alert("Payment Details updated successfully.");</script>';
				echo"<script>window.open('dashboard-3.php?user=$user_id','_self')</script>";
			}
		}
		
	}
	
}