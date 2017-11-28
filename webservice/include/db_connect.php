<?php 
	class DB_Connect{
		private $conn;
		private $_host = 'localhost';
		private $_username = 'root';
		private $_password ='';
		private $_database = 'quanly_nhom1';
		// constructor
		// connecting to database
		function __construct(){
			$this->conn = mysqli_connect($this->_host,$this->_username,$this->_password,$this->_database)or die("can't connect database".$this->_host);
			mysqli_set_charset($this->conn,'utf8');
		}
		// destructor
		function __destruct(){
			
		}
		// close database
		public function CloseDB()
		{
			mysqli_close($this->conn);
		}
		// getter $conn
		public function getConnect(){
			return $this->conn;
		}
		// Hàm thực hiện các chức năng select
		public function SqlExecuteQuery($sql){
			$result = mysqli_query($this->conn,$sql);
			if(mysqli_num_rows($result) == false)
			{
				return false;
			}
			while($row = mysqli_fetch_assoc($result)){
				$result_all[] = $row;
			}
			mysqli_free_result($result);
			//$this->CloseDB();
			return $result_all;
		}
		// Hàm thực hiện chức năng update,insert, delete
		public function SqlExecuteNonQuery($sql){
			$result = mysqli_query($this->conn,$sql);
			// $this->CloseDB();
			return $result;
		}
	}
?>