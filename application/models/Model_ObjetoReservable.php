<?php
class Model_ObjetoReservable extends RedBean_SimpleModel{

	public function modify ($id, $nombre, $tipo, $numAula,$capacidad, $categoria,$numEquipos, $red, $proyector)	{
		$oR=r::load('objetoreservable',$id); //Gracias al id identificamos al or al que modificaremos los datos
		//De momento desconozco el id
		$oR->nombre=$nombre;
		$oR->tipo=$tipo;
		$oR->numAula=$numAula;
		$oR->categoria=$categoria;
		$oR->numEquipos=$numEquipos;
		$oR->red=$red;
		$oR->proyector=$proyector;
		R::store($oR);
	}

	public function getTodos(){
		return R::findAll('objetoreservable');
	}
	
	public function crear ($nombre, $tipo, $numAula,$capacidad, $categoria,$numEquipos, $red, $proyector){
		$oR=R::dispense('objetoreservable');
		$oR->nombre=$nombre;
		$oR->tipo=$tipo;
		$oR->numAula=$numAula;
		$oR->categoria=$categoria;
		$oR->numEquipos=$numEquipos;
		$oR->red=$red;
		$oR->proyector=$proyector;
		//$oR-> xownObjetoreservableList= array();
		R::store($oR);
	}
	
	public function borrar($id){
		//Borramos por ID (al menos por ahora)
		$oR=R::load('objetoreservable',$id);
		$reserva=R::load('reserva',$oR->id);
		R::trash($oR);
		R::trash($reserva);
	}
	
	public function getCategoria(){
		return R::getAll("SELECT DISTINCT categoria FROM objetoreservable");
	}
	
	public function getAulasDisponibles($categoria, $red, $proyector, $numEquipos, $capacidad){
		/*return R::findLike('objetoreservable',  [
				'categoria' => $categoria,
				'red' => $red,
				'proyector'=>$proyector
		] );*/
		
		/*Con getAll, aunque devuelve un array multidimensional, nos permite seleccionar
		 * un campo concreto en la select. As�, evitamos que devuelve el objeto entero y es m�s
		 * sencillo a la hora de visualizarlo*/
		
		/*Comprobamos que, si red o proyector est�n a no (es decir, no los han checkeado)
		 * no hace falta buscar por ellos, dado que al usuario no le importa que haya o no, puesto
		 * que solo le interesa que tenga lo que �l ha marcado*/
		
		/*Estamos comprobando tambi�n si la categor�a a filtrar es todas, ya que la consulta tiene que ser
		 * algo "especialita", por ahora la dejaremos con esta cantidad de if, porque no puedo
		 * reutilizar la misma estructura, as� que he tenido que a�adir 4 if m�s. En el futuro, si 
		 * descubro una manera de unificarlo, mejor.*/
		
		if($categoria=="IS NOT NULL" && $red!='SI' && $proyector!='SI'){
			return R::getAll('select num_aula from objetoreservable where categoria is not null
				AND num_equipos >= :equipos AND capacidad >= :capacidad',
					array(':equipos' => $numEquipos, ':capacidad' => $capacidad));
		}
		else if($categoria=="IS NOT NULL" && $red!='SI' && $proyector=='SI'){
			return R::getAll('select num_aula from objetoreservable where categoria is not null
				AND proyector = :proyector
				AND num_equipos >= :equipos AND capacidad >= :capacidad',
					array(':proyector' => $proyector, ':equipos' => $numEquipos, ':capacidad' => $capacidad));
		}
		else if($categoria=="IS NOT NULL" && $red=='SI' && $proyector!='SI'){
			return R::getAll('select num_aula from objetoreservable where categoria is not null
				AND red = :red
				AND num_equipos >= :equipos AND capacidad >= :capacidad',
					array(':red' => $red, ':equipos' => $numEquipos, ':capacidad' => $capacidad));
		}
		else if($categoria=="IS NOT NULL" && $red=='SI' && $proyector=='SI'){
			return R::getAll('select num_aula from objetoreservable where categoria is not null
				AND red = :red AND proyector = :proyector
				AND num_equipos >= :equipos AND capacidad >= :capacidad',
					array(':red' => $red, ':proyector' => $proyector, ':equipos' => $numEquipos, ':capacidad' => $capacidad));
		}
	    else if($red!='SI' && $proyector!='SI'){
			return R::getAll('select num_aula from objetoreservable where categoria= :cat 
				AND num_equipos >= :equipos AND capacidad >= :capacidad', 
				array(':cat' => $categoria, ':equipos' => $numEquipos, ':capacidad' => $capacidad));
		}
		else if($red!='SI' && $proyector == 'SI'){
			return R::getAll('select num_aula from objetoreservable where categoria= :cat 
				AND proyector = :proyector
				AND num_equipos >= :equipos AND capacidad >= :capacidad', 
				array(':cat' => $categoria, ':proyector' => $proyector, ':equipos' => $numEquipos, ':capacidad' => $capacidad));
		}
		else if($red=='SI' && $proyector!='SI'){
			return R::getAll('select num_aula from objetoreservable where categoria= :cat 
				AND red = :red
				AND num_equipos >= :equipos AND capacidad >= :capacidad', 
				array(':cat' => $categoria, ':red' => $red, ':equipos' => $numEquipos, ':capacidad' => $capacidad));
		}
		else {
			return R::getAll('select num_aula from objetoreservable where categoria= :cat 
				AND red = :red AND proyector = :proyector
				AND num_equipos >= :equipos AND capacidad >= :capacidad', 
				array(':cat' => $categoria, ':red' => $red, ':proyector' => $proyector, ':equipos' => $numEquipos, ':capacidad' => $capacidad));
		}
	}
}
?>