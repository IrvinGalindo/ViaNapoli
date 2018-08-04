<div class="content-wrapper" id ="main" >
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="adminPage.php">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Mesas</li>
      </ol>
      <!-- Icon Cards-->
      <div align="right" class="mr-1" ><a data-toggle='modal' data-target='#agregarfolder' data-padre="/"  href="" style="cursor: pointer;"><font size="6"><i class="fa fa-fw fa-plus-circle"></i></font></a></div><br>
     

          <?php
          include ("config.php");
           $resultados = mysqli_query($conexion,"SELECT nombre,color FROM folders where padre='/' order by nombre");
            if (mysqli_num_rows($resultados)>0) {
              echo " <div class='row'>";
           while ($consulta = mysqli_fetch_array($resultados))
             {
               echo "
                <div class='col-xl-3 col-sm-6 mb-3'>
                  <div class='card text-white bg-".$consulta['color']." o-hidden h-100'>
                      <div>
                        <a href='' data-target='#dfolder' data-toggle='modal' data-id='".$consulta['nombre']."' data-padre='/' style='cursor: pointer'><font color='white'><i class='fa fa-fw fa-trash'></font></i></a>
                      </div>
                    <div class='card-body'>
                        <div class='card-body-icon'>
                          <i class='fa fa-fw fa-folder-open'></i>
                        </div>
                      <div class='mr-5'>".$consulta['nombre']."</div>
                    </div>
                    <a class='card-footer text-white clearfix small z-1' href='sFo.php?p=".$consulta['nombre']."'>
                      <span class='float-left'>Ver contenido</span>
                      <span class='float-right'>
                        <i class='fa fa-angle-right'></i>
                      </span>
                    </a>
                  </div>
                </div>";
      }
      echo "
      </div>";
      }else
        echo "
        <div class='alert alert-info' role='alert'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <p align='center'>
            Sin folders
          </p>
        </div>";
    ?>
  </div>
</div>

 