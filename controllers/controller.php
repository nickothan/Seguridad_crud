<?php

class MvcController{
	#LLAMADA A LA PLANTILLA
	#-------------------------------------
	public function pagina(){	
		include "views/template.php";
	}
	#ENLACES
	#-------------------------------------
	public function enlacesPaginasController(){
		if(isset( $_GET['action'])){
			$enlaces = $_GET['action'];
		}
		else{
			$enlaces = "index";
		}
		$respuesta = Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}
	#REGISTROS DE USUARIOS
	#------------------------------------------------------
	public function registroUsuarioController(){
		if(isset($_POST["usuarioRegistro"])){
			$datosController= array("usuario"=>$_POST["usuarioRegistro"], 
														"password"=>$_POST["passwordRegistro"], 
														"email" =>$_POST["emailRegistro"]);
			$respuesta =Datos :: registroUsuarioModel($datosController, "usuario");
			if ($respuesta== "succes"){
				header("location:index.php?action=ok");
			}else{
				header("location:index.php");
			}
		}
	}
	#INGRESO DE USUARIOS
	#-----------------------
	public function ingresoUsuarioController(){
		if(isset($_POST["usuarioIngreso"])){
			$datosController= array("usuario"=>$_POST["usuarioIngreso"], 
														"password"=>$_POST["passwordIngreso"] );
			$respuesta= Datos::ingresoUsuarioModel($datosController, "usuario");
			if($respuesta["usuario"]== $_POST["usuarioIngreso"] && $respuesta["password"]== $_POST["passwordIngreso"]){
				session_start();
				$_SESSION["validar"]= true;

				header("location:index.php?action=usuarios");
			}else{
				header("location:index.php?action=fallo");
			}
		}
	}
	#VISTA DE USUARIOS
	#------------------------------------------------------
	public function vistaUsuariosController(){
		$respuesta = Datos:: vistaUsuariosModel("usuario");
		foreach($respuesta as $row => $item){
			echo '<tr>
						<td>'.$item['usuario'].'</td>
						<td>'.$item['password'].'</td>
						<td>'.$item['email'].'</td>
						<td><a href="index.php?action=editar&id='.$item['id'].'"><button>Editar</button></a></td>
						<td><a href="index.php?action=usuarios&idBorrar='.$item['id'].'"><button>Borrar</button></a></td>
					</tr>';
		}
	}
	#EDITAR USUARIO
	#--------------------------------------------------------------	
	public function editarUsuarioController(){
		$datosController = $_GET["id"];
		$respuesta = Datos:: editarUsuariosModel($datosController, "usuario");
		echo '<input type="hidden" value="'.$respuesta["id"].'" name="idEditar" >
				<label form="usuarioEditar">Usuario:</label>
				<input type="text" value="'.$respuesta["usuario"].'" placeholder="Maximo 6 caracteres" name="usuarioEditar" id="usuarioEditar" maxlength="6" required>
				<label form="passwordEditar">Contraseña:</label>
				<input type="text" value="'.$respuesta["password"].'" placeholder="Minimo 8 caracteres, incluir núero(s) y una mayúscula" title="La contraseña debe tener minimo 8 caracteres entre minusculas, MAYUSCULAS y numeros." name="passwordEditar" id="passwordEditar" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
				<label form="emailEditar">Email:</label>
				<input type="email" value="'.$respuesta["email"].'"" name="emailEditar" id="emailEditar" required>
				<input type="submit" value="Actualizar">';
	}
	#ACTUALIZAR USUARIO
	#--------------------------------------------------------------	
	public function actualizarUsuarioController(){
		if(isset($_POST["usuarioEditar"])){
			var_dump($_POST["idEditar"]);
			$datosController = array( "id"=> $_POST["idEditar"],
							          "usuario"=>$_POST["usuarioEditar"],
				                      "password"=>$_POST["passwordEditar"],
				                      "email"=>$_POST["emailEditar"]);
			$respuesta = Datos::actualizarUsuarioModel($datosController, "usuario");
			if($respuesta== "success"){
				header("location:index.php?action=cambio");
			}else{
				echo "Error";
			}
		}
	}
	#BORRAR USUARIOS
	#------------------------
	public function borrarUsuarioController(){
		if(isset($_GET["idBorrar"])){
			$datosController = $_GET["idBorrar"];
			$respuesta= Datos::borrarUsuarioModel($datosController, "usuario");
			if($respuesta=="Success"){
				header("location:index.php?action=usuarios");
			}
		}
	}
}

?>