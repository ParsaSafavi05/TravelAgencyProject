<?php
use App\Http\BaseController;
use App\Models\DB;


class UserController extends BaseController{
    public function info()
    {
        session_start();
        if (isset($_SESSION['UserLoggedIn'])) {

            $users = DB::table('users')
            ->where('user_id','=',$_SESSION['UserLoggedIn'])
            ->get();

            $user = json_decode($users) ;

            return $this->view('user/info', [

                'user'=>$user,
                
            ]);

        }else{

            return $this->redirect('../login/index',['']);

        }
        


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