<?php

try{
//nos conectamos a la base de datos con un conneciton string
$pdo = new PDO('mysql:host=localhost;dbname=flexcoah;charset=utf8mb4', 'admin', '1092pezveslad15_,');
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
if (empty($pdo)) {
    $errors[] = "No se puede conectar al servidor";
}
//author IOGB - Irvin Omar Galindo Becerra
}catch(PDOException $e){
    $errors[] ="No se pudo conectar al servidor";
}
?>