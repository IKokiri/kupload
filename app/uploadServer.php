<?php

require "../vendor/autoload.php";

use File\File;
use DAO\Database;
use Server\Server;
/**
 * Classe responsável por tratar os propriedades de arquivos
 */
$oFile = new File();

$name = $_FILES['file']['name'];

$path = "files/";

$local = $path.$name;

$result = $oFile->verificarTipo($name);

if($result['status']){

    move_uploaded_file($_FILES['file']['tmp_name'], $local);

    $con = Database::getConnect();
    $sql = 'insert into files(nome,nomeReal,local,data) VALUES (:nome,:nomeReal,:local,curdate())';
    $query = $con->prepare($sql);

    $query->bindValue(':nome', $name, PDO::PARAM_STR);
    $query->bindValue(':nomeReal', $name, PDO::PARAM_STR);
    $query->bindValue(':local', $path, PDO::PARAM_STR);
    
    $result = Database::executa($query);

    header("Location: upload.php?link=".Server::getServerDownload().$local);

}else{
    echo $result['msg'];
} 


?>