<?php
class Model_Usuario extends RedBean_SimpleModel{

	//La llamo modify porque entraba en conflicto con el modificar de Usuario
	public function modify ($id,$correo, $nick, $password) {
		$usuario=r::load('usuario',$id); //Gracias al id identificamos al usuario al que modificaremos los datos
		$usuario->correo=$correo;
		$usuario->nick=$nick;
		$usuario->password=$password;
		R::store($usuario);
	}
	
	public function getTodos(){
		return R::findAll('usuario');
	}
	
	//A trav�s del update se ponen las reglas de negocio.Se ejecuta antes del store
	/*public function update ()
	{
		//Dejo un ejemplo para tenerlo en cuenta
		if(substr_count($this->correo, '@')!=1 ){
			throw new Exception("email incorrecto");
		}
	}*/
	
	public function comprobarClave($clave){
		$usuarios= R::findAll('usuario');
		$res= "";
		foreach($usuarios as $usuario){
			if($usuario->clave==$clave){
				$res=$usuario->id;
			}
		}
		return $res;
	}
	
	public function completarRegistro($nick, $password, $correo, $rol, $clave, $id) {
		$usuario= R::load('usuario', $id);
		$usuario->rol= $rol;
		$usuario->correo= $correo;
		$usuario->nick=$nick;
		$usuario->password= $password;
		R::store($usuario);
	}
	
	public function encontrarUsuarioPorPassword($passActual){
		$usuarios= R::findAll('usuario');
		$id= 0;
		
		foreach($usuarios as $usuario)
		{
			if($usuario->password==$passActual)
			{
				$id=$usuario->id;
			}
				
		}

		return $id;
	}
	
	public function cambiarPerfil($id, $nick, $password, $correo){
		$usuario= R::load('usuario', $id);
		if($nick!=""){
			$usuario->nick= $nick;
		}
		else {
			$usuario->nick= $usuario->nick;
		}
		if($password!=""){
			$usuario->password= $password;
		}
		else{
			$usuario->password= $usuario->password;
		}
		if($correo!="") {
			$usuario->correo= $correo;
		}
		else{
			$usuario->correo= $usuario->correo;
		}
		R::store($usuario);
	}
   	
   	public function login($nick,$password){
   		$usuarios= R::findAll('usuario');
   		$id="";
   		foreach($usuarios as $usuario){
   			if(($usuario->nick==$nick)&&($usuario->password==$password)){
   				$id=$usuario->id;
   			}
   		}
   		return $id;
   	}
   	
   	public function comprobarCorreo($correo){
   		$usuarios= R::findAll('usuario');
   		$id= "";
   		foreach($usuarios as $usuario){
   			if($usuario->correo==$correo){
   				$id=$usuario->correo;
   			}
   		}
   		return $id;
   	}

	public function cambiarPass($correo,$cadena){
		$usuario=R::findOne('usuario',' correo = ? ',[$correo]);
		$usuario->password=$cadena;
		R::store($usuario);
	}
}
?>