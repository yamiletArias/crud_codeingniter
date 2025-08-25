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
	
-- SELECT * FROM proveedores;

CREATE TABLE productos(
	id 			INT AUTO_INCREMENT	PRIMARY KEY,
	nombre 		VARCHAR(150) NOT NULL,
	descripcion TEXT NOT NULL,
	precio 		DECIMAL(7,2) NOT NULL,
	descuento 	INT	NULL,
	idproveedor INT,
	CONSTRAINT fk_proveedor FOREIGN KEY (idproveedor) REFERENCES proveedores(id)
)ENGINE=INNODB;

-- ALTER TABLE productos ADD idproveedor INT;
-- ALTER TABLE productos ADD FOREIGN KEY (idproveedor) REFERENCES proveedores(id);

INSERT INTO productos (nombre, descripcion, precio, descuento) VALUES
	('Laptop Hp', 'Laptod de 14 pulgadas con 8GB RAM y SSD de 256GB', 2500.00, 10),
	('Mouse Inalambrico','Mouse optico inalambrico con conexion USB', 45.00, 5);

-- SELECT * FROM productos;

-- DROP TABLE IF EXISTS productos;

