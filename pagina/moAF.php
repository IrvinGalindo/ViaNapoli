<?php
//session_start();
if (empty($_SESSION['id_usuario'])) {
  echo "<script type='text/javascript'>
alert ('Autentificación necesaria'); window.location.replace('index.html')</script>";
  exit();
  } ?>
<form id="agregarFolder">
<div class="modal fade" id="agregarfolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <input type="hidden" id="padre" name="padre"/>
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Agregar Folder</h4>
      </div>
      <div class="modal-body">
      <div id="datos_ajax"></div>
      <div class="form-group">
          </div>
            <div class="form-group">
            <label for="nombre" class="control-label">Nombre:</label>
            <input  type="text" class="form-control" id="nombre" name="nombre" placeholder="Recursos Humanos" required />
          </div>
          <div class="form-group">
            <label for="color" class="control-label">Color:</label>
            <select type="text" class="form-control" id="color" name="color" required />
            <option value="primary">Azul</option>
            <option value="warning">Amarillo</option>
            <option value="success">Verde</option>
            <option value="danger">Rojo</option>
            </select>
          </div>
         
          <div id="regUser"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
    
      </div>
    </div>
  </div>
</div>
</form>