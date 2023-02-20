CREATE PROCEDURE SP_AltaReservacion (
	IN sp_area VARCHAR(80),
	IN sp_colaborador VARCHAR(150),
	IN sp_asunto VARCHAR(255),
	IN sp_sala VARCHAR(15),
	IN sp_fecha DATE,
    IN sp_hora_inicio TIME,
	IN sp_hora_termino TIME,
    IN sp_participantes INT,
	IN sp_estado VARCHAR(15))
	
	INSERT INTO agenda(area_reserva,colaborador_reserva,asunto_reserva,sala_reserva,fecha_reserva,hora_inicio,hora_termino,participantes_reserva,estado_reserva)
	VALUES (sp_area,sp_colaborador,sp_asunto,sp_sala,sp_fecha,sp_hora_inicio, sp_hora_termino,sp_participantes,sp_estado)


--call SP_AltaReservacion('Atencion a clientes','Migu','asdd','Tesla','2023-02-13','13:59','15:01',5,'ACTIVO')

CREATE PROCEDURE SP_ModificarReservacion(
	IN sp_nocita INT(11)
	IN sp_area VARCHAR(80),
	IN sp_colaborador VARCHAR(150),
	IN sp_asunto VARCHAR(255),
	IN sp_sala VARCHAR(15),
	IN sp_fecha DATE,
    IN sp_hora_inicio TIME,
	IN sp_hora_termino TIME,
    IN sp_participantes INT,
	IN sp_estado VARCHAR(15))
update agenda
	set
		area_reserva = sp_area,
		colaborador_reserva = sp_colaborador,
		asunto_reserva = sp_asunto,
		sala_reserva = sp_sala,
		fecha_reserva = sp_fecha,
		hora_inicio = sp_hora_inicio,
		hora_termino = sp_hora_termino,
		participantes_reserva = sp_participantes,
	where nocita = sp_nocita
;

CREATE PROCEDURE SP_BorrarReservacion(
	in sp_nocita INT(11)
    delete from agenda where nocita = sp_nocita
;
