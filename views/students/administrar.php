<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/StudentAdministrar.css">
    <title>Document</title>
</head>
<body>
    <div class="cuerpo">
        <header>
            <h1><?php echo $data['titulo']?></h1>
        </header>
        <section class="buscador">
                <input  class="control" type="text" required placeholder="DNI" id="input_buscar" onkeyup="click()">
                <br>
        </section>
        
        <form method="POST" action="index.php?c=Student&a=">
            <section class="tabla">
                <table border= "1" width="80%" cellspacing="0">
                    <thead>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Genero</th>
                        <th>Grado</th>
                        <th>Seccion</th>
                        <th>Aula</th>
                        <th>Correo</th>
                        <th>Celular</th>
                        <th>Dni</th>
                    </thead>
                    
                    <tbody>
                        <?php
                        /* foreach ($data["usuarios"] as $dato){   
                                
                                echo "<th>". $dato['nombre']."</th>";
                                echo "<th>". $dato['apellido']."</th>";
                                echo "<th>". $dato['celular']."</th>";
                                echo "<th>". $dato['dni']."</th>";
                            }
                            */
                        ?>
                    </tbody>
                    
                </table>
            </section>
            <section class="btn-box">
                <button class="btn" >ADMINISTRAR</button>
            </section>
        </form>   
    </div>
    <script type="text/javascript">

        let input = document.getElementById("input_buscar");
        input.addEventListener('keyup', function(e){
            console.log(e.target.value);
            fetch("index.php?c=Student&a=buscador&dni="+e.target.value)
            .then(resp => resp.json())
            .then(resp => {
                let tabla = document.querySelector(".tabla tbody");
                let html = resp.map(function(row){
                    // data-data='${JSON.stringify(row)}'
                    return `<TR data-id=${row.id}>
                        <td>${row.nombre}</td>
                        <td>${row.apellido}</td>
                        <td>${row.genero}</td>
                        <td>${row.grado}</td>
                        <td>${row.seccion}</td>
                        <td>${row.aula}</td>
                        <td>${row.correo}</td>
                        <td>${row.celular}</td>
                        <td>${row.dni}</td>
                    </TR>`;
                }).join('');
                tabla.innerHTML = html;
                console.log(resp);
                console.log(html);
            });
        });
        
        let id_student;
        let tabla = document.querySelector(".tabla tbody");
        tabla.addEventListener('click', function(e){
            if(e.target.tagName === 'TD'){
                id_student = e.target.parentNode.attributes.getNamedItem('data-id').value;
                console.log(id_student);
                document.location.href = ("http://localhost/UCV-PROYECTO-Siclo-VI/index.php?c=Student&a=administrarStudent&id="+id_student)
            }
        });


    </script>
</body>
</html>