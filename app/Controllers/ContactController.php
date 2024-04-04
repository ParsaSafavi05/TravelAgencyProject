<?php
use App\Http\BaseController;
use App\Models\DB;
class ContactController extends BaseController{
    public function index()
    {
        session_start();
        if (!empty($_SESSION['UserLoggedIn'])) {
            $users = DB::table('users')->select('email, firstname, lastname')
            ->where('user_id','=',$_SESSION['UserLoggedIn'])
            ->get();

            $user = json_decode($users) ;
            return $this->view('contact/index', [

                'user'=>$user,
                
            ]);
    }else{
        return $this->view('contact/index',['']);
    }
}
}