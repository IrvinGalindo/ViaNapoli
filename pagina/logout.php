<<<<<<< HEAD
<?php
session_start();
session_destroy();
 echo "<script>window.location.replace('index.html')</script>";
 exit();
=======
<?php
session_start();
unset($_SESSION['id_usuario']);
session_destroy();
 echo "<script>window.location.replace('index.html')</script>";
 exit();
>>>>>>> 718cfcc362c0d487aab55a62156a4e6c25a2c596
?>