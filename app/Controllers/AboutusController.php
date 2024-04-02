<?php
use App\Http\BaseController;

class AboutusController extends BaseController{
    public function index()
    {
        return $this->view('aboutus/index', ['']);
    }
}