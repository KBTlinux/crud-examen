DROP DATABASE IF EXISTS islantilla;

CREATE DATABASE islantilla;

USE islantilla;


CREATE TABLE reservas(
    Id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    cliente VARCHAR(50) NOT NULL,
    entrada date NOT NULL,
    salida date NOT NULL,
    hab INT(3) NOT NULL,
    pagado BOOLEAN NOT NULL,
    importe FLOAT NOT NULL,
    PRIMARY KEY (Id)
);

