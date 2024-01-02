var btnCanelar = document.getElementById('cancelar');
var btnCrear = document.getElementById('crear');
var btnEliminar = document.getElementById('eliminar');
var titulo = document.getElementById('titulo').value;
btnCanelar.addEventListener("click",ruta);
btnCrear.addEventListener("click",ruta2);
btnEliminar.addEventListener("click",ruta3);
const inputs = document.querySelectorAll('#nuevo input');
const inputs2 = document.querySelectorAll('#nuevo select');
const encuesta2 = document.getElementById('nuevo');
var respuesta = document.getElementById('respuesta');
var mensaje = document.getElementById('mensaje');



const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-\+]{1,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos. 
	Correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{9}$/, // 7 a 14 numeros.
    dni: /^\d{8}$/ // 7 a 14 numeros.
}

const campos2 = {
    Nombre: false,
    Apellido: false,
    Genero: false,
    DNI: false,
    Direccion:false,
    Correo: false,
    Celular: false,
    Fecha_n: false,
    GS: false,
    Grado: false,
    Seccion: false
}
const validaFormulario = (e) => {
    switch (e.target.name) {
        case "Nombre":
            validarCampo(expresiones.nombre, e.target, 'Nombre');
        break;
        case "Apellido":
            validarCampo(expresiones.nombre, e.target, 'Apellido');
        break;
        case "Dni":
            validarCampo(expresiones.dni, e.target, 'DNI');
        break;
        case "Direccion":
            validarCampo(expresiones.nombre, e.target, 'Direccion');
        break;
        case "Correo":
            validarCampo(expresiones.Correo, e.target, 'Correo');
        break;
        case "Celular":
            validarCampo(expresiones.telefono, e.target, 'Celular');
        break;
    }
}
const validarCampo = (expresion, input, campo) =>{
    if (expresion.test(input.value)) {
        document.querySelector(`#formulario__${campo} .alert-danger`).classList.add("alert-danger-activo");
        campos2[campo] = true;
    }else{
        document.querySelector(`#formulario__${campo} .alert-danger`).classList.remove("alert-danger-activo");
        
        campos2[campo] = false;
    }
}

inputs.forEach((input)=>{
    input.addEventListener('keyup',validaFormulario);
    input.addEventListener('blur',validaFormulario);
});
inputs2.forEach((input2)=>{
    input2.addEventListener('click',validarSelector);   
});
function validarSelector(e){     
        campo=e.target.name
        switch(e.target.name){
            case "Genero":
                if(e.target.value!="GENERO"){
                    pintar(campo);
                }else{
                    noPintar(campo);
                };
            break;
            case "GS":
                if(e.target.value!="GRUPO"){  
                    pintar(campo);
                }else{
                    noPintar(campo);
                };
            break;
            case "Grado":
                if(e.target.value!="GRADO"){
                pintar(campo);
                }else{
                    noPintar(campo);
                };
            break;
            case "Seccion":
                if(e.target.value!="SECCIÓN"){
                pintar(campo);
                }else{
                    noPintar(campo);
                };
            break;
        }
}
function pintar(campo){
    document.querySelector(`#formulario__${campo} .alert-danger`).classList.add("alert-danger-activo");
    campos2[campo] = true;
}
function noPintar(campo){
    document.querySelector(`#formulario__${campo} .alert-danger`).classList.remove("alert-danger-activo");
    campos2[campo] = false;
}

var FN = document.getElementById('FN');
    FN.addEventListener('click',function(e){
        
        if (e.target.value!=""){
            document.querySelector(`#formulario__FN .alert-danger`).classList.add("alert-danger-activo");
            campos2.Fecha_n = true;     
        }else{
            document.querySelector(`#formulario__FN .alert-danger`).classList.remove("alert-danger-activo");
            campos2.Fecha_n = false; 
        }
    })

    function ruta(e){
        e.preventDefault();
        document.location.href = ("http://localhost/UCV-PROYECTO-Siclo-VI/index.php?c=Usuario&a=menu");
    }
    var formulario = document.getElementById('nuevo');


    window.onload= function cargaPagina(e){
        if (titulo='ACTUALIZAR DATOS DE ESTUDIANTE'){

        }else{
            console.log('no estas actualizando')
        }
    }

    function ruta2(e){
        e.preventDefault();
        console.log(campos2.Nombre)
        
        var datos = new FormData(formulario); 

        if(campos2.Nombre && campos2.Apellido && campos2.Genero && campos2.DNI && campos2.Direccion && campos2.Correo &&
            campos2.Celular && campos2.Fecha_n && campos2.GS && campos2.Grado && campos2.Seccion)
            {
                

                fetch('http://localhost/UCV-PROYECTO-Siclo-VI/index.php?c=Student&a=store',{
                method: 'POST',
                body: datos
                })
                .then(response => response.json())
                .then(data => {
                    switch (data){
                        case "usuario actualizado":
                                respuesta.innerHTML = 
                            `<div class="alert--alert-primary" role="alert">
                                EL USUARIO HA SIDO ACTUALIZADO
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
                            encuesta2.reset();
                        break;
                        case "el dni ya esta reguistrado":
                                respuesta.innerHTML = 
                                `<div class="alert--alert-primary" role="alert">
                                    EL DNI YA ESTA REGISTRADO
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
                        break;
                        case "usuario registrado":
                                respuesta.innerHTML = 
                                `<div class="alert--alert-primary" role="alert">
                                    EL ESTUDIANTE FUE REGISTRADO
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
                                encuesta2.reset();
                        break;
                        case "el salon esta lleno":
                                respuesta.innerHTML = 
                                `<div class="alert--alert-primary" role="alert">
                            EL SALON ESTÁ LLENO
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
                        break;
                    }
                })
            }
            else{
                respuesta.innerHTML = 
                    `<div class="alert--alert-primary" role="alert">
                        RELLENE TODOS LOS CAMPOS
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
                    
        }
        
    }
    function ruta3(e){
        e.preventDefault();
        var datos = new FormData(formulario); 
        var respuesta2 = confirm("¿Deseas eliminar este estudiante?");
        if(respuesta2==true){
            fetch('http://localhost/UCV-PROYECTO-Siclo-VI/index.php?c=Student&a=destroy',{
            method: 'POST',
            body: datos
            })
            encuesta2.reset();
        }else{
            console.log("no confirmado")
        }    
    }
    
