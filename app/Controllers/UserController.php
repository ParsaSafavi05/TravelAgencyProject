<?php
use App\Http\BaseController;

class UserController extends BaseController{
    public function info()
    {
        return $this->view('user/info', ['']);
    }

    public function logout()

    {
        session_start();
        if (isset($_SESSION['UserLoggedIn'])) {
            unset($_SESSION['UserLoggedIn']);
        }
        return $this->redirect('../home/index',['']);
    }
}