<?php
namespace App\Http;
class Request {
    public static function getParam($request)
    {
        return $_GET[$request] ?? $_POST[$request];
    }

    public static function getFile($key)
    {
        return isset($_FILES[$key]) ? $_FILES[$key] : null;
    }
}