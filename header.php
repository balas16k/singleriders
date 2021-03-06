<?php
  require_once('funciones.php');
  require_once('loader.php');

  $usuariologin = $autenticador->usuarioLoginHeader($usuario);



?>

    <header>
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top <?= isset($usuariologin) ? 'd-flex justify-content-between' : '' ?>">
        <a class="navbar-brand" href="index.php">
          <div>
            <div class="logo-container">
              <div class="single">
                S
              </div>
              <div class="riders">
                R
              </div>
            </div>
          </div>
        </a>
        <?php if (!isset($usuariologin)): ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php endif; ?>
        <?php if (isset($usuariologin)): ?>
        <div class="d-none d-sm-inline-block" id="loguerla">
          <h2>Single Riders</h2>
        </div>
        <?php endif; ?>
        <?php // NOTE: Navbar no logueado ?>
        <?php if (!isset($usuariologin)): ?>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item <?= strpos($_SERVER['REQUEST_URI'], 'index.php') > -1  ? 'active' : ''  ?>">
                <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item <?= strpos($_SERVER['REQUEST_URI'], 'faqs.php') > -1  ? 'active' : ''  ?>">
                <a class="nav-link" href="faqs.php">Faqs</a>
              </li>
              <li class="nav-item <?= strpos($_SERVER['REQUEST_URI'], 'login.php') > -1  ? 'active' : ''  ?>">
                <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item <?= strpos($_SERVER['REQUEST_URI'], 'registro.php') > -1  ? 'active' : ''  ?>">
                <a class="nav-link" href="registro.php">Registro</a>
              </li>
            </ul>
          </div>
        <?php endif; ?>

        <?php // NOTE: navbar logueado ?>
        <?php if (isset($usuariologin)): ?>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?=$usuariologin['nombre']; ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="editar_perfil.php">Editar Perfil</a>
            <a class="dropdown-item" href="home.php">Mis Viajes</a>
            <!--<a class="dropdown-item" href="#">Cambiar Cuenta</a>-->
            <a class="dropdown-item" href="faqs.php">faqs</a>

            <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
            </div>
          </div>
        <?php endif; ?>
      </nav>
    </header>
