<div class="content-wrapper" id ="mainTa" >
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="adminPage.php">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Mesas</li>
      </ol>
      <!-- Icon Cards-->
      <div align="right" class="mr-1" ><a data-toggle='modal' data-target='#agregarmesa'  href="" style="cursor: pointer;"><font size="6"><i class="fa fa-fw fa-plus-circle"></i></font></a></div><br>
     

          <?php
          include ("config.php");
          $stmt = $pdo->prepare("SELECT id_mesa FROM mesa");
          //ejecutamos el query haciendo que pdo reemplace las variables.
          $stmt->execute();
          $mesas = $stmt -> fetchAll();
     
          //obtenemos los resultado
          if (isset($mesas)) {
            echo " <div class='row'>";
            foreach ($mesas as $mesa) {
              echo "
                <div class='col-xl-3 col-sm-6 mb-3'>
                  <div class='card text-white bg-success o-hidden h-150'>
                      <div>
                       <a href='' data-target='#dmesa' data-toggle='modal' data-id='".$mesa['id_mesa']."' style='cursor: pointer'><font color='white'><i class='fa fa-fw fa-trash'></font></i></a>
                       <a href='' data-target='#dmesa' data-toggle='modal' data-id='".$mesa['id_mesa']."' style='cursor: pointer'><font color='white'><i class='fa fa-fw fa-refresh'></font></i></a>
                    </div>
                    <div class='card-body'>
                        <div class='card-body-icon'>
                          <i class='fa fa-fw fa-cutlery'></i>
                        </div>
                      <div class='mr-5'>".$mesa['id_mesa']."</div>
                    </div>
                    <a class='card-footer text-white clearfix small z-1' href='sFo.php?p=".$mesa['id_mesa']."'>
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
    
    
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>