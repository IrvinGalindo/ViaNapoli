<?php
include ("config.php");

if (empty($_POST['ubi'])) {
	$errors[]="Vacio";
}
else{
 	$nombre=$_POST['ubi'];
 	$padre=$_POST['padre'];

	$do = unlink("D:/flexcoah/archivosSGC/".$nombre);
			if($do != true){
		 $errors[]= "There was an error trying to delete the file" . $ubicacion . "<br />";
		}else{
			 $sql="DELETE FROM archivos WHERE nombre='".$nombre."'";
	$query_delete = mysqli_query($conexion,$sql);
	if ($query_delete){
			if (strcmp($padre, "/")===0) {
			echo "<meta http-equiv='Refresh' content='1.25;url=adminPage.php'>";
				$messages[] = "Archivo eliminado";
			}else{
			echo "<meta http-equiv='Refresh' 			content='1.25;url=sFo.php?p=".$padre."'>";
				$messages[] = "Archivo Eliminado ";	
			}}
			else{
				$errors[]="Intentelo mas tarde";
			}
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
