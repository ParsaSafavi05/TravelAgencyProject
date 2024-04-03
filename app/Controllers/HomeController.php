<?php
use App\Http\BaseController;

class HomeController extends BaseController{
    public function index()
    {
       return $this->view('home/index', ['']);
    }
}
