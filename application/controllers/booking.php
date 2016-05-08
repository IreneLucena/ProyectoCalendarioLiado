<?php
session_start();
class Booking extends CI_Controller
{
	public function index(){
		$this->create();
	}

	public function create(){
		$datos['idUsuario']= isset($_SESSION['idUsuario']) ? $_SESSION['idUsuario']:null;
		$this->load->view('templates/header');
		$this->load->view('booking/create',$datos);
		$this->load->view('templates/footer');
	}

	public function createPost(){
		//TODO: Comprobar parametros
		//TODO: Coger desde la sesión
		$userId=1;
		//TODO: Coger desde url o javascript
		$classroom=$_POST['classrroom'];;
		$date=$_POST['date'];
		$hours=$_POST['hours'];

		$this->load->model('Model_Reserva','mr');

		$isValid=true;
		for($i=0; $i<count($hours); $i++){
			$result=$this->mr->create($userId, $classroom, $date, $hours[$i]);
			if(!$result) $isValid=false;
		}
		if($isValid){
			echo json_encode([
				"code"=>"S001",
				"isValid"=>true,
				"message"=>"OK"
			]);
		}
		else {
			echo json_encode([
				"code"=>"E001",
				"isValid"=>false,
				"message"=>"Error create data"
			]);
		}
	}

	public function listar(){
		$this->load->view('booking/listar');
	}

	public function listarPost(){
		$idUsuario=$_REQUEST ['idUsuario'];
		$this->load->model('Model_Reserva', 'mr');
		$reservas= $this->mr->getTodos($idUsuario);
		$datos['reservas']= $reservas;
		$this->load->view('booking/listarPost', $datos);
	}
	//Vamos a hacer una lista de reserva por aula para luego recogerlo en el horario.
	public function listarReserva(){
		$this->load->view('booking/listarReserva');
	}

	public function listarReservaPost(){
		$numAula=204;
		$this->load->model('Model_Reserva', 'mr');
		$reservas= $this->mr->getTodasReservas($numAula);
		$datos['reservas']= $reservas;
		$this->load->view('booking/listarReservaPost', $datos);
	}

	public function borrar(){
		$this->load->view('booking/borrar');
	}

	public function borrarPost(){
		$id=$_REQUEST['id'];
		$this->load->model('Model_Reserva', 'mr');
		$this->mr->borrar($id);
		$this->load->view('booking/borrarPost');
	}
	
	public function filtrar(){
		$this->load->model('Model_ObjetoReservable', 'mo');
		$categorias= $this->mo->getCategoria();
		$datos['categorias']= $categorias;
		$this->load->view('booking/filtrado', $datos);
	}

	public function filtrarPost(){
		$categoria= "";
		$red= $_REQUEST['red'];
		$proyector= $_REQUEST['proyector'];
		$numEquipos= $_REQUEST['equipos'];
		$capacidad= $_REQUEST['capacidad'];
		
		if($_REQUEST['categoria']!='todas'){
			$categoria= $_REQUEST['categoria'];
		}
		else{
			$categoria= 'IS NOT NULL';
		}
		if($red!='NO'){
			$red='SI';
		}
		if($proyector!='NO'){
			$proyector= 'SI';
		}
		$this->load->model('Model_ObjetoReservable', 'mo');
		$resultado= $this->mo->getAulasDisponibles($categoria, $red, $proyector, $numEquipos, $capacidad);
		
		$datos['aulas']= $resultado;
		$this->load->view('booking/filtradoPost', $datos);
	}
}
	