<h1>REGISTRO DE USUARIO</h1>

<form method="post" onsubmit="return validarRegistro()">
	<label for="usuarioRegistro">Nombre de usuario:</label>
	<input type="text" placeholder="Maximo 6 caracteres" maxlength="6" name="usuarioRegistro" id="usuarioRegistro" required>
	<label for="passwordRegistro">Contraseña:</label>
	<input type="password" placeholder="Minimo 8 caracteres, incluir núero(s) y una mayúscula" title="La contraseña debe tener minimo 8 caracteres entre minusculas, MAYUSCULAS y numeros." name="passwordRegistro" id="passwordRegistro"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
	<label for="emailRegistro">Email:</label>
	<input type="email" placeholder="Escriba correctamente su email"  name="emailRegistro" id="emailRegistro" required>
	<p><label for="terminos"><a href="#">Terminos y condiciones</a></label><input type="checkbox" name="terminos"id="terminos"></p>
	<input type="submit" value="Enviar">
</form>
<?php
 $registro = new MvcController();
 $registro -> registroUsuarioController();
 if(isset($_GET["action"])){	if($_GET["action"]=="ok"){		echo "Registro Exitoso";	}
 }
?>