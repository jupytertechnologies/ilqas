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
	
