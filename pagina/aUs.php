<?php
include ("config.php");

if (empty($_POST['idTrabajador'])){
			$errors[] = "Número de trabajador vacio";
		} else if (empty($_POST['nombre'])){
			$errors[] = "nombre vacio";
		} else if (empty($_POST['paterno'])){
			$errors[] = "Apellido paterno vacío";
		}   else if (empty($_POST['materno'])) {
			$errors[] = "Apellido materno vacío";
		}   else if (empty($_POST['cargo'])) {
			$errors[] = "Cargo vacío";
		}   else if (empty($_POST['contrasenia'])) {
			$errors[] = "Contraseña vacío";
		} else if (
			!empty($_POST['idTrabajador']) && 
			!empty($_POST['nombre']) &&
			!empty($_POST['paterno']) &&
			!empty($_POST['materno']) &&
			!empty($_POST['cargo']) &&
			!empty($_POST['contrasenia'])
					
		){

		$nombre=$_POST['nombre'];
		$paterno=$_POST['paterno'];
		$materno=$_POST['materno'];
		$cargo=$_POST['cargo'];
		$pass=$_POST['contrasenia'];
		// escaping, additionally removing everything that could be (html/javascript-) code
		$idTrabajador=mysqli_real_escape_string($conexion,(strip_tags($_POST["idTrabajador"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($conexion,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$paterno=mysqli_real_escape_string($conexion,(strip_tags($_POST["paterno"],ENT_QUOTES)));
		$materno=mysqli_real_escape_string($conexion,(strip_tags($_POST["materno"],ENT_QUOTES)));
		$cargo=mysqli_real_escape_string($conexion,(strip_tags($_POST["cargo"],ENT_QUOTES)));
		$contrasenia=mysqli_real_escape_string($conexion,(strip_tags($_POST["contrasenia"],ENT_QUOTES)));

	$sql="INSERT INTO trabajadores VALUES (".$idTrabajador.", '".$nombre."', '".$paterno."','".$materno."','".$cargo."','".$contrasenia."')";

		$query_update = mysqli_query($conexion,$sql);
			if ($query_update){
				echo "<meta http-equiv='Refresh' content='1.25;url=sUs.php'>";
				$messages[] = "Registro exitoso";

			} else if (mysqli_errno($conexion)==1062) {
				$errors []= "El numero del trabajador ya existe";
			}
			else
				$errors []= " ".mysqli_error($conexion);
		
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
			}}

?>	
