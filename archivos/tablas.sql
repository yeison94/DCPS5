CREATE TABLE persona (
	tipo_documento   VARCHAR(5)   NOT NULL,
	numero_documento VARCHAR(20)  NOT NULL,
	nombre           VARCHAR(30)  NOT NULL,
	apellido         VARCHAR(30)  NOT NULL,
	sexo             VARCHAR(1)   NOT NULL,
	fecha_nacimiento DATE         NOT NULL,
	nacionalidad     VARCHAR(50)  NOT NULL,
	direccion        VARCHAR(40)  NOT NULL,
	telefono         INT(50)  	  NOT NULL,
	ciudad           VARCHAR(50)  NOT NULL,
	email            VARCHAR(50)  NOT NULL,
	PRIMARY KEY (numero_documento),
	CONSTRAINT sexo_valido CHECK (sexo IN ('M', 'F'))
) ENGINE = InnoDB;

CREATE TABLE estudio (
	id               INT UNSIGNED NOT NULL AUTO_INCREMENT,
	persona          VARCHAR(20)  NOT NULL,
	institucion      VARCHAR(100) NOT NULL,
	pais             VARCHAR(50)  NOT NULL,
	fecha_graduacion DATE         NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT estudio_persona FOREIGN KEY (persona) REFERENCES persona (numero_documento)
) ENGINE = InnoDB;

CREATE TABLE pregrado (
	estudio   INT UNSIGNED NOT NULL,
	profesion VARCHAR(100) NOT NULL,
	PRIMARY KEY (estudio),
	CONSTRAINT padre_pregrado FOREIGN KEY (estudio) REFERENCES estudio (id)
) ENGINE = InnoDB;

CREATE TABLE tarjeta_profesional (
	pregrado         INT UNSIGNED NOT NULL,
	fecha_expedicion DATE         NOT NULL,
	numero           VARCHAR(20)  NOT NULL,
	PRIMARY KEY (pregrado),
	CONSTRAINT tarjeta_profesional_estudio_pregrado FOREIGN KEY (pregrado) REFERENCES pregrado (estudio)
) ENGINE = InnoDB;

CREATE TABLE posgrado (
	estudio INT UNSIGNED NOT NULL,
	area    VARCHAR(100) NOT NULL,
	nivel   VARCHAR(15)  NOT NULL,
	PRIMARY KEY (estudio),
	CONSTRAINT padre_posgrado FOREIGN KEY (estudio) REFERENCES estudio (id),
	CONSTRAINT tipo_posgrado_valido CHECK
		(area IN ('Especialización', 'Maestría', 'Doctorado', 'Posdoctorado'))
) ENGINE = InnoDB;