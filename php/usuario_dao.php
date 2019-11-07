<?php 
	include 'conexion_bd.php';
	class UsuarioDao{
		private $con;
		function __construct()
		{
			$this->con = new ConexionBD('usuarios_web');
		}
		public function get_usuario($usuario,$pass){
			$stmt = mysqli_prepare($this->con->getConnection(),"SELECT * FROM Usuarios where usuario = ? and pass=?");
			mysqli_stmt_bind_param($stmt,'ss',$usuario,$pass);
			mysqli_stmt_execute($stmt);
			return $stmt->get_result();
		}
		public function agregar_usuario($usuario,$pass){
			$stmt = mysqli_prepare($this->con->getConnection(),"INSERT INTO Usuarios VALUES(?,?)");
			mysqli_stmt_bind_param($stmt,'ss',$usuario,$pass);
			return mysqli_stmt_execute($stmt);
		}
	}
 ?>