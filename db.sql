CREATE DATABASE mvc_school;
use mvc_school;
CREATE TABLE estudiantes(
	id int AUTO_INCREMENT,
    genero varchar (10),
    direccion varchar (50),
    correo varchar (50),
    celular varchar (50),
    fecha_n date ,
    grupo_s varchar (5),
    grado varchar(5),
    seccion varchar (5),
    aula varchar (10),
    nombre varchar (50),
    apellido varchar (50),
    dni int (10), 
    PRIMARY KEY(id)
)
create TABLE usuarios(
	id int auto_increment,
    correo varchar (50),
    password varchar (50),
    nombre varchar (50),
    apellido varchar (50),
    celular varchar (50),
    dni int (10),
    validado varchar(5) null,
    primary key(id)
)
insert into usuarios (correo,password,nombre,apellido,celular,dni,validado) values ('admin.01@hotmail.com',
md5('admin'),'admin','admin','987654321',87654321,'si')