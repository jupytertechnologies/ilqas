<?php

Class Db {
	
	private $servername;
	private $username;
	private $password;
	private $dbname;
	
	protected function connect(){
		$this->servername = "127.0.1.1";
		$this->username = "root";
		$this->password = "";
		$this->dbname = "ilqas";
		
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		
		return $conn;
		
	}
}
?>


 <!-- <?php

Class Db {
	
	private $servername;
	private $username;
	private $password;
	private $dbname;
	
	protected function connect(){
		$this->servername = "localhost";
		$this->username = "u248916977_root";
		$this->password = "Ilqas@2021";
		$this->dbname = "u248916977_ilqas";
		
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		
		return $conn;
		
	}
}
?>  -->