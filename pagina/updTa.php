<?php
    include ("config.php");

    $idUs = $_POST["idUs"];
    $idMesa = $_POST["idMesa"];
    if (empty($idUs)){
	    $errors[] = "Seleccionar un mesero";
    } else {
        	//Tendremos un try catch que atrapara los errores del usuario
            try{
            // preparamos el query dentro de nuestro obejto pdo
            $stmt = $pdo -> prepare(" UPDATE mesa SET id_usuario = ? WHERE id_mesa = ? ");
            //ejecutamos el query haciendo que pdo reemplace las variables.
            $stmt -> execute(array($idUs, $idMesa));
            // generamos el refresh de la pagina
            echo "<meta http-equiv = 'Refresh' content='1.25;url=adminPage.php'>";
            //guardamos el mensaje de registro exitoso
            $messages[] = "Mesa actualizada";
    
        }catch(PDOException $e){
            if($e -> getCode() == 23000){
                $errors[] = "Esa mesa no existe";
            }
        }
    }
		
		if (isset($errors)){
			
			?>
			<div class = "alert alert-danger" role = "alert">
				<button type = "button" class = "close" data-dismiss = "alert">&times;</button>
					<strong>Error!</strong> 
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