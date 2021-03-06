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
			if(       preg_match( '/^[a-zA-Z0-9]+$/', $_POST["usuarioRegistro"])
				&& preg_match( '/^[a-zA-Z0-9]+$/', $_POST["passwordRegistro"])
				&& preg_match( '/^[^0-9][a-zA-Z0-9]+([.][a-zA-Z0-9]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailRegistro"])){
				$encriptar = crypt( $_POST["passwordRegistro"], '23$wertwer2347$dghghrtyt56fjyASDFXB4e43sstSHS$' );
				$datosController= array("usuario"=>$_POST["usuarioRegistro"], 
															"password"=>$encriptar, 
															"email" =>$_POST["emailRegistro"]);
				$respuesta =Datos :: registroUsuarioModel($datosController, "usuario");
				if ($respuesta== "succes"){				header("location:ok");			}else{				header("location:index.php");			}
			}
		}
	}
	#INGRESO DE USUARIOS
	#-----------------------
	public function ingresoUsuarioController(){
		if(isset($_POST["usuarioIngreso"])){
			if( preg_match( '/^[a-zA-Z0-9]+$/', $_POST["usuarioIngreso"])&& preg_match( '/^[a-zA-Z0-9]+$/', $_POST["passwordIngreso"])){
					$encriptar = crypt( $_POST["passwordIngreso"], '23$wertwer2347$dghghrtyt56fjyASDFXB4e43sstSHS$' );
				$datosController= array("usuario"=>$_POST["usuarioIngreso"], "password"=>$encriptar);
				$respuesta= Datos::ingresoUsuarioModel($datosController, "usuario");
				#INTENTOS DE INGRESO
				$intentos = $respuesta["intentos"];
				$usuario = $_POST["usuarioIngreso"];
				$maxIntentos = 2;
				if($intentos < $maxIntentos){
					if($respuesta["usuario"]== $_POST["usuarioIngreso"] && $respuesta["password"]== $encriptar){
						session_start();
						$_SESSION["validar"]= true;
						$intentos =0;
						$datosController= array("usuarioActual"=> $usuario, "actualizarintentos"=>$intentos);
						$respuestaActualizarIntentos = Datos ::intentosUsuarioModel($datosController, "usuario");
						header("location:usuarios");
					}else{				
						++$intentos;
						$datosController= array("usuarioActual"=> $usuario, "actualizarintentos"=>$intentos);
						$respuestaActualizarIntentos = Datos ::intentosUsuarioModel($datosController, "usuario");
						header("location:fallo");	
					}
				}else{
					$intentos =0;
					$datosController= array("usuarioActual"=> $usuario, "actualizarintentos"=>$intentos);
					$respuestaActualizarIntentos = Datos ::intentosUsuarioModel($datosController, "usuario");
					header("location:fallo3intentos");	
				}
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
			if(    preg_match( '/^[a-zA-Z0-9]+$/', $_POST["usuarioEditar"])
			 && preg_match( '/^[a-zA-Z0-9]+$/', $_POST["passwordEditar"])
			 && preg_match( '/^[^0-9][a-zA-Z0-9]+([.][a-zA-Z0-9]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailEditar"])){
				$encriptar = crypt( $_POST["passwordEditar"], '23$wertwer2347$dghghrtyt56fjyASDFXB4e43sstSHS$' );
				$datosController = array( "id"=> $_POST["idEditar"],
										"usuario"=>$_POST["usuarioEditar"],
										"password"=>$encriptar,
										"email"=>$_POST["emailEditar"]);
				$respuesta = Datos::actualizarUsuarioModel($datosController, "usuario");
				if($respuesta== "success"){				header("location:cambio");			}else{				echo "Error";			}
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
				header("location:usuarios");
			}
		}
	}
}

