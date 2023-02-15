<?php 
    function traducirNombre($monthName){
        switch($monthName) {
            case 'January':
                $nombreMes = "Enero";
                break;
            case 'February':
                $nombreMes = "Febrero";
                break;
            case 'March':
                $nombreMes = "Marzo";
                break;
            case 'April':
                $nombreMes = "Abril";
                break;
            case 'May':
                $nombreMes = "Mayo";
                break;
            case 'June':
                $nombreMes = "Junio";
                break;
            case 'July':
                $nombreMes = "Julio";
                break;
            case 'August':
                $nombreMes = "Agosto";
                break;
            case 'September':
                $nombreMes = "Septiembre";
                break;
            case 'Octuber':
                $nombreMes = "Octubre";
                break;
            case 'November':
                $nombreMes = "Noviembre";
                break;
            case 'December':
                $nombreMes = "Diciembre";
                break;
            }
        return $nombreMes;	

    }
    ?>