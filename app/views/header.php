<nav id="navbar">
  <img id="logo" src="../../public/images/LogoPajaro.png" alt="Logo de Mi Banco">
  <ul id="nav-list">
    <li><a href="../../public/index.php">Cerrar sesión</a></li>
    <li><a href="welcome.php">Inicio</a></li>
    <li><a href="prestamos.php">Préstamos</a></li>
    <li><a href="baro.php">Gestionar baro</a></li>
    <?php
    if ($_SESSION["usuario"]["isAdmin"]){
      echo "<li><a href='admin.php'>Vista de administrador</a></li>";
    }
    ?>
  </ul>
  <button id="mobile-menu-btn">&#9776; Menú</button>
</nav>
