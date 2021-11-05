CREATE TABLE usuarios(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	lastname VARCHAR(50) NOT NULL,
    password VARCHAR(150) NOT NULL,
	user VARCHAR(15) UNIQUE
	level VARCHAR(5) DEFAULT 'B'
);

CREATE TABLE bienes(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	tipo VARCHAR(25) NOT NULL,
    marca VARCHAR(30),
	modelo VARCHAR(30),
	serial VARCHAR(50) UNIQUE,
    codigo VARCHAR(10) UNIQUE NOT NULL,
	registrado_por varchar(10) NOT NULL,
	estado varchar(25) NOT NULL,
    ingreso TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY (registrado_por) REFERENCES usuarios(user)
);


CREATE TABLE entregado_en (
    ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    direcciones VARCHAR(20) NOT NULL,
    departamentos VARCHAR(50) NOT NULL,
    item_codigo VARCHAR(10) NOT NULL,
	comentarios VARCHAR(255) DEFAULT 'Sin Comentarios',
    FOREIGN KEY (item_codigo) REFERENCES bienes(codigo)
);

CREATE table direcciones( 
	siglas VARCHAR(10) NOT NULL UNIQUE, 
	nombre VARCHAR(60) NOT NULL 
	);