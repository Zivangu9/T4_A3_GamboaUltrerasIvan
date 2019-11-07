<?php 
	include 'conexion_bd.php';
	class AlumnoDao
	{
		private $con;
		function __construct()
		{
			$this->con = new ConexionBD('escuela_web');
		}
		public function agregar($nc,$n,$pa,$sa,$e,$s,$c){
			$stmt = mysqli_prepare($this->con->getConnection(),"INSERT into Alumnos values(?,?,?,?,?,?,?)");
			mysqli_stmt_bind_param($stmt,'ssssiis',$nc,$n,$pa,$sa,$e,$s,$c);
			return mysqli_stmt_execute($stmt);
		}
		public function actualizar($nc,$n,$pa,$sa,$e,$s,$c){
			$stmt = mysqli_prepare($this->con->getConnection(),"UPDATE Alumnos SET nombre=?,primer_ap=?,segundo_ap=?,edad=?,semestre=?,carrera=? WHERE num_control=?");
			mysqli_stmt_bind_param($stmt,'sssiiss',$n,$pa,$sa,$e,$s,$c,$nc);
			return mysqli_stmt_execute($stmt);
		}
		public function eliminar($nc){
			$stmt = mysqli_prepare($this->con->getConnection(),"DELETE FROM Alumnos WHERE num_control = ?");
			mysqli_stmt_bind_param($stmt,'s',$nc);
			return mysqli_stmt_execute($stmt);
		}
		public function consulta_simple($nc){
			$stmt = mysqli_prepare($this->con->getConnection(),"SELECT * FROM Alumnos WHERE num_control = ?");
			mysqli_stmt_bind_param($stmt,'s',$nc);
			mysqli_stmt_execute($stmt);
			return $stmt->get_result();
		}
		public function consulta_compleja_edad_semestre($nc,$n,$e,$s,$c){
			$nc = "%".$nc."%";
			$n = "%".$n."%";
			$c = "%".$c."%";
			$stmt = mysqli_prepare($this->con->getConnection(),"SELECT * FROM Alumnos WHERE num_control like ? and (nombre like ? or primer_ap like ? or segundo_ap like ?) and carrera like ? and edad = ? and semestre = ?");
			mysqli_stmt_bind_param($stmt,'sssssii',$nc,$n,$n,$n,$c,$e,$s);
			mysqli_stmt_execute($stmt);
			return $stmt->get_result();
		}
		public function consulta_compleja_edad($nc,$n,$e,$c){
			$nc = "%".$nc."%";
			$n = "%".$n."%";
			$c = "%".$c."%";
			$stmt = mysqli_prepare($this->con->getConnection(),"SELECT * FROM Alumnos WHERE num_control like ? and (nombre like ? or primer_ap like ? or segundo_ap like ?) and carrera like ? and edad = ?");
			mysqli_stmt_bind_param($stmt,'sssssi',$nc,$n,$n,$n,$c,$e);
			mysqli_stmt_execute($stmt);
			return $stmt->get_result();
		}
		public function consulta_compleja_semestre($nc,$n,$s,$c){
			$nc = "%".$nc."%";
			$n = "%".$n."%";
			$c = "%".$c."%";
			$stmt = mysqli_prepare($this->con->getConnection(),"SELECT * FROM Alumnos WHERE num_control like ? and (nombre like ? or primer_ap like ? or segundo_ap like ?) and carrera like ? and semestre = ?");
			mysqli_stmt_bind_param($stmt,'sssssi',$nc,$n,$n,$n,$c,$s);
			mysqli_stmt_execute($stmt);
			return $stmt->get_result();
		}
		public function consulta_compleja($nc,$n,$c){
			$nc = "%".$nc."%";
			$n = "%".$n."%";
			$c = "%".$c."%";
			$stmt = mysqli_prepare($this->con->getConnection(),"SELECT * FROM Alumnos WHERE num_control like ? and (nombre like ? or primer_ap like ? or segundo_ap like ?) and carrera like ?");
			mysqli_stmt_bind_param($stmt,'sssss',$nc,$n,$n,$n,$c);
			mysqli_stmt_execute($stmt);
			return $stmt->get_result();
		}
		public function consulta_total(){
			$stmt = mysqli_prepare($this->con->getConnection(),"SELECT * FROM Alumnos");
			mysqli_stmt_execute($stmt);
			return $stmt->get_result();
		}
	}
?>