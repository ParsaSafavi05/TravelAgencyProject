<?php
    use App\Http\BaseController;
    use App\Models\DB;
    use App\Http\Request;


class LoginController extends BaseController{
    public function index()
    {
       $this->view('login/index', ['']);
    }

  public function validate()
{
    $email = Request::getParam('email');
    $password = md5(Request::getParam('password'));
   
    // $query = DB::table('users')
    //    ->where('email', '=', $email)
    //    ->and('password', '=', $password)
    //    ->getQuery();

    // echo "Query: $query";
    
    $user = DB::table('users')
       ->where('email', '=', $email)
       ->and('password', '=', $password)
       ->get();
       
       // Convert JSON string to associative array
       $userData = json_decode($user, true);
       
       session_start();
       if (!empty($userData)) {

           
        //    $id = DB::table('users')
        //    ->where('email', '=', $email)
        //    ->get('id');
        foreach ($userData as $user) {
            $user;
        }
        $_SESSION['msg'] = 'Login Successful';
        $_SESSION['UserLoggedIn'] = $user['user_id'];
        return $this->redirect('index',$user['user_id']);

        } 
    
    else{

        $_SESSION['msg'] = 'Wrong Email Or Password';
        return $this->redirect('index','');
        
    }
}



    
}