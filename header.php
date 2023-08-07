<html>
  <head>
    <meta charset="UTF-8">
    <title> Inventarios</title>
    <link rel="stylesheet" href="barra/style.css">
    <link rel="stylesheet" href="Portada/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Link -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css'
    rel='stylesheet'>
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-paypal bx-tada' style='color:#080808'></i>
      <span class="logo_name"style='color:#080808'>PATRICIA</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Panel</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="index.php">Panel</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Archivos</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Archivos</a></li>
          <li><a  href="lista_producto.php">Productos</a></li>
          <li><a  href="lista_cliente.php">Clientes</a></li>
            <li><a  href="lista_proveedor.php">Proveedor</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a  href="regis_venta.php">Documentos</a></li>
            <li><a  href="lista_linea.php">Lineas</a></li>
            <li><a  href="lista_empleado.php">Usuarios</a></li>
            <li><hr class="dropdown-divider"></li>
          
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Procesos</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Procesos</a></li>
          <li><a  href="registro_ventas.php">Registro Ventas</a></li>
          
        </ul>
      </li>
      
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-pie-chart-alt-2'></i>
            <span class="link_name">Consultas</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Consultas</a></li>
          <li><a  href="consulta_venta_cli.php">Ventas por cliente</a></li>
          <li><a  href="consulta_venta_producto.php">Venta por Producto</a></li>
            <li><a  href="consulta_ranking_ventas.php">Ranking de Ventas</a></li>
            <li><a  href="lista_dia_fecha.php">Lista de ventas por día y entre fechas</a></li>
          </ul>
      </li>
      <li>
      <div class="iocn-link">
        <a href="#">
          <i class='bx bxs-contact' ></i>
          <span class="link_name">Contactos</span>
        </a>
        <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu ">
          <li><a class="link_name" href="#">Contactos</a></li>
         <!-- Agrega los enlaces de Facebook y WhatsApp aquí -->
    <li>
      <a href="https://www.facebook.com/profile.php?id=100013898223629" target="_blank">
        <i class='bx bxl-facebook'></i>
        <span class="link_name">Facebook</span>
      </a>
    </li>
    <li>
      <a href="https://api.whatsapp.com/send/?phone=051928854252&text&type=phone_number&app_absent=0" target="_blank">
        <i class='bx bxl-whatsapp'></i>
        <span class="link_name">WhatsApp</span>
      </a>
    </li>
  </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-cog'></i>
            <span class="link_name">Opciones</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Opciones</a></li>
          
          <li><a  href="logout.php">Salir</a></li>
        </ul>
      </li>
      
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="barra/image/foto.jpg" alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name">Administrador</div>
        <div class="job">Proyecto final</div>
      </div>
      <i class='bx bx-log-out' ></i>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Sistema de Ventas</span>
    </div>
  </section>
  <script src="barra/script.js"></script>
</body>
</html>
