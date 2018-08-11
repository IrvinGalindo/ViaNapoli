<?php
include ("config.php");

if (empty($_POST['id'])) {
	$errors[]="Vacio";
}
else{
	$nombre=$_POST['id'];
	$padre=$_POST['padre'];

$sql="DELETE FROM folders WHERE nombre='".$nombre."' && padre='".$padre."'";
	$query_delete = mysqli_query($conexion,$sql);
		if ($query_delete){
			if (strcmp($padre, "/")===0) {
			echo "<meta http-equiv='Refresh' content='1.25;url=adminPage.php'>";
			$messages[] = "Folder eliminado.";
		}else{
			echo "<meta http-equiv='Refresh' content='1.25;url=sFo.php?p=".$padre."'>";
			$messages[] = "Folder eliminado.";
		} }else if (mysqli_errno($conexion)==1062) {
			$errors []= "La carpeta ya existe";
		}else if (mysqli_errno($conexion)==1451) {
			$errors []= "Eliminar archivos existentes dentro de esta carpeta";
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