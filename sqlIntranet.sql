CREATE TABLE usuario(
	id serial primary key,
	nombre varchar(30),
	telefono varchar(30)
);

select * from usuario;

CREATE user prueba password '123456';

grant select on "usuario" to "prueba";

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