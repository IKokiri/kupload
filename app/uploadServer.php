<?php

require "../vendor/autoload.php";

header('Access-Control-Allow-Origin: *');

use File\File;
use DAO\Database;
use Server\Server;

if(isset($_REQUEST['code'])){

    $con = Database::getConnect();
    
    $sql = 'select * from files where code = :code limit 1';
    
    $query = $con->prepare($sql);

    $query->bindValue(':code', $_REQUEST['code'], PDO::PARAM_STR);
    
    $result = Database::executa($query);

    $linha = $query->fetch(PDO::FETCH_ASSOC);

    echo json_encode($linha);

    die;
}
/**
 * Classe responsável por tratar os propriedades de arquivos
 */
$oFile = new File();

$name = $_FILES['file']['name'];
$size = $_FILES['file']['size'];

$path = "files/";

$local = $path.$name;

$result = $oFile->verificarTipo($name);

if($result['status']){

    move_uploaded_file($_FILES['file']['tmp_name'], $local);

    $con = Database::getConnect();
    $sql = 'insert into files(nome,nomeReal,local,data,code,size) VALUES (:nome,:nomeReal,:local,curdate(),:code,:size)';
    $query = $con->prepare($sql);

    $code = md5(date("YmdHis"),'');

    $query->bindValue(':nome', $name, PDO::PARAM_STR);
    $query->bindValue(':nomeReal', $name, PDO::PARAM_STR);
    $query->bindValue(':local', $path, PDO::PARAM_STR);
    $query->bindValue(':code', $code, PDO::PARAM_STR);
    $query->bindValue(':size', $size, PDO::PARAM_STR);
    
    $result = Database::executa($query);

    header("Location: upload.php?link=".Server::getServerDownload()."?code=".$code);

}else{
    
    header("Location: upload.php?msgErro=".$result['msg']);
} 


?>