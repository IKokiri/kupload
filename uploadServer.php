<?php

$name = $_FILES['file']['name'];

$path = "files";

$local = $path.$name;

move_uploaded_file($_FILES['file']['tmp_name'], $local);



?>