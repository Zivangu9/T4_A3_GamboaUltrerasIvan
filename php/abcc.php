<?php
	include_once 'alumno_dao.php';
	$alumDao = new AlumnoDao();
	function agregar_alumno($nc,$n,$pa,$sa,$e,$s,$c,$alumDao){
		if ($nc!=''&&$n!=''&&$pa!=''&&$sa!=''&&$e!=''&&$s!=''&&$c!='') {
			if ($e<1||$e>99) {
				echo "<script>alert('Edad no Valida')</script>";
				return false;
			}
			if ($s<1||$s>13) {
				echo "<script>alert('Semestre no Valida')</script>";
				return false;	
			}
			if (mysqli_num_rows($alumDao->consulta_simple($nc))==0) {
				$r = $alumDao->agregar($nc,$n,$pa,$sa,$e,$s,$c);
				if ($r) {
					echo "<script>alert('Se Agrego de Forma Correcta')</script>";
				}
				else{
					echo "<script>alert('Error al Agregar')</script>";	
				}
			}
			else{
				$r = $alumDao->actualizar($nc,$n,$pa,$sa,$e,$s,$c);
				if ($r) {
					echo "<script>alert('Se Actualizo de Forma Correcta')</script>";
				}
				else{
					echo "<script>alert('Error al Actualizar')</script>";	
				}
			}	
		}
		else{
			echo "<script>alert('Faltan Datos')</script>";
		}

		
		
	}
	function eliminar_alumno($nc,$alumDao){
		if (mysqli_num_rows($alumDao->consulta_simple($nc))>0) {
			$r = $alumDao->eliminar($nc);
		}
		else
			echo "<script>alert('Ese Numero de Control no Existe')</script>";
		if ($r) {
			echo "<script>alert('Se Elimno de Forma Correcta')</script>";
		}
		else{
			echo "<script>alert('Error al Eliminar')</script>";	
		}
	}
	function buscar_alumnos($alumDao,$nc=''){
		if ($nc=='') {
			return $alumDao->consulta_total();
		}
		else{
			return $alumDao->consulta_simple($nc);
		}
	}
	function filtrar_alumnos($alumDao,$nc,$n,$e,$s,$c){
		if ($e!=''&&$s!='') {
			return $alumDao->consulta_compleja_edad_semestre($nc,$n,$e,$s,$c);
		}
		elseif ($e!='') {
			return $alumDao->consulta_compleja_edad($nc,$n,$e,$c);
		}
		elseif ($s!='') {
			return $alumDao->consulta_compleja_semestre($nc,$n,$s,$c);
		}
		else{
			return $alumDao->consulta_compleja($nc,$n,$c);
		}
	}
?>