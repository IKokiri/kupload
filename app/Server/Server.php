<?php

namespace Server;

class Server{

    private static $serverReal = "http://localhost/kupload";
    private static $serverDownload = "http://localhost/kupload/app/files";

    public function getServerReal(){
        return self::$serverReal;
    }

    public function getServerDownload(){
        return self::$getServerDownload;
    }
}

