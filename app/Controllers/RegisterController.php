<?php
use App\Http\BaseController;
use App\Models\DB;
use App\Http\Request;


class RegisterController extends BaseController{
    public function index()
    {
       $this->view('register/index', ['']);
    }

    public function addUser()
    {
        
        $firstname = Request::getParam('firstname');
        $lastname = Request::getParam('lastname');
        $email = Request::getParam('email');
        $phonenumber = Request::getParam('phonenumber');
        $password = md5(Request::getParam('password'));
        $confirm_password = md5(Request::getParam('confirm_password'));
        
        $getUsers = DB::table('users')
        ->where('email','=',$email)
        ->get();

        session_start();
        // check inputs
        if (isset($firstname) && !empty($firstname) &&
            isset($lastname) && !empty($lastname) &&
            isset($email) && !empty($email) &&
            isset($phonenumber) && !empty($phonenumber) &&
            isset($password) && !empty($password)){

                //check if user exists
                if(strlen($getUsers) > 2){

                    $_SESSION['msg'] = 'User Already Exists';
                    return $this->redirect('index','');

                }
                else{


                    //check if password is correct
                    if($password === $confirm_password){

                        DB::table('users')->create(
                            ['firstname', 'lastname' ,'email' ,'phonenumber', 'password','role_id'],
                            [$firstname, $lastname, $email, $phonenumber, $password, 3]

                        );

                        $_SESSION['msg'] = '1';

                        return $this->redirect('index','');
                        
                        
                    }
                    
                    else
                    {

                        $_SESSION['msg'] = 'Passwords do not match!';
                        return $this->redirect('index','');

                    }
                }
            }
            else
            {

                $_SESSION['msg'] = 'Please fill in all fields!';
                return $this->redirect('index','');

            }
    }
}
