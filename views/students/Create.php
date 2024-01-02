<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/StudentCreate.css">
    <title>Document</title>
</head>
<body>
    <div id=bodyy>
        <header class="cabecera">
            <div  class="titulo">
                <h1 id = "titulo"><?php echo $dato['titulo']?></h1>
            </div>
        </header>
        <form id="nuevo" method="POST" action="index.php?c=Student&a=store">
            <section id="encuesta">
                    <div class="formulario__grupo" id="formulario__Nombre">
                        <input class="control" type="text" id="Nombre" name="Nombre" required placeholder="Nombre" 
                        value="<?php echo $dato["student"]['nombre'];?>">
                        <div id="mensaje"class="alert-danger">Campo vacío o invalidos!</div>
                    </div>
                    
                    <div class="formulario__grupo" id="formulario__Apellido">
                        <input class="control" type="text" id="Apellido" name="Apellido" required placeholder="Apellido"
                        value="<?php echo $dato["student"]['apellido'];?>">
                        <div id="mensaje" class="alert-danger">Campo vacío o invalidos!</div>
                    </div>
                        <?php
                        if($dato["student"]['genero']==''){
                            $genero="GENERO";
                        }else{
                            $genero=$dato["student"]['genero'];
                        }
                        ?>
                    <div class="formulario__grupo" id="formulario__Genero">
                        <select id="Genero" name="Genero"  class="control" required>
                            <option value=<?php echo $genero ?>><?php echo $genero ?></option>
                            <option>Masculino</option>
                            <option>Femenino</option>
                        </select>
                        <div id="mensaje"class="alert-danger">Campo vacío o invalidos!</div>
                    </div>
                    
                    <div class="formulario__grupo" id="formulario__DNI">
                        <input class="control" type="text" id="Dni" name="Dni" required placeholder="Dni"
                        value="<?php echo $dato["student"]['dni'];?>">
                        <div id="mensaje"class="alert-danger">Campo vacío o invalidos!</div>
                    </div>    
                    
                    <div class="formulario__grupo" id="formulario__Direccion">
                        <input class="control" type="text" id="Direccion" name="Direccion" required placeholder="Dirección"
                        value="<?php echo $dato["student"]['direccion'];?>">
                        <div id="mensaje"class="alert-danger">Campo vacío o invalidos!</div>
                    </div>

                    <div class="formulario__grupo" id="formulario__Correo">
                        <input class="control" type="text" id="Correo" name="Correo" required placeholder="Correo"
                        value="<?php echo $dato["student"]['correo'];?>"> 
                        <div id="mensaje"class="alert-danger">Campo vacío o invalidos!</div>
                    </div>
                    
                    <div class="formulario__grupo" id="formulario__Celular">
                        <input class="control" type="text" id="Celular" name="Celular" required placeholder="Celular"
                        value="<?php echo $dato["student"]['celular'];?>">
                        <div id="mensaje"class="alert-danger">Campo vacío o invalidos!</div>
                    </div>

                    <div class="formulario__grupo" id="formulario__FN">
                        <input class="control" type="date" id="FN" name="FN" required placeholder="Fecha de nacimiento"
                        value="<?php echo $dato["student"]['fecha_n'];?>">
                        <div id="mensaje"class="alert-danger">Campo vacío o invalidos!</div>
                    </div>
                    
                    <?php
                    if($dato["student"]['grupo_s']==''){
                        $g_s="GRUPO SANGUÍNEO";
                    }else{
                        $g_s=$dato["student"]['grupo_s'];
                    }
                    ?>
                    <div class="formulario__grupo" id="formulario__GS">
                        <select id="GS" name="GS" class="control" required>
                            <option value=<?php echo $g_s ?>> <?php echo $g_s ?> </option>
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                            <option>O+</option>
                            <option>O-</option>
                        </select> 
                        <div id="mensaje"class="alert-danger">Campo vacío o invalidos!</div> 
                    </div>
    
                    <?php
                    if($dato["student"]['grado']==''){
                        $gd="GRADO";
                    }else{
                        $gd=$dato["student"]['grado'];
                    }
                    ?>
                    <div class="formulario__grupo" id="formulario__Grado">
                        <select id="Grado" name="Grado" class="control" required>
                            <option value=<?php echo $gd ?>> <?php echo $gd ?> </option>
                            <option>P-1</option>
                            <option>P-2</option>
                            <option>P-3</option>
                            <option>P-4</option>
                            <option>P-5</option>
                            <option>P-6</option>
                            <option>S-1</option>
                            <option>S-2</option>
                            <option>S-3</option>
                            <option>S-4</option>
                            <option>S-5</option>
                        </select>
                        <div id="mensaje"class="alert-danger">Campo vacío o invalidos!</div>
                    </div>
                    
                    <?php
                    if($dato["student"]['seccion']==''){
                        $sc="SECCIÓN";
                    }else{
                        $sc=$dato["student"]['seccion'];
                    }
                    ?>
                    <div class="formulario__grupo" id="formulario__Seccion">
                        <select id="Seccion" name="Seccion"  class="control" required>
                            <option value= <?php echo $sc ?> > <?php echo $sc ?>  </option>
                            <option>A</option>
                            <option>B</option>
                        </select> 
                        <div id="mensaje"class="alert-danger">Campo vacío o invalidos!</div>
                    </div>
                    
                    <input class="control1" type="text" id="action" name="action"
                    value="<?php echo $dato['titulo']?>"> 
                    <br>
                    <input class="control1" type="text" id="id" name="id"
                    value="<?php echo $dato["student"]['id']?>">     
                    <style>
                        .control1{
                            opacity:0;
                        } 
                    </style>    
            </section>
            
            <div id="lado2">
                <section id="logo">
                <img src="ING_LOGO/logo-personas.png" 
                alt="logo-persona" class="logo-personas">
                </section>
                <div id="botones">
                    <section id="btnCrear">
                    <input id="crear" class="btn" type="submit" value="Guardar">
                    </section>
                    <section id="btnCancelar">
                    <input id="cancelar" class="btn" type="submit" value="Cancelar" href="index.php">
                    </section>  
                    <section id="btnEliminar">
                    <input id="eliminar" class="btn" type="submit" value="eliminar" href="index.php">
                    </section>  
                </div>
                            
            </div>
        </form>

        <div class="mt-3" id="respuesta">

        </div>
    </div> 

    <script src="estilo/StudentCreate.js" charset="utf-8" ></script>
</body>
</html>