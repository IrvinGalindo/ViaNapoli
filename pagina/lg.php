<?php
    session_start();
    include 'config.php';
    //obtenemos las credenciales del usuario
     $usr=$_REQUEST['numTrabajador'];
     $pwd=$_REQUEST['pass'];
     


     if(empty($usr)){
        $errors[]= "Ingresar un usuario";
     }else{
        if(empty($pwd)){
            $errors[]= "Ingresar password";
        }else{
             //preparamos nuestra declaracion
        $stmt = $pdo->prepare("SELECT * FROM Trabajadores WHERE idTrabajador=? AND pass=?");
        //ejecutamos el query haciendo que pdo reemplace las variables.
        $stmt->execute(array($usr, $pwd));
        //obtenemos los resultado
        $resultado = $stmt -> fetchColumn(4);

        if($resultado){
            $stmt = $pdo->prepare("INSERT INTO auth(numTrabajador,fecha,hora) VALUES(?,CURDATE(),CURTIME())");
            //ejecutamos el query haciendo que pdo reemplace las variables.
            $stmt->execute(array($usr));
            if(strcmp($resultado,"Control De Documentos")===0)
            {
             $_SESSION['idTrabajador']=$usr;
             echo "<script>window.location.replace('adminPage.php')</script>";
             }
            else{
                 $_SESSION['idTrabajador']=$usr;
             echo "<script>window.location.replace('aCl.php')</script>";
            }
        }else{
            $errors[]= "Usuario o password incorrectos";
        }
    }
    }
    if (isset($errors)){
            
            ?>
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error!</strong> 
                    <?php
                        foreach ($errors as $error) {
                                echo $error;
                            }
                        ?>
            </div>
            <?php
            }
      
?>