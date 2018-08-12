<?php 
include ("config.php");


 $idMes = $_POST["idMes"];
 $idUs = $_POST["idUs"];
 
 if (!empty($idMes)) {
  
  try{
    $stmt = $pdo -> prepare("INSERT INTO mesa(id_mesa, id_usuario) VALUES (?,?)");
    //ejecutamos el query hacieno que pdo reemplace las variables.
    $stmt -> execute(array($idMes, $idUs));
    echo "<meta http-equiv='Refresh' content='1.25;url=adminPage.php'>";
    $messages[] = "Mesa creada";
  }catch(PDOException $e){
    if($e->getCode() == 23000){
      $errors[] = "Esa mesa ya existe";
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
			}}

?>