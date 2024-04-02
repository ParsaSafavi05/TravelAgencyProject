<?php
use App\Http\BaseController;

class HomeController extends BaseController{
    public function index()
    {
       $this->view('home/index', ['']);
    }
}
