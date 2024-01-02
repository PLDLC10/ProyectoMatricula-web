<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/UsuarioIndex.css">
    <title>Document</title> 
</head>
<body>
    <header class="cabecera">
            <div class="logo">
                <img src="ING_LOGO/logo_escuela.png"alt="logo de la I.E" class="logo-img">
                <h3 class="nombre_escuela">I.E PRIVADA SAN JOSÉ SCHOOL SANTA ANITA</h3>
            </div>
    </header>
    <div class="cuerpo">
            <header>
                <img src="ING_LOGO/logo-personas.png" alt="logo-persona" class="logo-personas">
                <h4><?php echo $data['titulo']?></h4>
            </header>
            <form method="POST" action="index.php?c=Usuario&a=login">
                <div class="username">
                    <input type="text" id="Correo" name="Correo" required>
                    <br>
                    <label> Correo</label>
                </div>
                <div class="contraseña">
                    <input type="text" id="Contraseña" name="Contraseña" required>
                    <br>
                    <label> contraseña</label>
                </div>
                <input type="submit" value="Iniciar">
                <div class="registrarse">
                    Quiero <a href="index.php?c=Usuario&a=create"> registrarme</a>
                    Quiero <a href="index.php?c=Usuario&a=menu"> menu</a>
                </div>
            </form>   
    </div>
</body>
</html>