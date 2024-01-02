<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/StudentList.css">
    <title>Document</title>
</head>
<body>
    <div class="cuerpo">
        <header>
            <h1><?php echo $data['titulo']?></h1>
        </header>
        <div class="buscar">
            <section class="buscador">
                <input class="control" type="text" id="Aula" name="Aula" required placeholder="AULA">
                <br>
            </section>
            <section class="btn-box">
                <button class="btn" id="btn">BUSCAR</button>
                <button class="btn" id="btn2">FICHA</button>
                <a class="btn" id="btn" target ="_blank" href="http://localhost/UCV-PROYECTO-Siclo-VI/index.php?c=Student&a=listt&aula="+aula.value>FICHA</a>
            </section>
        </div>
        <br>
        <section class="tabla">
            <table border= "1" width="80%" cellspacing="0">
                <thead>
                    <th>Grado</th>
                    <th>Sección</th>
                    <th>Aula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                </thead>
                
                <tbody>
                    <?php
                        foreach ($data["student"] as $dato){   
                            echo "<tr>";
                            echo "<td>". $dato['grado']."</td>";
                            echo "<td>". $dato['seccion']."</td>";
                            echo "<td>". $dato['aula']."</td>";
                            echo "<td>". $dato['nombre']."</td>";
                            echo "<td>". $dato['apellido']."</td>";
                            echo "<td>". $dato['dni']."</td>";
                            echo "</tr>";
                        }
                        
                    ?>
                </tbody>
                
            </table>
        </section>
    </div>  
    <script type="text/javascript">
        var aula= document.getElementById("Aula");
        document.getElementById("btn").addEventListener("click", myFunction);
        document.getElementById("btn2").addEventListener("click", myFunction2);

        function myFunction(){
           document.location.href = ("http://localhost/UCV-PROYECTO-Siclo-VI/index.php?c=Student&a=listt&aula="+aula.value);
        };
        function myFunction2(){
           document.location.href = ("http://localhost/UCV-PROYECTO-Siclo-VI/index.php?c=Student&a=reporte&aula="+aula.value);
        };

    </script>
</body>
</html>