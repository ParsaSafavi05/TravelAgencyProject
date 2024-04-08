<?php
use App\Http\BaseController;
use App\Models\DB;
use App\Http\Request;
class AdmincountriesController extends BaseController{
    public function index()
    {   
        session_start();
        if (isset($_SESSION['isAdmin'])) {
        $countries = DB::table('countries')
        ->get();

        $countries = json_decode($countries);

        return $this->view('admin-countries/index', ['countries' => $countries]);
        }else{
            return $this->redirect('../home/index');
        }
       
    }

    public function update()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {
            
            $country_id = Request::getParam('id');

            $country = DB::table('countries')
            ->where('country_id','=',$country_id)
            ->get();

            $country = json_decode($country);
            return $this->view('admin-countries/update',[

                'country' => $country
                
            ]);

        }else{

            return $this->redirect('../home/index');

        }
    }

    public function update_submit()
    {

      
        session_start();
        if (isset($_SESSION['isAdmin'])) {
            if (!empty(Request::getParam('country_name')) || !empty(Request::getParam('active')) ) {

                $country_id = Request::getParam('id');

                $country_name = Request::getParam('country_name');
                $active = Request::getParam('active');
               

                $datatoupdate = [];

                $datatoupdate['country_id'] = $country_id;
                if (!empty(Request::getParam('country_name'))) {
                    $datatoupdate['country_name'] = $country_name;
                }

                    $datatoupdate['active'] = $active;

                $updateresult = DB::table('countries')->update($datatoupdate, 'country_id');

                if ($updateresult) {
                $_SESSION['msg'] = '1';  
                }else{
                    $_SESSION['msg'] = '2';
                }

                return $this->redirect('update?id='.$country_id);
        }
        }else{
        return $this->redirect('../home/index');
        }
    }

    
    public function insert()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {

            
            return $this->view('admin-countries/insert',['']);
            }else{

            return $this->redirect('../home/index');

        }

    }

    public function insert_submit()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {

            $country_name = Request::getParam('country_name');
            $active = Request::getParam('active');
                if (!empty($country_name && !empty($active))) {
                    DB::table('countries')->create(
                        ['country_name', 'active'],
                        [$country_name, $active]
                    );
                    $_SESSION['msg'] = '1';
                }else{
                    
                    $_SESSION['msg'] = '2';
                }
           

            return $this->redirect('insert');

        }else{

            return $this->redirect('../home/index');

        }
    }

}