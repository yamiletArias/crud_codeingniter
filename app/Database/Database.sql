CREATE DATABASE entrenaci4;
USE entrenaci4;

CREATE TABLE clientes
(
	id				INT AUTO_INCREMENT PRIMARY KEY,
	apellidos	VARCHAR(50) NOT NULL,
	nombres 		VARCHAR(50) NOT NULL,
	dni			VARCHAR(8) NOT NULL,
	telefono		CHAR(9) NOT NULL
)ENGINE = INNODB;

INSERT INTO clientes (apellidos, nombres, dni, telefono) VALUES
	('Cardenas Pachas','Raul','44558899','956888777'),
	('Magallanes Castro','Magaly','74859655','956000111');

-- SELECT * FROM clientes;

CREATE TABLE proveedores
(
	id				INT AUTO_INCREMENT PRIMARY KEY,
	nombre		VARCHAR(50) NOT NULL,
	telefono		CHAR(9) NOT NULL,
	email			VARCHAR(50) NULL,
	direccion	VARCHAR(50) NULL
)ENGINE = INNODB;

INSERT INTO proveedores (nombre, telefono, email, direccion) VALUES
	('Distribuidora Central S.A.', '956598499', 'contacto1@gmail.com', 'Av. Siempre Viva 123 xd'),
	('TechPro Ltda', '987495621', 'contacto2@gmail.com', 'Calle Tecnología 45c');
	
SELECT * FROM proveedores;



