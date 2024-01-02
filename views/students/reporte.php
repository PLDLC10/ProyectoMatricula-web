<?php
//require_once APP_BASE_DIR . '/mpfd/vendor/autoload.php';
$html='
<img src="ING_LOGO/logo_escuela.png"alt="logo de la I.E" class="logo-img">
<br>
<br>
<h3  class="cabecera">';
$html .=$data['titulo'];
$html .='</h3>';
$html .='<br>';
$html .='<table border= "1" width="80%" cellspacing="0">';
$html .='<thead>
            <th>Grado</th>
            <th>Sección</th>
            <th>Aula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>';
            $html .=  '</thead>';
        $html .='<tbody>';
                 foreach($data["student"] as $dato){
                    $html .="<tr>";
                    $html .="<td>". $dato['grado']."</td>".
                    "<td>". $dato['seccion']."</td>".
                    "<td>". $dato['aula']."</td>".
                    "<td>". $dato['nombre']."</td>".
                    "<td>". $dato['apellido']."</td>".
                    "<td>". $dato['dni']."</td>".
                    "</tr>";
                };    
        $html .='</tbody>        
            </table>';
$html .='<br>';
$html .='<style>
.logo-img{
    height: 100px;
    margin-left: 40%;
}
';
$html .='<style>
.cabecera{
    background-color: red;
    margin-left:100px;
</style>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
?>