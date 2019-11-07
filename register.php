<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>Login</title>
	<?php
        require('vista/navbar.php');
        include_once 'php/usuario.php';
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['reg'])){  
            $u = (isset($_POST['login']))?$_POST['login']:"";
            $p = (isset($_POST['password']))?$_POST['password']:"";
            $p2 = (isset($_POST['password-r']))?$_POST['password-r']:"";
            if(agregar_usuario($u,$p,$p2,$usuarioDao)){
                $_SESSION['autenticado']=true;
                $_SESSION['usuario'] = $u;
                header("Location: index.php");
            }
        }
        
	?>
</head>
<body>
	<div class="wrapper">
      <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div>
          <img src="img/user.png" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form method="POST">
          <input type="text" id="login" name="login" value="<?php echo (isset($u))?$u:'';?>" placeholder="usuario" required>
          <input type="password" id="password" name="password" placeholder="contraseña" required>
          <input type="password" id="password-r" name="password-r" placeholder="validar contraseña" required>
          <input type="submit" name="reg" value="Registrar">
        </form>
      </div>
    </div>
</body>
</html>