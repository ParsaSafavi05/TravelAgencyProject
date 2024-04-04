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

       $userData = json_decode($user, true);
       
       session_start();
       if (!empty($userData)) {


        foreach ($userData as $user) {
            $user;
        }
        
        if ($user['role_id'] === '1') {

            $_SESSION['isAdmin'] = $user['user_id'];
            return $this->redirect('../adminpanel/index');

        }else{
            
            $_SESSION['UserLoggedIn'] = $user['user_id'];
            return $this->redirect('index',$user['user_id']);

        }

        } 
    
    else{

        $_SESSION['msg'] = '1';
        return $this->redirect('index');
        
    }
}



    
}