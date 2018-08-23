<?php
// session_start();
if (empty($_SESSION['id_usuario'])) {
  echo "<script type = 'text/javascript'>
alert ('Autentificación necesaria'); window.location.replace('index.html')</script>";
  exit();
  } ?>
<form id = "dAll">
<div class = "modal fade" id = "dall" tabindex = "-1" role = "dialog" aria-labelledby = "exampleModalLabel">
  <div class = "modal-dialog" role = "document">
    <div class = "modal-content">
      <input type = "hidden" id = "id" name = "id"/>
      <input type = "hidden" id = "tname" name = "tname"/>
      <h2 class = "text-center text-muted">Estas seguro?</h2>
      <p class = "lead text-muted text-center" id = "label" style = "display: block;margin:10px">Esta acción eliminará de forma permanente el registro. ¿Deseas continuar?</p>
    <div id = "regDeMesa"></div>
      <div class = "modal-footer">
        <button type = "button" class = "btn btn-lg btn-default" data-dismiss = "modal">Cancelar</button>
        <button type = "submit" class = "btn btn-lg btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
</form>