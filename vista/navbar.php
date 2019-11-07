<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php">Sistema ABCC</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="abc.php">Altas/Bajas/Cambios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="c.php">Consultas</a>
      </li>
    </ul>
  </div>
  <div class="navbar-collapse collapse order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">
            <li class="nav-item"> 
              <?php 
                if (isset($_SESSION['autenticado'])) {
                  echo "<a class='nav-link'>Bienvenido: <b>".$_SESSION['usuario']."</b></a></li><li class='nav-item'><a class='nav-link'>/</a></li><li class='nav-item'><a class='nav-link' href='php/cerrar_sesion.php'>Cerrar Sesión</a>" ;
                }
                else{
                  echo "<a class='nav-link' href='register.php'>Registrar</a></li><li class='nav-item'><a class='nav-link'>/</a></li><li class='nav-item'><a class='nav-link' href='login.php'>Iniciar Sesión</a>";
                }
               ?>
            </li>
        </ul>    
    </div>
</nav> 