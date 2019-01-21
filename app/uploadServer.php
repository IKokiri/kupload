<?php

require "../vendor/autoload.php";

use File\File;
use DAO\Database;
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
    $sql = 'insert into files(nome,nomeReal,local) VALUES (:nome,:nomeReal,:local)';
    $query = $con->prepare($sql);

    $query->bindValue(':nome', $name, PDO::PARAM_STR);
    $query->bindValue(':nomeReal', $path, PDO::PARAM_STR);
    $query->bindValue(':local', $local, PDO::PARAM_STR);

    $result = Database::executa($query);

}else{

} 

?>