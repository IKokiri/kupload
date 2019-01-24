<?php

$host="10.0.0.252";

exec("ping -c 1 " . $host, $output, $result);

if(isset($output[5])){
    header("Location: http://10.0.0.252:8090/kupload/app/upload.php");
}else{
    header("Location: http://201.49.127.157:9003/kupload/app/upload.php");
}