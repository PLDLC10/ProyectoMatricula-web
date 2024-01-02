<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/UsuarioCreate.css">
    <title>Document</title>
</head>
<body>
    <div id=bodyy>
        <header class="cabecera">
            <div class="titulo">
                <h1><?php echo $data['titulo']?></h1>
            </div>
        </header>
        <form id="nuevo"method="POST" action="index.php?c=Usuario&a=store">
            <section id="encuesta">
                <div class="formulario__grupo" id="formulario__Correo">
                    <input class="control" type="text" id="Correo" name="Correo"  placeholder="Correo" > 
                    <div class="alert-danger">Campo vacío o invalidos!</div>
                </div>
                    
                <div class="formulario__grupo" id="formulario__Nombre">
                    <input class="control" type="text" id="Nombre" name="Nombre" required placeholder="Nombre">
                    <div class="alert-danger">Campo vacío o invalidos!</div>
                </div>

                <div class="formulario__grupo" id="formulario__Apellido">
                    <input class="control" type="text" id="Apellido" name="Apellido" required placeholder="Apellido">
                    <div class="alert-danger">Campo vacío o invalidos!</div>
                </div>

                <div class="formulario__grupo" id="formulario__Celular">
                    <input class="control" type="text" id="Celular" name="Celular" required placeholder="Celular">              
                    <div class="alert-danger">Campo vacío o invalidos!</div>
                </div>

                <div class="formulario__grupo" id="formulario__DNI">
                    <input class="control" type="text" id="DNI" name="DNI" required placeholder="DNI">
                    <div class="alert-danger">Campo vacío o invalidos!</div>
                </div>

                <div class="formulario__grupo" id="formulario__Contraseña">
                    <input class="control" type="text" id="Contraseña" name="Contraseña" required placeholder="contraseña">
                    <div class="alert-danger">Campo vacío o invalidos!</div>
                </div>
            </section>
            

            <div id="lado2">
                <section id="logo">
                <img src="ING_LOGO/logo-personas.png" 
                alt="logo-persona" class="logo-personas">
                </section>
                <div id="botones">
                    <section id="btnCrear">
                    <input id="guardar" class="btn" type="submit" value="Guardar" >
                    </section>
                    <section id="btnCancelar">
                    <input id="cancelar" class="btn" type="submit" value="Cancelar">
                    </section>  
                </div>
                             
            </div>
            
        </form>
        
    </div> 
    <div class="mt-3" id="respuesta">
        
    </div>
    
    <script src="estilo/UsuarioCreate.js" charset="utf-8" ></script>
</body>
</html>