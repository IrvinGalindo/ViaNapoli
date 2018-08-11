<?php
 session_start();
if (empty($_SESSION['idTrabajador'])) {
  echo "<script type='text/javascript'>
alert ('Autentificación necesaria'); window.location.replace('index.html')</script>";
  exit();
  } ?>
<form id="formupdUser">
<div class="modal fade" id="upduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Modificar Usuario: </h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
            <input  type="number" class="form-control" id="idTrabajador" name="idTrabajador" placeholder="1234" required style="display: none;" />
          </div>
          <div class="form-group">
            <label for="nombre" class="control-label">Nombre(s):</label>
            <input  type="text" class="form-control" id="nombre" name="nombre" required placeholder="John" />
          </div>
          <div class="form-group">
            <label for="paterno" class="control-label" >Apellido paterno:</label>
            <input type="text" class="form-control" id="paterno" name="paterno" required placeholder="Smith" />
          </div>
          <div class="form-group">
            <label for="materno" class="control-label">Apellido materno:</label>
            <input type="text" class="form-control" id="materno" name="materno" required placeholder="Peter"/>
          </div>
          <div class="form-group">
            <label for="cargo" class="control-label">Cargo:</label>
            <input type="text" class="form-control" id="cargo" name="cargo" required placeholder="Director General"/>
          </div>
          <div class="form-group">
            <label for="pass" class="control-label">Contraseña:</label>
            <input type="text" class="form-control" id="contrasenia" name="contrasenia" required placeholder="1234jsp00"/>
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