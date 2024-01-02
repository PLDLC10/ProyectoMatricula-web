<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/UsuarioValidar.css">
    <link rel="stylesheet" href="estilo/UsuarioMenu.css">
    <title>Document</title>
</head>
<body>
    <div class="cuerpo" alin>       
        <header>
            <h1><?php echo $data['titulo']?></h1>
        </header>
        <form method="post">
            <section class="tabla">
                <table border= "1" width="80%" cellspacing="0" class="tabla_datos">
                    <thead>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Celular</th>
                        <th>DNI</th>
                        <th>id</th>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($data["usuarios"] as $dato){   
                                echo "<tr>";
                                echo "<td>". $dato['nombre']."</td>";
                                echo "<td>". $dato['apellido']."</td>";
                                echo "<td>". $dato['celular']."</td>";
                                echo "<td>". $dato['dni']."</td>";
                                echo "<td>". $dato['id']."</td>";
                                echo "<tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </section>
            <section class="btn-box">          
               <?php  echo "<a class='btn' onclick='return confirmacion()' href='index.php?c=Usuario&a=edit&id=".$dato["id"]."' > validar</a>"  ?>
               
            </section>         
        </form>    
    </div>
    <script type="text/javascript">
        function confirmacion(){
            var respuesta = confirm("¿Deseas validar a este usuario?");
            if(respuesta==true){
                return  true;
            }else{
                return false;
            }
        }
    </script>
</body>
</html>