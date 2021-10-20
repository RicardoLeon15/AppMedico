<!DOCTYPE html>
<html lang="es-en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Incluimos materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">        
    <!-- Vinculamos los iconos-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">

</head>
<body>
    <!--Generamos nuestra barra de menu-->
    <nav>
      <div class="nav-wrapper menu">
          <a href="#" class="brand-logo logo">Logo</a>
      </div>
    </nav>
    <br><br>
    
    <div class="login">
        <div class="loginCard">       
            <br><br>     
            <form action="" id="formIniciarSesion">
                <label>Usuario</label>
                <input type="text" id="usuario" name="Usuario">
                <br>
                <label>Contraseña</label>
                <input type="password" id="contraseña" name="Contraseña">
                <button>Iniciar sesión</button>
            </form>
        </div>
    </div>

    <!--Generamos el footer--> 
    <br></br>
    <footer class="page-footer" style="background-color: #012e46">
        <div class="footer-copyright">
          <div class="container" style="text-align:center;">
          © 2021 appMedica, todos los derechos reservados
          </div>
        </div>
    </footer>
            

</body>
</html>