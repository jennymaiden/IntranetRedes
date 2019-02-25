--Base de datos de intranet
CREATE TABLE area(
	id serial primary key,
	nombre varchar(50)
	
);

CREATE TABLE empleado_autenticacion(
	id serial primary key,
	usuario varchar(80),
	contrasenia varchar(80)
);

CREATE TABLE empleado(
	id serial primary key,
	nombre varchar(50),
	apellido varchar(50),
	direccion varchar(50),
	telefono varchar(30),
	correo varchar(80),
	id_autenticacion Integer,
	id_area Integer,
	FOREIGN KEY (id_autenticacion) REFERENCES empleado_autenticacion(id),
	FOREIGN KEY (id_area) REFERENCES area(id)
);

----------------------------------------
CREATE TABLE permiso(
	id serial primary key,
	accion varchar(100),
	nombre_vista varchar(100)
);

CREATE TABLE area_permiso(
	id_area Integer,
	id_permiso Integer,
	FOREIGN KEY (id_area) REFERENCES area(id),
	FOREIGN KEY (id_permiso) REFERENCES permiso(id)
);

-----------------------------------------------
CREATE TABLE cliente(
	id serial primary key,
	nombre varchar(50),
	apellino varchar(50),
	direccion varchar(50),
	telefono varchar(30),
	correo varchar(80)
);

CREATE TABLE cliente_empleado(
	id_empleado Integer,
	id_cliente Integer,
	FOREIGN KEY (id_empleado) REFERENCES empleado(id),
	FOREIGN KEY (id_cliente) REFERENCES cliente(id)
	
);

---------------------------------------------------
CREATE TABLE servicio(
	id serial primary key,
	nombre varchar(100),
	vigencia text,
	costo text
);

CREATE TABLE servicio_empleado(
	id_servicio Integer,
	id_empleado Integer,
	FOREIGN KEY (id_servicio) REFERENCES servicio(id),
	FOREIGN KEY (id_empleado) REFERENCES empleado(id)
);

-----------------Insertar datos
INSERT INTO area (nombre) values ('Atención cliente'); 
INSERT INTO area (nombre) values ('Recursos Humanos'); 
INSERT INTO area (nombre) values ('Dirección comercial');
INSERT INTO area (nombre) values ('Oprativa');
INSERT INTO area (nombre) values ('Tecnologia');

-----------------Insertar empleado
INSERT INTO empleado_autenticacion (usuario,contrasenia) values ('balfonso','Colfondos2019*');
INSERT INTO empleado_autenticacion (usuario,contrasenia) values ('jvelez','Colfondos2019*');
INSERT INTO empleado_autenticacion (usuario,contrasenia) values ('psuarez','Colfondos2019*');
INSERT INTO empleado_autenticacion (usuario,contrasenia) values ('jruiz','Colfondos2019*');
INSERT INTO empleado_autenticacion (usuario,contrasenia) values ('jsoleno','Colfondos2019*');
INSERT INTO empleado_autenticacion (usuario,contrasenia) values ('cperez','Colfondos2019*');
INSERT INTO empleado_autenticacion (usuario,contrasenia) values ('galfonso','Colfondos2019*');
INSERT INTO empleado_autenticacion (usuario,contrasenia) values ('rcubillos','Colfondos2019*');
INSERT INTO empleado_autenticacion (usuario,contrasenia) values ('dpadilla','Colfondos2019*');
INSERT INTO empleado_autenticacion (usuario,contrasenia) values ('orubio','Colfondos2019*');
INSERT INTO empleado_autenticacion (usuario,contrasenia) values ('crodriguez','Colfondos2019*');
INSERT INTO empleado_autenticacion (usuario,contrasenia) values ('asoto','Colfondos2019*');
INSERT INTO empleado_autenticacion (usuario,contrasenia) values ('epineda','Colfondos2019*');
INSERT INTO empleado_autenticacion (usuario,contrasenia) values ('lcuervo','Colfondos2019*');
INSERT INTO empleado_autenticacion (usuario,contrasenia) values ('cramirez','Colfondos2019*');

-----------------------------------
-----------Insertar en empleado-----------------
INSERT INTO empleado (nombre, apellido, direccion, telefono,correo,id_autenticacion, id_area) values('Brian','Alfonso','Calle 100','123','balfonso@redcolfondos.ud',1,5);
INSERT INTO empleado (nombre, apellido, direccion, telefono,correo,id_autenticacion, id_area) values('Jenny','Velez','Calle 100','123','jvelez@redcolfondos.ud',2,5);
INSERT INTO empleado (nombre, apellido, direccion, telefono,correo,id_autenticacion, id_area) values('Pedro','Suarez','Calle 100','123','psuarez@redcolfondos.ud',3,5);
INSERT INTO empleado (nombre, apellido, direccion, telefono,correo,id_autenticacion, id_area) values('Jenny','Ruiz','Calle 100','123','jruiz@redcolfondos.ud',4,1);
INSERT INTO empleado (nombre, apellido, direccion, telefono,correo,id_autenticacion, id_area) values('Juan','Soleno','Calle 100','123','jsoleno@redcolfondos.ud',5,1);
INSERT INTO empleado (nombre, apellido, direccion, telefono,correo,id_autenticacion, id_area) values('Claudia','Perez','Calle 100','123','cperez@redcolfondos.ud',6,1);
INSERT INTO empleado (nombre, apellido, direccion, telefono,correo,id_autenticacion, id_area) values('Giovanni','Alfonso','Calle 100','123','galfonso@redcolfondos.ud',7,2);
INSERT INTO empleado (nombre, apellido, direccion, telefono,correo,id_autenticacion, id_area) values('Roberto','Cubillos','Calle 100','123','rcubillos@redcolfondos.ud',8,2);
INSERT INTO empleado (nombre, apellido, direccion, telefono,correo,id_autenticacion, id_area) values('Dora','Padilla','Calle 100','123','dpadilla@redcolfondos.ud',9,2);
INSERT INTO empleado (nombre, apellido, direccion, telefono,correo,id_autenticacion, id_area) values('Oscar','Rubio','Calle 100','123','orubio@redcolfondos.ud',10,3);
INSERT INTO empleado (nombre, apellido, direccion, telefono,correo,id_autenticacion, id_area) values('Clara','Rodriguez','Calle 100','123','crodriguez@redcolfondos.ud',11,3);
INSERT INTO empleado (nombre, apellido, direccion, telefono,correo,id_autenticacion, id_area) values('Andres','Soto','Calle 100','123','asoto@redcolfondos.ud',12,3);
INSERT INTO empleado (nombre, apellido, direccion, telefono,correo,id_autenticacion, id_area) values('Edgar','Pineda','Calle 100','123','epineda@redcolfondos.ud',13,4);
INSERT INTO empleado (nombre, apellido, direccion, telefono,correo,id_autenticacion, id_area) values('Lady','Cuervo','Calle 100','123','lcuervo@redcolfondos.ud',14,4);
INSERT INTO empleado (nombre, apellido, direccion, telefono,correo,id_autenticacion, id_area) values('Camilo','Ramirez','Calle 100','123','cramirez@redcolfondos.ud',15,4);

------------Insertar Acciones
INSERT INTO permiso(accion, nombre_vista) VALUES ('Consultar-Clientes', 'viewConsultaCliente');
INSERT INTO permiso(accion, nombre_vista) VALUES ('Crear-Clientes', 'viewCrearCliente');
INSERT INTO permiso(accion, nombre_vista) VALUES ('Editar-Clientes', 'viewEditarCliente');
INSERT INTO permiso(accion, nombre_vista) VALUES ('Consultar-Empleados', 'viewConsultarEmpleados');
INSERT INTO permiso(accion, nombre_vista) VALUES ('Crear-Empleados', 'viewCrearEmpleados');
INSERT INTO permiso(accion, nombre_vista) VALUES ('Editar-Empleados', 'viewEditarEmpleados');
INSERT INTO permiso(accion, nombre_vista) VALUES ('Consultar-Productos', 'viewConsultarProductos');
INSERT INTO permiso(accion, nombre_vista) VALUES ('Crear-Productos', 'viewEditarProductos');
INSERT INTO permiso(accion, nombre_vista) VALUES ('Editar-Productos', 'viewActualizarProductos');
INSERT INTO permiso(accion, nombre_vista) VALUES ('Consultar-Usuarios', 'viewConsultarUsuarios');
INSERT INTO permiso(accion, nombre_vista) VALUES ('Editar-Usuarios', 'viewEditarUsuarios');
INSERT INTO permiso(accion, nombre_vista) VALUES ('Crear-Usuarios', 'viewActualizarUsuarios');
INSERT INTO permiso(accion, nombre_vista) VALUES ('CargarArchivo', 'viewCargarArchivo');
INSERT INTO permiso(accion, nombre_vista) VALUES ('EnviarCorreo', 'viewEnviarCorreo');
INSERT INTO permiso(accion, nombre_vista) VALUES ('LecturaArchivos', 'viewLecturaArchivos');
INSERT INTO permiso(accion, nombre_vista) VALUES ('Clientes', 'Modulo');
INSERT INTO permiso(accion, nombre_vista) VALUES ('Empleados', 'Modulo');
INSERT INTO permiso(accion, nombre_vista) VALUES ('Productos', 'Modulo');
INSERT INTO permiso(accion, nombre_vista) VALUES ('Servicios', 'Modulo');
INSERT INTO permiso(accion, nombre_vista) VALUES ('Usuarios', 'Modulo');

 ---------Insertr area permiso
 INSERT INTO area_permiso(id_area,id_permiso) values (1,16);
 INSERT INTO area_permiso(id_area,id_permiso) values (1,1);
 INSERT INTO area_permiso(id_area,id_permiso) values (1,2);
 INSERT INTO area_permiso(id_area,id_permiso) values (1,3);
 INSERT INTO area_permiso(id_area,id_permiso) values (1,18);
 INSERT INTO area_permiso(id_area,id_permiso) values (1,7);
 ---recursos humanos
  INSERT INTO area_permiso(id_area,id_permiso) values (2,17);
  INSERT INTO area_permiso(id_area,id_permiso) values (2,4);
  INSERT INTO area_permiso(id_area,id_permiso) values (2,5);
  INSERT INTO area_permiso(id_area,id_permiso) values (2,6);
  --direccion comercial
   INSERT INTO area_permiso(id_area,id_permiso) values (3,7);
   INSERT INTO area_permiso(id_area,id_permiso) values (3,8);
   INSERT INTO area_permiso(id_area,id_permiso) values (3,9);
   INSERT INTO area_permiso(id_area,id_permiso) values (3,16);
   INSERT INTO area_permiso(id_area,id_permiso) values (3,1);
   INSERT INTO area_permiso(id_area,id_permiso) values (3,18);
 --- Operativo
  INSERT INTO area_permiso(id_area,id_permiso) values (4,17);
  INSERT INTO area_permiso(id_area,id_permiso) values (4,4);
  INSERT INTO area_permiso(id_area,id_permiso) values (4,5);
  INSERT INTO area_permiso(id_area,id_permiso) values (4,6);

  ---tecnologia
   INSERT INTO area_permiso(id_area,id_permiso) values (5,20);
   INSERT INTO area_permiso(id_area,id_permiso) values (5,10);
   INSERT INTO area_permiso(id_area,id_permiso) values (5,11);
   INSERT INTO area_permiso(id_area,id_permiso) values (5,12);
   INSERT INTO area_permiso(id_area,id_permiso) values (5,17);
   INSERT INTO area_permiso(id_area,id_permiso) values (5,4);
   INSERT INTO area_permiso(id_area,id_permiso) values (5,5);
   INSERT INTO area_permiso(id_area,id_permiso) values (5,6);

--------------------------------------------------------











 