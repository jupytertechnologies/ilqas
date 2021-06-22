<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db.php';

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
		$token = bin2hex(openssl_random_pseudo_bytes(40)); //Token that will be used in email verification
		
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
			
			$sql = "INSERT INTO users(first_name, last_name, email, password,lab_accredited,token) VALUES ('$first_name','$last_name','$email','$hashedPwd','$lab_accredited','$token')";
			$result = $this->connect()->query($sql);
			if($result){
				//Send confirmation email to the user
				$subject = "Please confirm your ILQAS account";
				$body = "Hi " .$first_name. ": Here is the link to activate your account: http://localhost:8080/ilqas/auth-login-social.php?token=".$token;
				$senderEmail = "From: ahmadabdulauthor@gmail.com";
				$send_mail = mail($email, $subject, $body, $senderEmail);
				if($send_mail){
				    echo "<script>alert('An activation link has been sent to your email. Please click it to login to your account')</script>";
				    echo"<script>window.open('auth-login-social.php','_self')</script>";
				}else {
					echo "<script>alert('Email not sent..')</script>";
					echo"<script>window.open('auth-register-basic.php','_self')</script>";
				}
			}else{
			    echo "<script>alert('There is a connectivity problem. Please try again')</script>";
				echo"<script>window.open('auth-register-basic.php','_self')</script>";
			}
		}
	}
	
	public function activate($token){
		$sql = "select * from users where token = '$token'";
        $result = $this->connect()->query($sql);
        $row = $result->fetch_assoc();
        if($row['verified'] == 'yes'){
            echo"<script>alert('This account has already been verified. Please login to your account')</script>"; 
            echo "<script>window.open('auth-login-social.php')</script>";
        }else{
            $sql = "update users set verified = 'yes' where token = '$token'";
            $result = $this->connect()->query($sql);
            if($result){
                echo"<script>alert('Your account has been successfully verified. Please login to your account')</script>"; 
                echo "<script>window.open('auth-login-social.php')</script>";
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