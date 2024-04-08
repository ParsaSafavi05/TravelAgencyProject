<?php
use App\Http\BaseController;
use App\Models\DB;
use App\Http\Request;
class AdminusersController extends BaseController{
    public function index()
    {   
        session_start();
        if (isset($_SESSION['isAdmin'])) {
        $users = DB::table('users')
        ->join('roles','users.role_id','roles.role_id')
        ->get();

        $users = json_decode($users);

        return $this->view('admin-users/index', ['users' => $users]);
        }else{
            return $this->redirect('../home/index');
        }
       
    }

   
    public function insert()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {
           
            return $this->view('admin-users/insert',['']);
            }else{

            return $this->redirect('../home/index');

        }

    }

    public function insert_submit()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {

            $firstname = Request::getParam('firstname');
            $lastname = Request::getParam('lastname');
            $email = Request::getParam('email');
            $phonenumber = Request::getParam('phonenumber');
            $password = Request::getParam('password');
            $repeatpassword = Request::getParam('repeatpassword');
            $address = Request::getParam('address');
            $role = Request::getParam('role');
            
            $getUsers = DB::table('users')
            ->where('email','=',$email)
            ->get();

                if (!empty($firstname && !empty($lastname) && !empty($email)
                    && !empty($phonenumber) && !empty($password) && !empty($repeatpassword) 
                    && !empty($role) )) {

                        if ($password === $repeatpassword) {
                            if (strlen($getUsers) > 3) {
                               
                                $_SESSION['msg'] = '4';
                                return $this->redirect('insert');
                            }else{
                                if (!empty($address)) {
                                    DB::table('users')->create(
                                        ['firstname', 'lastname', 'email', 'phonenumber', 'password', 'address', 'role_id'],
                                        [$firstname, $lastname, $email, $phonenumber, md5($password), $address, $role]
                                    );
                                }else{
                                    DB::table('users')->create(
                                        ['firstname', 'lastname', 'email', 'phonenumber', 'password', 'role_id'],
                                        [$firstname, $lastname, $email, $phonenumber, md5($password), $role]
                                    );
                                }
                                $_SESSION['msg'] = '1';
                                return $this->redirect('insert');
                            }
                                

                        }else{
                            
                            $_SESSION['msg'] = '3';
                            return $this->redirect('insert');
                        }
                    
                }else{
                    
                    $_SESSION['msg'] = '2';
                    return $this->redirect('insert');
                }
           

            return $this->redirect('insert');

        }else{

            return $this->redirect('../home/index');

        }
    }

    public function update()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {

            $user_id = Request::getParam('id');
            $users = DB::table('users')
            ->where('user_id','=',$user_id)
            ->get();

            $user = json_decode($users) ;

            return $this->view('admin-users/update', [

                'user'=>$user,
                
            ]);

        }else{

            return $this->redirect('../login/index',['']);

        }
    }

    public function update_submit()
    {

        session_start();
        if (isset($_SESSION['isAdmin'])) {
            if (!empty(Request::getParam('firstname')) || !empty(Request::getParam('lastname')) || !empty(Request::getParam('email'))
                || !empty(Request::getParam('address')) || !empty(Request::getParam('phonenumber')) || !empty(Request::getParam('password'))
                || !empty(Request::getParam('repeatpassword')) || !empty(Request::getParam('role'))) {

                $user_id = Request::getParam('id');

                $firstname = Request::getParam('firstname');
                $lastname = Request::getParam('lastname');
                $email = Request::getParam('email');
                $address = Request::getParam('address');
                $phonenumber = Request::getParam('phonenumber');
                $password = Request::getParam('password');
                $repeatpassword = Request::getParam('repeatpassword');
                $role = Request::getParam('role');

                $datatoupdate = [];
                $datatoupdate['user_id'] = $user_id;
                if (!empty(Request::getParam('address'))) {
                    $datatoupdate['address'] = $address;
                }

                if (!empty(Request::getParam('phonenumber'))) {
                    $datatoupdate['phonenumber'] = $phonenumber;
                }
                
                if (!empty(Request::getParam('password'))) {
                    if ($password === $repeatpassword) {
                        
                        $datatoupdate['password'] = md5($password);
                    }else{
                        $_SESSION['msg'] = 3;
                        return $this->redirect('update?id='.$user_id.'');

                    }
                }

                if (!empty(Request::getParam('firstname'))) {
                    $datatoupdate['firstname'] = $firstname;
                }

                if (!empty(Request::getParam('lastname'))) {
                    $datatoupdate['lastname'] = $lastname;
                }

                if (!empty(Request::getParam('email'))) {
                    $datatoupdate['email'] = $email;
                }

                if (!empty(Request::getParam('role'))) {
                    $datatoupdate['role_id'] = $role;
                }

                $updateresult = DB::table('users')->update($datatoupdate, 'user_id');

                if ($updateresult) {
                    $_SESSION['msg'] = 1;  
                }else{
                    $_SESSION['msg'] = 2;
                }
            
                return $this->redirect('update?id='.$user_id.'');
        
            }
        }else{
        return $this->redirect('../home/index');
        }
}   

    
}