<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Ingreso al sistema...</title>
    <link rel="stylesheet" href="login/styles.css">
    
 
</head>
<body>
<div class="container-form sign-up">
        <div class="welcome-back">
            <div class="message">
                <h1>Bienvenido
                </h1>
                <p> 
                    Inicia sesion aquí.</p>
               
            </div>
    <center>
        <br>
        <br>


</div>

 
<form  class="formulario" name="login" method="post" action="valida.php">
<h2 class="create-account">Iniciar Sesión</h2>
<div class="mb-3">
   <p class="cuenta-gratis">Ingresa tus datos: </p>
    <label for="Usuario" class="form-label">Usuario</label>
    <input type="text" class="form-control" id="usuario" name="usua" >
     </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password" name="pass">
  </div>
  
  <button type="submit" name="envia_login" class="sign-in-btn">Ingresar</button>
            <button type="reset" class="sign-in-btn">Limpiar</button>


</form>
 
 </div>
  </div>
</div>
<script src="login/main.js"></script>
</center>
</body>
</html>

