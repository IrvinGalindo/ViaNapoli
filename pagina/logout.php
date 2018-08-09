<?php
session_start();
unset($_SESSION['id_usuario']);
session_destroy();
 echo "<script>window.location.replace('index.html')</script>";
 exit();
?>