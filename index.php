<?php 

require_once("config.php");

$sql = new Sql();

//Agora fica muito mais fácil executar comandos no banco:
$usuarios = $sql->select("SELECT * FROM tb_usuario");

echo json_encode($usuarios);

?>