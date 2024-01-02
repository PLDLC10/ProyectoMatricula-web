<?php
    class UsuarioModel{
        private $db;
        private $usuarios;

        public function __construct(){
            $this->db= Conectar::conexion();
            $this->usuarios = array();
        }
        public function getUsuarios(){
            $sql = "select * from usuarios WHERE validado is null";
            $resultado = $this->db ->query($sql);
            while($row = $resultado->fetch_assoc()){
                $this->usuarios[] = $row;
            }
            return $this->usuarios;
        }
        public function actualizar($id){
            $sql = "update `usuarios` set
            validado = 'si'
            WHERE id = '$id'";
            $resultado = $this->db ->query($sql);
            return $resultado;
        }
        public function insertar($Correo, $Password,$Nombre,$Apellido,$Celular,$DNI){
            $sql ="insert into `usuarios` (correo, password, nombre, apellido, celular, dni) 
            values ('$Correo', '$Password','$Nombre','$Apellido','$Celular','$DNI')";
            $resultado = $this->db ->query($sql);
            return $resultado;
        }
        public function login($Correo,$Password){
            $sql ="select * from `usuarios` WHERE correo ='$Correo' && 
            password ='$Password' && validado = 'si'";
            $resultado = $this->db ->query($sql);
            $row = $resultado->fetch_assoc();
            return $row;
        }
        public function validar($DNI){
            $sql = "select * from `usuarios` WHERE dni ='$DNI'";
            $resultado = $this->db ->query($sql);
            $row = $resultado->fetch_assoc();
            return $row;
        }

        
    }
?>