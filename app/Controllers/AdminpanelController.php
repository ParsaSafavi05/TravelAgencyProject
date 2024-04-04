<?php
use App\Http\BaseController;

class AdminpanelController extends BaseController{
    public function index()
    {
       return $this->view('adminpanel/index', ['']);
    }
    
    public function info()
    {
        
        return $this->view('adminpanel/info', ['']);
    }

    public function logout()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {
            unset($_SESSION['isAdmin']);
        }
        return $this->redirect('../home/index',['']);
    }
}
