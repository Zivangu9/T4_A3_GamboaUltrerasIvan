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

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>Sistema ABCC</title>
	
	<?php
		require('vista/navbar.php');
		include_once('./php/abcc.php');
	?>
</head>
<body>
	<br>
	<div class="container">
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
					$r = buscar_alumnos($alumDao);
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
				?>
			</tbody>
		</table>
	</div>
</body>
</html>