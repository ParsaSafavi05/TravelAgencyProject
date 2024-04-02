<?php
use App\Http\BaseController;

class ContactController extends BaseController{
    public function index()
    {
        return $this->view('contact/index', ['']);
    }
}