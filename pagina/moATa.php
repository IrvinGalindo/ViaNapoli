<?php
//session_start();
if (empty($_SESSION['id_usuario'])) {
  echo "<script type='text/javascript'>
alert ('Autentificación necesaria'); window.location.replace('index.html')</script>";
  exit();
  } ?>
<form id="agregarMesa">
<div class="modal fade" id="agregarmesa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Agregar Mesas</h4>
      </div>
      <div class="modal-body">
      <div id="datos_ajax"></div>
      <div class="form-group">
          </div>
            <div class="form-group">
            <label for="nombreMe" class="control-label">Nombre de la mesa:</label>
            <input  type="text" class="form-control" id="idMes" name="idMes" placeholder="A1" required />
          </div>
          <div class="form-group">
            <label for="nomUsuario" class="control-label">Usuario:</label>
            <select type="text" class="form-control" id="idUs" name="idUs" required />
            <?php
                include("config.php");
                //preparamos nuestra declaracion
                $stmt = $pdo -> prepare("SELECT id_usuario,nombre FROM usuario
                 WHERE tipo <> 0");
                //ejecutamos el query haciendo que pdo reemplace las variables.
                 $stmt -> execute();
                 //obtenemos los resultado
                 $resultado = $stmt -> fetchAll();
                foreach($resultado as $usuario){              
                  echo "<option value='".$usuario['id_usuario']."'>".$usuario['nombre']."</option>";
                }
            ?>
            </select>
          </div>
         
          <div id="regMesa"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
    
      </div>
    </div>
  </div>
</div>
</form>