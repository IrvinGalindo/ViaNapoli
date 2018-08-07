<?php
include ("config.php");

/*Validar que los campos no esten vacios
*/
		$idTrabajador = $_POST['idTrabajador'];
		$nombre = $_POST['nombre'];
		$paterno = $_POST['paterno'];
		$materno = $_POST['materno'];
		$cargo = $_POST['cargo'];
		$pass = $_POST['contrasenia'];
		
if (empty($idTrabajador)){
			$errors[] = "Número de trabajador vacio";
		} else if (empty($nombre)){
			$errors[] = "nombre vacio";
		} else if (empty($paterno)){
			$errors[] = "Apellido paterno vacío";
		}   else if (empty($materno)) {
			$errors[] = "Apellido materno vacío";
		}   else if (empty($cargo)) {
			$errors[] = "Cargo vacío";
		}   else if (empty($pass)) {
			$errors[] = "Contraseña vacío";
		} else if (!empty($errors)){

		
		// escaping, additionally removing everything that could be (html/javascript-) code
		$idTrabajador=mysqli_real_escape_string($conexion,(strip_tags($_POST["idTrabajador"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($conexion,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$paterno=mysqli_real_escape_string($conexion,(strip_tags($_POST["paterno"],ENT_QUOTES)));
		$materno=mysqli_real_escape_string($conexion,(strip_tags($_POST["materno"],ENT_QUOTES)));
		$cargo=mysqli_real_escape_string($conexion,(strip_tags($_POST["cargo"],ENT_QUOTES)));
		$contrasenia=mysqli_real_escape_string($conexion,(strip_tags($_POST["contrasenia"],ENT_QUOTES)));

		$stmt = $pdo->prepare("INSERT INTO trabajadores VALUES (?, '?', '?','?','?','?')");
		//ejecutamos el query haciendo que pdo reemplace las variables.
		$stmt->execute(array($idTrabajador, $nombre, $paterno, $materno, $cargo, $pass));
	
		$query_update = mysqli_query($conexion,$sql);
			if ($query_update){
				echo "<meta http-equiv='Refresh' content='1.25;url=sUs.php'>";
				$messages[] = "Registro exitoso";

			} else if (mysqli_errno($conexion)==1062) {
				$errors []= "El numero del trabajador ya existe";
			}
			else
				$errors []= " ".mysqli_error($conexion);
		}
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Oops!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>	
