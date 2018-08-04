<?php
    session_start();
    include 'config.php';

     $usr=$_REQUEST['numTrabajador'];
     $pwd=$_REQUEST['pass'];
     if(empty($usr)){
        $errors[]= "Ingresar un usuario";
     }else{
        if(empty($pwd)){
            $errors[]= "Ingresar password";
         }else{
     $qry = "SELECT cargo FROM trabajadores WHERE idTrabajador=$usr && pass='$pwd'";
     $rg=mysqli_query($conexion,$qry);
     if($rg){
    if(mysqli_num_rows($rg)>0)
    {        
      
      $empleado=mysqli_fetch_array($rg);
       $cargo=$empleado['cargo'];
         $qry = "INSERT INTO auth(numTrabajador,fecha,hora) VALUES($usr,CURDATE(),CURTIME())";
        $rg=mysqli_query($conexion,$qry);
        if(strcmp($cargo,"Control De Documentos")===0)
        {
             $_SESSION['idTrabajador']=$usr;
             echo "<script>window.location.replace('adminPage.php')</script>";
        }
         else{
                 $_SESSION['idTrabajador']=$usr;
             echo "<script>window.location.replace('aCl.php')</script>";
            }
                  
    } else{
        $errors[]= "Usuario o password incorrectos";

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