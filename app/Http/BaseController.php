<?php
namespace App\Http;

use App\Http\Config;
use ArrayAccess;

class BaseController {
    public function view($view, array $data)
    {
        extract($data);

        return require_once Config::RESOURCES_PATH . $view . '.php';
    }

    public function layout($content)
    {
        $getTemplate = file_get_contents(Config::LAYOUT_PATH);
        echo str_replace('{{content}}', $content, $getTemplate);
    }
    
    public function adminlayout($content)
    {
        
        $getTemplate = file_get_contents(Config::ADMIN_LAYOUT_PATH);
        echo str_replace('{{content}}', $content, $getTemplate);
    }

    public function redirect($path)
    {
        return header("location:{$path}");
    }
    public function with($msg)
    {
        return $msg;
    }
}