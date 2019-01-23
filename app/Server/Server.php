<?php

namespace Server;

class Server{

    private static $serverReal = "http://localhost/kupload/";
    private static $serverDownload = "http://localhost/kupload/app/";

    public static function getServerReal(){
        return self::$serverReal;
    }

    public static function getServerDownload(){
        return self::$serverDownload;
    }
}

