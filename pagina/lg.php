<?php
    session_start();
    include 'config.php';
    //obtenemos las credenciales del usuario

    //Lg descomentar las 3 lineas del 2, 25, 29 
    //admin page regresar el codigo de la etiqueta php isset cambiar a empty
    //Seesion con id_usuario
     $usr=$_POST['id_usuario'];
     $pwd=$_POST['pwd'];
     
     if(empty($usr)){
        $errors[]= "Ingresar un usuario";
     }else{
        if(empty($pwd)){
            $errors[]= "Ingresar password";
        }else{
         //preparamos nuestra declaracion
        $stmt = $pdo->prepare("SELECT tipo FROM usuario WHERE id_usuario=? AND pwd=?");
        //ejecutamos el query haciendo que pdo reemplace las variables.
        $stmt->execute(array($usr, $pwd));
        //obtenemos los resultado
        $resultado = $stmt -> fetchColumn(0);       
        if(strcmp($resultado,"")!==0){
           
            if(strcmp($resultado,"0") === 0)
            {
                $_SESSION['id_usuario'] = $usr;
                echo "<script>window.location.replace('adminPage.php')</script>";
             }
            else{
                 $_SESSION['id_usuario'] = $usr;
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