document.getElementById("cancelar").addEventListener("click",ruta1);
document.getElementById("guardar").addEventListener("click",ruta2);
var respuesta = document.getElementById('respuesta')
const inputs = document.querySelectorAll('#nuevo input');
const encuesta = document.getElementById('nuevo');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-\+]{1,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	Correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{9}$/, // 7 a 14 numeros.
    dni: /^\d{8}$/ // 7 a 14 numeros.
}

const campos = {
    Correo: false,
    Contraseña: false,
	Nombre: false,
	Apellido: false,
	Celular: false,
	DNI: false
}
const validaFormulario = (e) => {
    switch (e.target.name) {
        case "Correo":
            validarCampo(expresiones.Correo, e.target, 'Correo');
        break;
    
        case "Contraseña":
            validarCampo(expresiones.password, e.target, 'Contraseña');
        break;

        case "Nombre":
            validarCampo(expresiones.nombre, e.target, 'Nombre');
        break;
    
        case "Apellido":
            validarCampo(expresiones.nombre, e.target, 'Apellido');
        break;

        case "Celular":
            validarCampo(expresiones.telefono, e.target, 'Celular');
        break;
    
        case "DNI":
            validarCampo(expresiones.dni, e.target, 'DNI');
        break;
    }
}

const validarCampo = (expresion, input, campo) =>{
    if (expresion.test(input.value)) {
        document.querySelector(`#formulario__${campo} .alert-danger`).classList.add("alert-danger-activo");
        campos[campo] = true;
    }else{
        document.querySelector(`#formulario__${campo} .alert-danger`).classList.remove("alert-danger-activo");
        
        campos[campo] = false;
    }
}
inputs.forEach((input)=>{
    input.addEventListener('keyup',validaFormulario);
    input.addEventListener('blur',validaFormulario);
    
});


var formulario = document.getElementById('nuevo');
function ruta1(e){
    e.preventDefault();
    
    document.location.href = ("http://localhost/UCV-PROYECTO-Siclo-VI/index.php?c=Usuario&a=index");
}
function ruta2(e){
    e.preventDefault();
    var datos = new FormData(formulario);  
    if(campos.Correo && campos.Contraseña && campos.Nombre && campos.Apellido && campos.Celular && campos.DNI){

        fetch('http://localhost/UCV-PROYECTO-Siclo-VI/index.php?c=Usuario&a=store',{
        method: 'POST',
        body: datos
        })
       .then(response => response.json())
       .then(data => {
            if(data === 'USUARIO REGISTRADO'){
                respuesta.innerHTML = 
                `<div class="alert--alert-primary" role="alert">
                    EL USUARIO HA SIDO REGISTRADO
                </div>
                <style>
                .alert--alert-primary{
                    margin-left: 40%;
                    color:#FA4720;
                    border: 1px solid red;
                    width: 150px;
                    background-color: #FF866C;
                }
                </style>`
                encuesta.reset();
            }else{
                respuesta.innerHTML = 
                `<div class="alert--alert-danger" role="alert">
                    ${data}
                </div>
            
                <style>
                .alert--alert-danger{
                    margin-left: 40%;
                    color:#FA4720;
                    border: 1px solid red;
                    width: 150px;
                    background-color: #FF866C;
                }
                </style>`
                
            }
            
       })
    }else{
       respuesta.innerHTML=
       `<div class="alert--alert-danger" role="alert">
            RELLENA TODOS LOS CAMPOS
        </div>
        <style>
            .alert--alert-danger{
                margin-left: 40%;
                color:#FA4720;
                border: 1px solid red;
                width: 150px;
                background-color: #FF866C;
            }
        </style>
       `
    }
}