<?php

require "File.php";

/**
 * Classe responsável por tratar os propriedades de arquivos
 */
$oFile = new File();

$name = $_FILES['file']['name'];
$path = "files/";
echo $local = $path.$name;

$result = $oFile->verificarTipo($name);

if($result['status']){
    move_uploaded_file($_FILES['file']['tmp_name'], $local);
    echo $result['msg'];
}else{
    echo $result['msg'];
}

?>