<?php
 session_start();
if (empty($_SESSION['idTrabajador'])) {
  echo "<script type='text/javascript'>
alert ('Autentificación necesaria'); window.location.replace('index.html')</script>";
  exit();
  } ?>
<form id="agregarFile" enctype="multipart/form-data">
<div class="modal fade" id="agregarfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <input type="hidden" id="padre" name="padre"/>
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Agregar Archivo</h4>
      </div>
      <div class="modal-body">
      <div id="datos_ajax"></div>
      <div class="form-group">
          </div>
          <div class="form-group">
            <label for="tipo" class="control-label">Tipo:</label>
            <select type="text" class="form-control" id="tipo" name="tipo" required />
            <option value="GR">GR</option>
            <option value="IT">IT</option>
            <option value="PR">PR</option>
            <option value="PSO">PSO</option>
            <option value="RC">RC</option>
            </select>
          </div>
          <div class="form-group">
            <label for="archi" class="control-label">Selecciona un archivo:</label>
            <input type="file" class="form-control" id="archi" name="archi">
          </div>
         
          <div id="reg"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
    
      </div>
    </div>
  </div>
</div>
</form>