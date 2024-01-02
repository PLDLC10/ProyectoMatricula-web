<?php
    class StudentModel{
        private $db;
        private $student;
        private $usuarios = [];

        public function __construct(){
            $this->db= Conectar::conexion();
            $this->student = array();
        }
        public function insertar($Nombre,$Apellido,$Genero,$DNI,
        $Direccion,$Correo,$Celular,$FN,$GS,$Grado,$Seccion,$Aula){
            $sql = "insert into estudiantes (genero,direccion,
            correo,celular,fecha_n,grupo_s,grado,seccion,aula,nombre,
            apellido,dni) values ('$Genero','$Direccion','$Correo','$Celular',
            '$FN','$GS','$Grado','$Seccion','$Aula','$Nombre','$Apellido','$DNI')";
            $resultado = $this->db ->query($sql);
            return $resultado;
        }
        public function actulizar($Nombre,$Apellido,$Genero,$DNI,
        $Direccion,$Correo,$Celular,$FN,$GS,$Grado,$Seccion,$Aula,$id){
            $sql="UPDATE `estudiantes` SET 
            nombre= '$Nombre',
            apellido= '$Apellido',
            genero= '$Genero',
            dni= '$DNI',
            direccion= '$Direccion',
            correo= '$Correo',
            celular= '$Celular',
            fecha_n= '$FN',
            grupo_s= '$GS',
            grado= '$Grado',
            seccion= '$Seccion',
            aula= '$Aula'
            WHERE id='$id'";
            $resultado = $this->db ->query($sql);
            return $resultado;
        }
        public function buscadoAvanzado($DNI){
            $sql = "select * from `estudiantes` WHERE dni LIKE '%$DNI%'";
            $resultado = $this->db ->query($sql);
            while($row = $resultado->fetch_assoc()){
                $this->usuarios[] = $row;
            }
            return $this->usuarios;
        }
        public function list(){
            $sql="select * from `estudiantes`";
            $resultado = $this->db ->query($sql);
            while($row = $resultado->fetch_assoc()){
                $this->student[] = $row;
            }
            return $this->student;
        }
        public function listt($Aula){
            $sql="select * from `estudiantes` WHERE aula='$Aula'";
            $resultado = $this->db ->query($sql);
            while($row = $resultado->fetch_assoc()){
                $this->student[] = $row;
            }
            return $this->student;
        }
        public function list_matricula(){
            $sql= "select grado,seccion,aula,count(aula) MATRICULADOS, 20-count(aula) vacantes  from estudiantes group by grado,seccion,aula having count(aula) > 0;";
            $resultado = $this->db ->query($sql);
            while($row = $resultado->fetch_assoc()){
                $this->student[] = $row;
            }
            return $this->student;
        }
        
        public function list_matriculaxaula($Aula){
            $sql= "select grado,seccion,aula,count(aula) MATRICULADOS from estudiantes where aula='$Aula' group by grado,seccion,aula having count(aula) > 0; ";
            $resultado = $this->db ->query($sql);
            $row = $resultado->fetch_assoc();
            return $row;
        }
        
        public function listxedit($id){
            $sql="select * from `estudiantes` WHERE id='$id'";
            $resultado = $this->db ->query($sql);
            $row = $resultado->fetch_assoc();
            return $row;
        }
        public function validar($DNI){
            $sql = "select * from `estudiantes` WHERE dni ='$DNI'";
            $resultado = $this->db ->query($sql);
            $row = $resultado->fetch_assoc();
            return $row;
        }
        public function eliminar($id){
            $sql = "DELETE FROM estudiantes WHERE id = '$id'";
            $resultado = $this->db ->query($sql);
            return $resultado;
        }
        
    }
?>