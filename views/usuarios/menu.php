<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/UsuarioMenu.css">
    <title>Document</title>
</head>
<body>

    <div id="sidebar">
        <div class="toggle-btn">
            <span>&#9776;</span>
        </div>
        <ul class="controles">
            <li>
            <img src="ING_LOGO/logo_escuela.png"alt="logo de la I.E" width="120">
            </li>
            <li class="control" id="validar"><a href="index.php?c=Usuario&a=validar">Validar usuarios</a></li>
            <li class="control" id="crear"><a href="index.php?c=Student&a=Create">Crear matriculas</a></li>
            <li class="control" id="administrar"><a href="index.php?c=Student&a=administrar">Administrar matriculas</a></li>
            <li class="control" id="listar"><a href="index.php?c=Student&a=list">Listar matriculas</a></li>
        </ul>
    </div>
    <div id="estados">
        <div id=contenedor>
            <div>
                <h1 id ="cabecera"> ESTADO DE SALONES</h1>
            </div>
            
            <div id="contenedor_tabla">
                <section class="tabla">
                    <table border= "1" width="80%" cellspacing="0">
                    <thead>
                        <th>Grado</th>
                        <th>Sección</th>
                        <th>Aula</th>
                        <th>Matriculados</th>
                        <th>Vacantes</th>
                    </thead>
                    
                    <tbody>
                        <?php

                        ?>
                    </tbody>
                    
                    </table>
                </section>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        window.onload= function cargaPagina(e){
            fetch("index.php?c=Student&a=list_matriculas")
            .then(resp => resp.json())
            .then(resp => {
                let tabla = document.querySelector(".tabla tbody");
                let html = resp.map(function(row){
                    return `<TR>
                        <td>${row.grado}</td>
                        <td>${row.seccion}</td>
                        <td>${row.aula}</td>
                        <td>${row.MATRICULADOS}</td>
                        <td>${row.vacantes}</td>
                    </TR>`;
                }).join('');
                tabla.innerHTML = html;
            });
        }
    </script>
    <script src="estilo/main.js" charset="utf-8"></script>
</body>
</html>