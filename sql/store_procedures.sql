CREATE PROCEDURE SP_AltaReservacion (
	IN area VARCHAR(80),
	IN colaborador VARCHAR(150),
	IN asunto VARCHAR(255),
	IN sala VARCHAR(15),
	IN fecha DATE,
    IN hora_inicio TIME,
	IN hora_termino TIME,
    IN participantes INT,
	IN estado VARCHAR(15))
	
	INSERT INTO agenda(area_reserva,colaborador_reserva,asunto_reserva,sala_reserva,fecha_reserva,hora_inicio,hora_termino,participantes_reserva,estado_reserva)
	VALUES (area,colaborador,asunto,sala,fecha,hora_inicio, hora_termino,participantes,estado)


--call SP_AltaReservacion('Atencion a clientes','Migu','asdd','Tesla','2023-02-13','13:59','15:01',5,'ACTIVO')

CREATE PROCEDURE SP_ActualizarCliente(
	in sp_NoCliente int(11),
	in sp_nombre VARCHAR(100),
	in sp_aPaterno VARCHAR(100),
	in sp_aMaterno VARCHAR(100),
	in sp_direccion VARCHAR(200),
    in sp_correo VARCHAR(100),
    in sp_contrasenia VARCHAR(255),
	in sp_telefono VARCHAR(15),
	in sp_fechaNac DATE)
update cliente
	set
    	cliente_nombre = sp_nombre,
    	cliente_apaterno = sp_aPaterno,
    	cliente_amaterno = sp_aMaterno,
    	cliente_direccion = sp_direccion,
    	cliente_correo = sp_correo,
   	cliente_contrasenia = sp_contrasenia,
    	cliente_telefono = sp_telefono,
    	cliente_fechaNac = sp_fechaNac
	where NoCliente = sp_NoCliente
;

CREATE PROCEDURE SP_BorrarCliente(
	in sp_NoCliente INT(11)
    delete from cliente where NoCliente = sp_NoCliente
;

-- Creacion de PS para llenar tabla pedidos
-- CURDATE()
CREATE PROCEDURE lb_addPedido ( IN client INT(11),
                                IN code INT(11),
                                IN cant INT(11),
                                IN total FLOAT ) 
    INSERT INTO pedidoDetalle( NoPedido, pedido_fecha, cliente, codigo, cantidad, precioTotal)
    VALUES ( "", CURDATE(), client, code, cant, total);
