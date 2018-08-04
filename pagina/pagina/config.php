<?php
$host_db = 'localhost';
$usuario_db = 'admin';
$password_db = "1092pezveslad15_,";
$nombre_db = 'flexcoah';

$conexion = mysqli_connect("$host_db", "$usuario_db", "$password_db", "$nombre_db");

if (!$conexion) {
    echo "No se puede conectar al servidor";
}
//author IOGB - Irvin Omar Galindo Becerra
?>