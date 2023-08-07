<?php 
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}

include('header.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Portada/styles.css">
</head>
<body>

    <section class="showcase">
        <video src="Portada/video/video4.mp4" muted loop autoplay></video>
        <div class="overlay"></div>
        <div class="text">
            <h2>Sistema de Registro</h2>
            <h2>y</h2>
            <h3>Control de Ventas</h3>
            <p>PROYECTO de BACKEND
            </p>
        </div>
        
    </section>
    <script src="Portada/main.js"></script>
</body>
</html>
<?php include('footer.php'); ?>
<style>
    .sidebarr {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 100;
  overflow-y: scroll;
  background-color: #fff;
}
</style>

