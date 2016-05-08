<?php

foreach($reservas as $reserva){
    $info[]=array(
        'fecha'=> $reserva->fecha,
        'hora'=> $reserva->hora);
}
header('Content-type: application/json');
echo json_encode($info);
?>
