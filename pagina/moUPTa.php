<?php
 session_start();
if (empty($_SESSION['id_usuario'])) {
  echo "<script type='text/javascript'>
alert ('Autentificación necesaria'); window.location.replace('index.html')</script>";
  exit();
  } ?>
<form id="updTa">
<div class="modal fade" id="updta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <input  type="text" class="form-control" id="idMesa" name="idMesa" />
        <h4 class="modal-title" id="exampleModalLabel">Modificar Mesa: </h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
            <label for="id" class="control-label">Asignar mesero:</label>
            <input  type="text" class="form-control" id="nombre" name="nombre" required placeholder="John" />
          </div>
          <div id="revisD"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    
      </div>
    </div>
  </div>
</div>
</form>