<?php
use App\Http\BaseController;
use App\Models\DB;
use App\Http\Request;
class AdminpanelController extends BaseController{
    public function index()
    {
       return $this->view('adminpanel/index', ['']);
    }
    
    public function info()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {

            $users = DB::table('users')
            ->where('user_id','=',$_SESSION['isAdmin'])
            ->get();

            $user = json_decode($users) ;

            return $this->view('adminpanel/info', [

                'user'=>$user,
                
            ]);

        }else{

            return $this->redirect('../login/index',['']);

        }
    }

    public function update()
    {
        session_start();
       

        if (!empty(Request::getParam('address')) || !empty(Request::getParam('phonenumber')) || !empty(Request::getParam('newpassword'))) {

            $firstname = Request::getParam('firstname');
            $lastname = Request::getParam('lastname');
            $address = Request::getParam('address');
            $phonenumber = Request::getParam('phonenumber');
            $newpassword = Request::getParam('newpassword');
            $repeatpassword = Request::getParam('repeatpassword');

            $datatoupdate = [];
            $datatoupdate['user_id'] = $_SESSION['isAdmin'];
            if (!empty(Request::getParam('address'))) {
                $datatoupdate['address'] = $address;
            }

            if (!empty(Request::getParam('phonenumber'))) {
                $datatoupdate['phonenumber'] = $phonenumber;
            }

            if (!empty(Request::getParam('newpassword')) && $newpassword === $repeatpassword) {
                $datatoupdate['password'] = md5($newpassword);
            }

            if (!empty(Request::getParam('firstname'))) {
                $datatoupdate['firstname'] = $firstname;
            }

            if (!empty(Request::getParam('lastname'))) {
                $datatoupdate['lastname'] = $lastname;
            }

            $updateresult = DB::table('users')->update($datatoupdate, 'user_id');

            if ($updateresult) {
                $_SESSION['msg'] = '1';  
            }else{
                $_SESSION['msg'] = '2';
            }

            return $this->redirect('info');
            

        }

        


        
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
