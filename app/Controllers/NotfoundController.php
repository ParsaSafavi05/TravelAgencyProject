<?php
use App\Http\BaseController;
use App\Models\DB;
class NotfoundController extends BaseController{
    public function index()
    {
        session_start();
        if (isset($_SESSION['UserLoggedIn'])) {
            $userinfo = DB::table('users')
            ->where('user_id','=',$_SESSION['UserLoggedIn'])
            ->get();
            
            $userinfo = json_decode($userinfo);
    
           return $this->view('notfound/index', ['userinfo' => $userinfo]);
           
        }elseif (isset($_SESSION['isAdmin'])) {
            $userinfo = DB::table('users')
            ->where('user_id','=',$_SESSION['isAdmin'])
            ->get();
            
            $userinfo = json_decode($userinfo);
            
            return $this->view('notfound/index', ['userinfo' => $userinfo]);

        }else{
            
            return $this->view('notfound/index', ['']);
        }
       
    }
}
