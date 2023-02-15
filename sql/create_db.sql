CREATE DATABASE agenda_salas;

USE agenda_salas;

CREATE TABLE agenda(
    nocita INT(11) AUTO_INCREMENT,
    area_reserva VARCHAR(80) NOT NULL,
    colaborador_reserva VARCHAR(150) NOT NULL,
    asunto_reserva VARCHAR(255),
    sala_reserva VARCHAR(15) NOT NULL,
    fecha_reserva DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_termino TIME NOT NULL,
    participantes_reserva INT NOT NULL,
    contrasenia VARCHAR(15) NOT NULL,
    PRIMARY KEY(nocita)
    );

