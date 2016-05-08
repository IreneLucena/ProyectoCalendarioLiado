<?php
class Model_Reserva extends RedBean_SimpleModel{

	public function create($idUsuario,$numAula,$idAula,$fecha,$horaCogida){
		$usuario=r::load('usuario',$idUsuario);
		$oR=r::load('objetoReservable',$numAula);
		$reservaExiste=false;//Controla si reserva existe o no
		$reserva=R::dispense('reserva');
		$reserva->fecha=$fecha;
		$reserva->hora=$horaCogida;
		$reserva->usuario=$usuario;
		$reserva->or=$oR;
		$reserva->usuarionombre=$usuario->nombre;
		$reserva->ornombre=$oR->nombre;
		$reserva->or_id=$idAula;
		$reservasOR=$this->getCrear($numAula);
		foreach($reservasOR as $reservaOR){
			if($reservaOR->fecha==$fecha&&$reservaOR->hora==$horaCogida){
				$reservaExiste=true;
			}
		}
		if($reservaExiste==false){
			R::store($reserva);
			return true;
		}
		else{
			return false;
		}
	}
	public function borrar($id){
		//Borramos por ID (al menos por ahora)
		$reserva=R::load('reserva',$id);
		R::trash($reserva);
	}
	
	public function getTodos($idUsuario){
		//return R::findAll('reserva');
		$reserva=R::find('reserva','usuario_id LIKE ? ',[$idUsuario]);
		return $reserva;
	}
	
	public function getTodasReservas($numAula){
		$reserva=R::find('reserva', 'num_aula LIKE ? ',[$numAula]);
		return $reserva;
	}
	
	//Se le llama para saber horas y aulas reservadas
	public function getCrear($oR){
		//return R::findAll('reserva');
		$reservasOR=R::find( 'reserva', ' num_aula LIKE ? ',[$oR]);
		return $reservasOR;
	}
}
?>