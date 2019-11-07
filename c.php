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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<title>Consultas</title>
	
	<?php
		require_once('vista/navbar.php');
		include_once('./php/abcc.php');
		$nc = "";
		$n = "";
		$e = "";
		$s = "";
		$c = "";
		if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['filtrar'])){	
			$nc = $_POST['txt_num_control'];
			$n = $_POST['txt_nombre'];
			$e = $_POST['txt_edad'];
			$s = $_POST['txt_semestre'];
			$c = isset($_POST['txt_carrera'])?$_POST['txt_carrera']:"";
			
		}
	?>
</head>
<body>
	<div class="container">
		<br>
		<fieldset class="form-group">
			<form name="abc" method="POST">
				
				<div class="form-inline">
				    <label for="txt_num_control" class="mr-sm-2">Número de Control:</label>
				    <input type="text" class="form-control mb-2 mr-sm-2" id="txt_num_control" name="txt_num_control" value="<?php echo (isset($nc))?$nc:'';?>" placeholder="Número de Control">
				    <label for="txt_nombre" class="mr-sm-2">Nombre:</label>
				    <input type="text" class="form-control mb-2 mr-sm-2" id="txt_nombre" name="txt_nombre" value="<?php echo (isset($n))?$n:'';?>" placeholder="Nombre">
				</div>
				<div class="form-inline">
				    <label for="txt_edad" class="mr-sm-2">Edad:</label>
				    <input type="number" min="1" max="99" class="form-control mb-2 mr-sm-2" id="txt_edad" name="txt_edad" value="<?php echo (isset($e))?$e:'';?>">

				    <label for="txt_semestre" class="mr-sm-2">Semestre:</label>
				    <input type="number" min="1" max="13" class="form-control mb-2 mr-sm-2" id="txt_semestre" name="txt_semestre" value="<?php echo (isset($s))?$s:'';?>">

				    <label for="txt_carrera" class="mr-sm-2">Carrera:</label>
				    <select name="txt_carrera" class="form-control mb-2 mr-sm-2">
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
					<button type="submit" name="filtrar" class="btn-outline-success btn-lg rounded">Filtrar</button>
				</div>
			</form>			
		</fieldset>
		<br>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Num. de Control</th>
					<th scope="col">Nombre</th>
					<th scope="col">Primer Apellido</th>
					<th scope="col">Segundo Apellido</th>
					<th scope="col">Edad</th>
					<th scope="col">Semestre</th>
					<th scope="col">Carrera</th>
					<th scope="col">Modificar</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$r = filtrar_alumnos($alumDao,$nc,$n,$e,$s,$c);
					if ($r) {
						foreach ($r as $key => $value) {
							echo "<tr>";
							foreach ($value as $k => $v) {
								if ($k == 'num_control') {
									$nc = $v;
								}
								echo "<td>".$v."</td>";
							}
							echo "<td><a href='abc.php?num_control=".$nc."&b'><i class='fas fa-pen'>Editar/Borrar</i></a></td>";
							echo "</tr>";
							
						}
					}
					
				?>
			</tbody>
		</table>
	</div>
</body>
</html>