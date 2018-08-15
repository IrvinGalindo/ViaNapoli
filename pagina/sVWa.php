
  <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="aCl.php">Inicio</a>
        </li>
        <li class="breadcrumb-item active">SGC</li>
      </ol> 

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
            <div class='card-body'>
              <div class='card-body-icon'>
               <i class='fa fa-fw fa-folder-open'></i>
              </div>
              <div class='mr-5'>".$consulta['nombre']."</div>
            </div>
            <a class='card-footer text-white clearfix small z-1' href='sCl.php?p=".$consulta['nombre']."'>
              <span class='float-left'>Ver contenido</span>
              <span class='float-right'>
                <i class='fa fa-angle-right'></i>
              </span>
            </a>
          </div>
        </div>";
      }
      echo "</div>";
    }
    else
    echo "<div class='alert alert-info' role='alert'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <p align='center'>
          Sin folders
          </p>
      </div>";
    ?>