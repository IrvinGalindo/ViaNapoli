<?php 
include ("config.php");

 $color=mysqli_real_escape_string($conexion,(strip_tags($_POST["color"],ENT_QUOTES)));
 $nombre=mysqli_real_escape_string($conexion,(strip_tags($_POST["nombre"],ENT_QUOTES)));
 $padre=mysqli_real_escape_string($conexion,(strip_tags($_POST["padre"],ENT_QUOTES)));
if (!empty($_POST['padre'])) {

	$rg=mysqli_query($conexion,"INSERT INTO folders VALUES('$padre','$nombre','$color')");

		if ($rg){
			if (strcmp($padre, "/")===0) {
				echo "<meta http-equiv='Refresh' content='1.25;url=adminPage.php'>";
				$messages[] = "Carpeta creada";
			}else{
			echo "<meta http-equiv='Refresh' 
			content='1.25;url=sFo.php?p=".$padre."'>";
				$messages[] = "Carpeta creada";	
			}

			} else if (mysqli_errno($conexion)==1062) {
				$errors []= "La carpeta ya existe";
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