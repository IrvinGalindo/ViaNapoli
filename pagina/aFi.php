<?php 
include ("config.php");

 $tipo=mysqli_real_escape_string($conexion,(strip_tags($_POST["tipo"],ENT_QUOTES)));
 $padre=mysqli_real_escape_string($conexion,(strip_tags($_REQUEST["padre"],ENT_QUOTES)));

	 $nombre=$_FILES['archi']['name'];

	$ubicacion = "D:/flexcoah/archivosSGC/".$nombre;
	copy($_FILES['archi']['tmp_name'],$ubicacion);
	$formato=$_FILES['archi']['type'];
	$excel="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
	$word="application/vnd.openxmlformats-officedocument.wordprocessingml.document";
	$pdf="application/pdf";

	if (!empty($_POST['padre'])) {
		if (strcmp($word,$formato)===0 || strcmp($excel,$formato)===0 || strcmp($pdf,$formato)===0) {
			
		if ((strcmp($excel,$formato)===0 || strcmp($word,$formato)===0 ) && strcmp($tipo,"RC")!==0){	
		$errors[]="Solo se permiten archivo tipo word o excel en RC";

		}else if (strcmp($pdf,$formato)===0 && strcmp($tipo,"RC")===0) {
		 $errors[]="Solo se permiten archivo tipo pdf en GR,IT,PR y PSO";
		}
		else {

if(strcmp($pdf,$formato)===0)
$form=0;
else if(strcmp($word,$formato)===0)
$form=1; 
else if(strcmp($excel,$formato)===0)
$form=2;

			$sql="INSERT INTO archivos VALUES('$nombre','$tipo','$padre',$form)";
			$rg=mysqli_query($conexion,$sql);
		}
		if ($rg){
			if (strcmp($padre, "/")===0) {
				echo "<meta http-equiv='Refresh' content='1.25;url=adminPage.php'>";
				$messages[] = "Archivo creado";
			}else{
			echo "<meta http-equiv='Refresh' 			content='1.25;url=sFo.php?p=".$padre."'>";
				$messages[] = "Archivo creado";	
			}

			} else if (mysqli_errno($conexion)==1062) {
				$errors []= "El archivo ya existe";
			}
		}else $errors[]="Solo se permiten documentos tipo: PDF,Excel,Word";
		
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