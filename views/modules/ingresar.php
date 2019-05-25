<h1>INGRESAR</h1>

	<form method="post" onsubmit="return validarIngreso()">
		<label for="usuarioIngreso">Usuario:</label>
		<input type="text" placeholder="Digite nombre de usuario"id="usuarioIngreso" maxlength="6" name="usuarioIngreso" id="usuarioIngreso" required>
		<label for="passwordIngreso">Password:</label>
		<input type="password" placeholder="Digite contraseña " name="passwordIngreso" id="passwordIngreso" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
		<input type="submit" value="Enviar">
	</form>

	<?php
	 $ingreso = new MvcController();
	 $ingreso-> ingresoUsuarioController();

	 if(isset($_GET["action"])){		 if($_GET["action"]=="fallo"){			 echo "Usuario o contraseña invalido.";		 }	 }
	?>