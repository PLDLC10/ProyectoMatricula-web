<?php
require_once "models/StudentModel.php";

class StudentController{
    public function create($data=""){
        if($data==""){
            $dato["titulo"] = "NUEVO ESTUDIANTES";
            $dato["student"]['id']='';
            $dato["student"]['genero']='';
            $dato["student"]['direccion']='';
            $dato["student"]['correo']='';
            $dato["student"]['celular']='';
            $dato["student"]['fecha_n']='';
            $dato["student"]['grupo_s']='';
            $dato["student"]['grado']='';
            $dato["student"]['seccion']='';
            $dato["student"]['aula']='';
            $dato["student"]['nombre']='';
            $dato["student"]['apellido']='';
            $dato["student"]['dni']='';
            require_once "views/Students/create.php";
        }
        else{
            $dato["titulo"] = "ACTUALIZAR DATOS DE ESTUDIANTE";
            $dato["student"]['id']=$data["student"]['id'];
            $dato["student"]['genero']=$data["student"]['genero'];
            $dato["student"]['direccion']=$data["student"]['direccion'];
            $dato["student"]['correo']=$data["student"]['correo'];
            $dato["student"]['celular']=$data["student"]['celular'];
            $dato["student"]['fecha_n']=$data["student"]['fecha_n'];
            $dato["student"]['grupo_s']=$data["student"]['grupo_s'];
            $dato["student"]['grado']=$data["student"]['grado'];
            $dato["student"]['seccion']=$data["student"]['seccion'];
            $dato["student"]['aula']=$data["student"]['aula'];
            $dato["student"]['nombre']=$data["student"]['nombre'];
            $dato["student"]['apellido']=$data["student"]['apellido'];
            $dato["student"]['dni']=$data["student"]['dni'];
            
            require_once "views/Students/create.php";
        }
      /*  $data["titulo"] = "NUEVO ESTUDIANTES";
        require_once "views/Students/create.php";
        */
    }
    public function index(){
      //  $data["titulo"] = "nuevo estudiante";
        require_once "views/Students/index.php";
    }
    public function administrar(){
          $data["titulo"] = "ADMINISTRAR MATRICULAS";
          require_once "views/Students/administrar.php";
    }
    public function administrarStudent($id){
        $student = new StudentModel();
        $data["student"] = $student->listxedit($id);
        $this->create($data); 
       // print_r($data);
    }
    public function list(){
        $student = new StudentModel();
        $data["titulo"] = "LISTAR ESTUDIANTES";
        $data["student"] = $student->list();
        require_once "views/Students/list.php";
    }
    public function listt(){
        $student = new StudentModel();
        $data["titulo"] = "LISTAR ESTUDIANTES";
        $data["student"] = $student->listt($_GET['aula']);
        require_once "views/Students/list.php";   
    }
    public function store(){
        
        if($_POST['action']=="NUEVO ESTUDIANTES"){
            $DNI = $_POST['Dni'];
            $student = new StudentModel();
            $data["student"] = $student->validar($DNI);
            
            if($data["student"]==null){

                $Grado = $_POST['Grado'];
                $Seccion = $_POST['Seccion'];
                $str = substr($_POST['Grado'], 2,);
                $Aula = "SALON-".$Seccion."".$str;
                $data["students"] = $student->list_matriculaxaula($Aula);
                if($data["students"]['MATRICULADOS']<"20"){

                    $Nombre = $_POST['Nombre'];
                    $Apellido = $_POST['Apellido'];
                    $Genero = $_POST['Genero'];
                    $DNI = $_POST['Dni'];
                    $Direccion = $_POST['Direccion'];
                    $Correo = $_POST['Correo'];
                    $Celular = $_POST['Celular'];
                    $FN = $_POST['FN'];
                    $GS = $_POST['GS'];
                    $Grado = $_POST['Grado'];
                    $Seccion = $_POST['Seccion'];
                    $str = substr($_POST['Grado'], 2,);
                    $Aula = "SALON-".$Seccion."".$str;

                    $student = new StudentModel();
                    $student ->insertar($Nombre,$Apellido,$Genero,$DNI,$Direccion,$Correo,$Celular
                    ,$FN,$GS,$Grado,$Seccion,$Aula);
                    echo json_encode('usuario registrado');

                }else{
                    echo json_encode('el salon esta lleno');
                }
   
            }else{
                echo json_encode('el dni ya esta reguistrado');
            }
        }
        else{
                $Nombre = $_POST['Nombre'];
                $Apellido = $_POST['Apellido'];
                $Genero = $_POST['Genero'];
                $DNI = $_POST['Dni'];
                $Direccion = $_POST['Direccion'];
                $Correo = $_POST['Correo'];
                $Celular = $_POST['Celular'];
                $FN = $_POST['FN'];
                $GS = $_POST['GS'];
                $Grado = $_POST['Grado'];
                $Seccion = $_POST['Seccion'];
                $str = substr($_POST['Grado'], 2,);
                $Aula = "SALON-".$Seccion."".$str;
                $id= $_POST['id'];
                $student = new StudentModel();
                $student ->actulizar($Nombre,$Apellido,$Genero,$DNI,$Direccion,$Correo,$Celular
                ,$FN,$GS,$Grado,$Seccion,$Aula,$id);
                echo json_encode('usuario actualizado');
        }
    }
    public function buscador(){
        $student = new StudentModel();
        $students = $student->buscadoAvanzado($_GET['dni'] ?? '00');
        echo json_encode($students);
    }
    public function list_matriculas(){
        $student = new StudentModel();
        $students = $student->list_matricula();
        echo json_encode($students);
    }public function destroy(){
        $id= $_POST['id'];
        $student = new StudentModel();
        $student ->eliminar($id);
    }
    public function reporte(){
        $student = new StudentModel();
        $data["titulo"] = "LISTA DE ESTUDIANTES";
        $data["student"] = $student->listt($_GET['aula']);
        require_once "views/Students/reporte.php";  
    }

}