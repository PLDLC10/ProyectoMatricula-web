<?php
 require_once "models/UsuarioModel.php";

class UsuarioController{
    public function index(){
        $data["titulo"] = "LOGIN";
        require_once "views/usuarios/index.php";
    }

    public function create(){
        $data['titulo'] = "CREAR CUENTA";
        require_once "views/usuarios/create.php";
    }
    public function menu(){
        require_once "views/usuarios/menu.php";
    }
    public function validar(){
        $usuarios = new UsuarioModel();
        $data['titulo'] = "VALIDAR";
        $data["usuarios"] = $usuarios->getUsuarios();
        if($data["usuarios"]==null){
            $data['titulo'] = "NO HAY DATOS A VALIDAR";
            require_once "views/usuarios/sinDatos.php";
        }else{
            require_once "views/usuarios/validar.php";
        }
    }
    public function edit($id){
        $usuarios = new UsuarioModel();
        $usuarios ->actualizar($id);
        $this->validar();
    }
    public function store(){
        $Correo = $_POST['Correo'];
        $Password = md5($_POST['Contraseña']);
        $Nombre = $_POST['Nombre'];
        $Apellido = $_POST['Apellido'];
        $Celular = $_POST['Celular'];
        $DNI = $_POST['DNI'];

        $usuarios = new UsuarioModel();
        $data["usuarios"] = $usuarios->validar($DNI);
        if(is_null($data["usuarios"])){
            echo json_encode('USUARIO REGISTRADO');
            $usuarios ->insertar($Correo, $Password,$Nombre,$Apellido,$Celular,$DNI);
        }else{
            echo json_encode('El DNI: '.$DNI.' YA EXISTE');
        }
    }
    public function login(){
        $Correo = $_POST['Correo'];
        $Password = md5($_POST['Contraseña']);
        $usuarios = new UsuarioModel();
        $data["usuarios"] = $usuarios ->login($Correo, $Password);
        if(is_null($data["usuarios"])){
            $data["titulo"] = "LOGIN";
            echo("no esta validado");
            require_once "views/usuarios/index.php";   
        }else{
            if($data["usuarios"]['correo']=="admin.01@hotmail.com"){

                require_once "views/usuarios/menu.php";
            }else if($data["usuarios"]['validado']=="si"){
                require_once "views/usuarios/menu.php";
            }
        }
    }
    public function prueba(){
        echo "prueba";
    }
}