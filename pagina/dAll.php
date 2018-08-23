<?php
include ("config.php");

$idAll = $_POST['id'];
$tname = $_POST['tname'];
if (empty($idAll) && empty($tname)) {
	$errors[] = "Vacio";
}
else{
	try{
		$stmt = $pdo->prepare("DELETE FROM $tname WHERE id_mesa = ?");
		//ejecutamos el query haciendo que pdo reemplace las variables.
		$stmt -> execute(array($idAll));
		echo "<meta http-equiv='Refresh' content='1.25;url=adminPage.php'>";
			$messages[] = "$tname eliminado.";
	}catch(PDOException $e){
		if($e->getCode() == 23000){
			$errors[] = "Esa mesa no existe";
		}
		echo $e -> getMessage();
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