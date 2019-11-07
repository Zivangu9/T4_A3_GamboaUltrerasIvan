<?php 
	include_once('usuario_dao.php');
	$usuarioDao = new usuarioDao();
	function comprobar_usuario($u,$p,$usuarioDao){
		if (mysqli_num_rows($usuarioDao->get_usuario(sha1($u),sha1($p)))==1) {
			return true;
		}
		else{
			echo "<script>alert('Usuario o Contraseña Incorrectos')</script>";
			return false;
		}
	}
	function agregar_usuario($u,$p,$p2,$usuarioDao){
		if ($p==$p2) {
			if ($usuarioDao->agregar_usuario(sha1(limpiar_cadena($u)),sha1(limpiar_cadena($p)))) 
				return true;
			echo "<script>alert('Ese Usuario ya Existe')</script>";
		}
		else
			echo "<script>alert('Las Contraseñas no Coinciden')</script>";
		return false;
	}
	function limpiar_cadena($cad){
		$cad = trim($cad);
		$cad = stripslashes($cad);
		$cad = htmlspecialchars($cad);
		return $cad;
	}
 ?>



