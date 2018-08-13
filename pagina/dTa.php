<?php
include ("config.php");

$idMesa = $_POST['id'];
if (empty($idMesa)) {
	$errors[] = "Vacio";
}
else{
	try{
		$stmt = $pdo->prepare("DELETE FROM mesa WHERE id_mesa = ?");
		//ejecutamos el query haciendo que pdo reemplace las variables.
		$stmt -> execute(array($idMesa));
		echo "<meta http-equiv='Refresh' content='1.25;url=adminPage.php'>";
			$messages[] = "Mesa eliminado.";
	}catch(PDOException $e){
		if($e->getCode() == 23000){
			$errors[] = "Esa mesa no existe";
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