<?php
include ("config.php");

 if (empty($_POST['id'])) {
 	$errors[]="Vacio";
 }
 else{
 	$idTrabajador=$_POST['id'];
 
 $sql="DELETE FROM trabajadores WHERE idTrabajador=".$idTrabajador;
		$query_delete = mysqli_query($conexion,$sql);
			if ($query_delete){
				echo "<meta http-equiv='Refresh' content='1.25;url=sUs.php'>";
				$messages[] = "Usuario eliminado.";
			} else{
				$errors []= "Intentelo mas tarde";
			}
	
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