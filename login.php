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
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['log'])){  
            $u = (isset($_POST['login']))?$_POST['login']:"";
            $p = (isset($_POST['password']))?$_POST['password']:"";
            if(comprobar_usuario($u,$p,$usuarioDao)){
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
          <input type="text" id="login" name="login" placeholder="usuario" value="<?php echo (isset($u))?$u:'';?>" required>
          <input type="password" id="password" name="password" placeholder="contraseña" value="<?php echo (isset($p))?$p:'';?>" required>
          <input type="submit" name="log" value="Log In">
        </form>
      </div>
    </div>
</body>
</html>