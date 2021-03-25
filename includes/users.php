<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('db.php');

Class User extends Db {
	
	public function register($first_name,$last_name,$email,$password,$lab_accredited){
		//Create a database connection object that will escape the data entries
		$objConn = new Db();
		$conn = $objConn->connect();
		
		//Escape the data entries
		$first_name = $conn->real_escape_string($first_name);
		$last_name = $conn->real_escape_string($last_name);
		$email = $conn->real_escape_string($email);
		$password = $conn->real_escape_string($password);
		$lab_accredited = $conn->real_escape_string($lab_accredited);
		
		//Hashing password
		$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
		
		//Check if user email exists in the db before saving
		$sql = "select * from users where email = '$email'";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		if($numRows > 0){
			echo"<script>alert('An account already exists with that email. Please register with a new email, or login')</script>";
			echo"<script>window.open('index.php','_self')</script>";
		}else{//If user doesnt exist already, add the data into the user db
		
			$sql = "INSERT INTO users(first_name, last_name, email, password,lab_accredited) VALUES ('$first_name','$last_name','$email','$hashedPwd','$lab_accredited')";
			$result = $this->connect()->query($sql);
			if($result){
				echo"<script>alert('You have successful registered. Please login to access your account dashboard')</script>";
				echo"<script>window.open('index.php','_self')</script>";
			}
		}
	}
	
	public function login($email, $password) {
		//Create a database connection object that will escape the data entries
		$objConn = new Db();
		$conn = $objConn->connect();
		
		//Escape the data entries
		$email = $conn->real_escape_string($email);
		$entered_password = $conn->real_escape_string($password);
		
		//Get user details from the database using the entered email
		$sql = "select * from users where email = '$email'";
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
				$sql = "update user set login_status = 1, login_date = NOW() where user_id = $user_id";
				$result = $this->connect()->query($sql);
				}elseif($lab_accredited == 2){ //If the user's laboratory is not accredited, open the non-accredited laboratory dashboard
				echo"<script>alert('Login Successful...')</script>";
				echo"<script>window.open('dashboard-3.php?user= $user_id','_self')</script>";
				$sql = "update user set login_status = 1, login_date = NOW() where user_id = $user_id";
				$result = $this->connect()->query($sql);
				}
			}
		}else{
				echo"<script>alert('Something is wrong...')</script>";
		}
	}
	
	public function logout($user_id){
			
			$sql = "update user set login_status = 0, login_time = NOW() where user_id = $user_id";
			$result = $this->connect()->query($sql);
			if ($result){
			echo"<script>alert('You have logged out..')</script>";
			echo "<script>window.open('index.php','_self')</script>";
			}else{
				echo "<script> alert('You haven't logged out. Try again!!') </script>";
			}
	}
}