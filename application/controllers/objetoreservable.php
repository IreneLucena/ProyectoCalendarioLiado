<?php
session_start();
class ObjetoReservable extends CI_Controller{
	
	public function index(){
		$this -> load -> view ('templates / header');
		$this -> load -> view ('objetoReservable / crear');
		$this -> load -> view ('templates / footer');
	}

	public function modificar(){
		$id=isset ($_SESSION ['idUsuario']) ? $_SESSION ['idUsuario'] : null;
		$datos ['idUsuario']=$id;
		
		if ($id!=null){
			if ($id == 1){
				$this -> load -> view ('templates / header');
				$this -> load -> view ('objetoReservable / modificar', $datos);
				$this -> load -> view ('templates / footer');
			}
			else{
				$this -> load -> view ('templates / header');
				$this -> load -> view ('errors / accesoProhibido', $datos);
				$this -> load -> view ('templates / footer');
			}
		}
		else{
			$this -> load -> view ('templates / header');
			$this -> load -> view ('errors / accesoProhibido', $datos);
			$this -> load -> view ('templates / footer');
		}
	}
	public function crear(){
		$this -> load -> view ('templates / header');
		$this -> load -> view ('objetoReservable / crear');
		$this -> load -> view ('templates / footer');
	}
	public function borrar(){
		$this -> load -> view ('templates / header');
		$this -> load -> view ('objetoReservable / borrar');
		$this -> load -> view ('templates / footer');
	}
	
	public function modificarPost(){
		$nombre=$_REQUEST ['nombre'];
		$tipo=$_REQUEST ['tipo'];
		$num_aula=$_REQUEST ['num_aula'];
		$categoria=$_REQUEST ['categoria'];
		$capacidad=$_REQUEST ['capacidad'];
		$num_equipos=$_REQUEST ['num_equipos'];
		$red=$_REQUEST ['red'];
		$proyector=$_REQUEST ['proyector'];
		
		//De alguna manera debo recoger el usuario que quiere hacer la modificaci�n
		$id=$_REQUEST['id'];

		$this -> load -> model ('Model_ObjetoReservable', 'mo');
		$objetoReservable=$this -> mo -> modify($id, $nombre, $tipo, $num_aula, $capacidad, $categoria, $num_equipos, $red, $proyector);

		$this -> load -> view ('templates / header');
		$this -> load -> view ('objetoReservable / modificarPost');
		$this -> load -> view ('templates / footer');
	}
	public function crearPost(){
		$nombre=$_REQUEST ['nombre'];
		$tipo=$_REQUEST ['tipo'];
		$num_aula=$_REQUEST ['num_aula'];
		$categoria=$_REQUEST ['categoria'];
		$capacidad=$_REQUEST ['capacidad'];
		$num_equipos=$_REQUEST ['num_equipos'];
		$red=$_REQUEST ['red'];
		$proyector=$_REQUEST ['proyector'];
		
		$this -> load -> model ('Model_ObjetoReservable','mo');
		$objetoReservable=$this -> mo -> crear ($nombre, $tipo, $num_aula, $capacidad, $categoria, $num_equipos, $red, $proyector);

		$this -> load -> view ('templates / header');
		$this -> load -> view ('objetoReservable / crearPost');
		$this -> load -> view ('templates / footer');
	}
	public function borrarPost(){
		$id=$_REQUEST['id'];
		$this -> load -> model ('Model_ObjetoReservable', 'mo');
		$objetoReservable=$this -> mo -> borrar ($id);

		$this -> load -> view ('templates / header');
		$this -> load -> view ('objetoReservable / borrarPost');
		$this -> load -> view ('templates / footer');
	}
	
	public function listar(){
		$this -> load -> model ('Model_ObjetoReservable', 'mo');
		$objetos=$this -> mo -> getTodos();
		$datos['objetos']=$objetos;

		$this -> load -> view ('templates / header');
		$this -> load -> view ('objetoReservable/listar', $datos);
		$this -> load -> view ('templates / footer');
	}
	
}