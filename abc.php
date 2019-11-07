<?php 
	session_start();
	if ($_SESSION['autenticado']==false) {
		header("Location: login.php");	
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>Altas, Bajas y Cambios</title>
	
	<?php
		require_once('vista/navbar.php');
		include_once('./php/abcc.php');
		$nc = "";
		$n = "";
		$pa = "";
		$sa = "";
		$e = "";
		$s = "";
		$c = "";
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['guardar'])){	
			$nc = $_POST['txt_num_control'];
			$n = $_POST['txt_nombre'];
			$pa = $_POST['txt_primer_ap'];
			$sa = $_POST['txt_segundo_ap'];
			$e = $_POST['txt_edad'];
			$s = $_POST['txt_semestre'];
			$c = $_POST['txt_carrera'];
			agregar_alumno($nc,$n,$pa,$sa,$e,$s,$c,$alumDao);
		}
		elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['borrar'])){	
			$nc = $_POST['txt_num_control'];
			$n = $_POST['txt_nombre'];
			$pa = $_POST['txt_primer_ap'];
			$sa = $_POST['txt_segundo_ap'];
			$e = $_POST['txt_edad'];
			$s = $_POST['txt_semestre'];
			$c = $_POST['txt_carrera'];
			eliminar_alumno($nc,$alumDao);
		}
		elseif($_SERVER['REQUEST_METHOD'] == "POST"){	
			$nc = $_POST['txt_num_control'];
			$n = $_POST['txt_nombre'];
			$pa = $_POST['txt_primer_ap'];
			$sa = $_POST['txt_segundo_ap'];
			$e = $_POST['txt_edad'];
			$s = $_POST['txt_semestre'];
			$c = $_POST['txt_carrera'];
		}
		elseif($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['b'])){	
			$nc = $_GET['num_control'];
			$res = buscar_alumnos($alumDao,$nc);
			if (mysqli_num_rows($res)==1) {
				$r = mysqli_fetch_array($res,MYSQLI_NUM);
				$n = $r[1];
				$pa = $r[2];
				$sa = $r[3];
				$e = $r[4];
				$s = $r[5];
				$c = $r[6];
			}
		}
	?>
</head>
<body>
	<br>
	<div class="container">
		<form name="abc" method="POST">
			<div class="form-group">
			    <label for="txt_num_control">Número de Control:</label>
			    <input type="text" class="form-control" id="txt_num_control" name="txt_num_control" value="<?php echo (isset($nc))?$nc:'';?>" placeholder="Número de Control" required>
			</div>
			<div class="form-group">
			    <label for="txt_nombre">Nombre: <?php (isset($_POST['error_nombre']))?"<span class='text-danger'>".$_POST['error_nombre']."</span>":""; ?></label>
			    <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" value="<?php echo (isset($n))?$n:'';?>" placeholder="Nombre" required>
			</div>
			<div class="form-group">
			    <label for="txt_primer_ap">Primer Apellido:</label>
			    <input type="text" class="form-control" id="txt_primer_ap" name="txt_primer_ap" value="<?php echo (isset($pa))?$pa:'';?>" placeholder="Primer Apellido" required>
			</div>
			<div class="form-group">
			    <label for="txt_segundo_ap">Segundo Apellido:</label>
			    <input type="text" class="form-control" id="txt_segundo_ap" name="txt_segundo_ap" value="<?php echo (isset($sa))?$sa:'';?>" placeholder="Segundo Apellido" required>
			</div>
			<div class="form-inline">
			    <label for="txt_edad" class="mr-sm-2">Edad:</label>
			    <input type="number" min="1" max="99" class="form-control mb-2 mr-sm-2" id="txt_edad" name="txt_edad" value="<?php echo (isset($e))?$e:'';?>" required>

			    <label for="txt_semestre" class="mr-sm-2">Semestre:</label>
			    <input type="number" min="1" max="13" class="form-control mb-2 mr-sm-2" id="txt_semestre" name="txt_semestre" value="<?php echo (isset($s))?$s:'';?>" required>

			    <label for="txt_carrera" class="mr-sm-2">Carrera:</label>
			    <select name="txt_carrera" class="form-control mb-2 mr-sm-2" required>
			    	<option selected disabled hidden value="">Selecciona Carrera</option>
			    	<option <?php echo ($c=='ISC')?'selected':'';?> value="ISC">Ingeniería en Sistemas Computacionales</option>
			    	<option <?php echo ($c=='IM')?'selected':'';?> value="IM">Ingeniería en Mecatrónica</option>
			    	<option <?php echo ($c=='IIA')?'selected':'';?> value="IIA">Ingeniería en Industrias Alimentarias</option>
			    	<option <?php echo ($c=='CP')?'selected':'';?> value="CP">Contador Publico</option>
			    	<option <?php echo ($c=='LA')?'selected':'';?> value="LA">Licenciatura en Administración</option>
			    </select>
			</div>
			<div class="form-group text-center">
				<br>
				<button type="summit" class="btn-outline-success btn-lg rounded">Nuevo</button>
				<button type="submit" name="guardar" class="btn-outline-primary btn-lg rounded">Guardar</button>
				<button type="submit" name="borrar" class="btn-outline-danger btn-lg rounded">Borrar</button>
			</div>
		</form>	
	</div>
</body>
</html>