<?php
namespace App\Http;
class Request {
    public static function getParam($request)
    {
        return $_GET[$request] ?? $_POST[$request];
    }
}