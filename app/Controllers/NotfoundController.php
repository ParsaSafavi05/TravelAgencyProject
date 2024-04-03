<?php
use App\Http\BaseController;

class NotfoundController extends BaseController{
    public function index()
    {
       return $this->view('notfound/index', ['']);
    }
}
