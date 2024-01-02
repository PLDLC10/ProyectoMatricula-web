<?php
class Conectar{
    private $conexion;
    public static function conexion(){
        $conexion = new mysqli("localhost","root","62670638","mvc_school");
        return $conexion;
    }
}