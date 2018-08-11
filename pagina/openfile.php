<?php
$archivo=$_REQUEST['f'];

$tipo=$_REQUEST['form'];
header("Content-Disposition: inline; filename='$archivo'");
if($tipo==0)
header('Content-type: application/pdf');
else if($tipo==1)
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
elseif($tipo==2)
header('Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');

readfile("D:/flexcoah/archivosSGC/".$archivo);

?>