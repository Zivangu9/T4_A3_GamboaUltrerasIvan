<?php
	class ConexionBD{
		private $con;
		private $host="localhost";
		private $user="root";
		private $pass="";
		public function __construct($db){
			$this->con = mysqli_connect($this->host,$this->user,$this->pass,$db);
			if (!$this->con)
				echo "<script>alert('".mysqli_connect_error()."')</script>";
				
		}
		public function getConnection(){
				return $this->con;
			}
	}
?>