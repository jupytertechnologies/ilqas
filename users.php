<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db.php';

Class User extends Db {
	
		
	public function login($email, $password) {
		//Create a database connection object that will escape the data entries
		$objConn = new Db();
		$conn = $objConn->connect();
		
		//Escape the data entries
		$email = $conn->real_escape_string($email);
		$entered_password = $conn->real_escape_string($password);
		
		//Get user details from the database using the entered email
		$sql = "select * from users where email = '$email' and verified = 'yes'";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if($numRows > 0){//If the user exists, go ahead and fetch their details
			$row = $result->fetch_assoc();
			$user_id = $row['user_id'];
			$hash_password = $row['password'];
			$lab_accredited = $row['lab_accredited'];
			//Verify password
			if(!password_verify($entered_password, $hash_password)){
				echo"<script>alert('Incorrect Password!!! Try again')</script>";
				echo "<script>window.open('auth-login-social.php','_self')</script>";
			}else{
				//If the user's laboratory is accredited, open the accredited lab dashboard
				if($lab_accredited == 1){
				echo"<script>alert('Login Successful...')</script>";
				echo"<script>window.open('dashboard-2.php?user= $user_id','_self')</script>";
				$sql = "update users set login_status = 1, login_date = NOW() where user_id = $user_id";
				$result = $this->connect()->query($sql);
				}elseif($lab_accredited == 2){ //If the user's laboratory is not accredited, open the non-accredited laboratory dashboard
				echo"<script>alert('Login Successful...')</script>";
				echo"<script>window.open('dashboard-3.php?user= $user_id','_self')</script>";
				$sql = "update users set login_status = 1, login_date = NOW() where user_id = $user_id";
				$result = $this->connect()->query($sql);
				}
			}
		}else{
			$sql = "select * from users where email = '$email'";
		    $result = $this->connect()->query($sql);
		    $row = $result->fetch_assoc();
			$verified = $row['verified'];
			if($verified == 'no'){
			    echo"<script>alert('Please check your email for the account activation link.')/script>";
			    echo "<script>window.open('auth-login-social.php','_self')</script>";
			}else{
			    echo"<script>alert('Incorrect email or password')</script>";
			}
		}
	}
	
	public function logout(){
		
		session_start();
		
		session_destroy();
		
		echo"<script>alert('You have logged out..')</script>";
		echo "<script>window.open('index.php','_self')</script>";
				
	}
	
	public function get_user ($user_id){
		$sql = "select * from users where user_id = '$user_id'";
		$result = $this->connect()->query($sql);
		if($result){
			$datas[] = $result->fetch_assoc();
			}
		return $datas;
	}
}