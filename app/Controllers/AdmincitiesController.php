<?php
use App\Http\BaseController;
use App\Models\DB;
use App\Http\Request;
class AdmincitiesController extends BaseController{
    public function index()
    {   
        session_start();
        if (isset($_SESSION['isAdmin'])) {
        $cities = DB::table('cities')
        ->select('city_id, city_name, country_name')
        ->join('countries','cities.country_id','countries.country_id')
        ->get();

        $cities = json_decode($cities);

        return $this->view('admin-cities/index', ['cities' => $cities]);
        }else{
            return $this->redirect('../home/index');
        }
       
    }

   
    public function insert()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {

            $countries = DB::table('countries')
            ->get();
            $countries = json_decode($countries);
            return $this->view('admin-cities/insert',['countries' => $countries]);
            }else{

            return $this->redirect('../home/index');

        }

    }

    public function insert_submit()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {

            $city_name = Request::getParam('city_name');
            $country_id = Request::getParam('country');
                if (!empty($city_name && !empty($country_id))) {
                    DB::table('cities')->create(
                        ['city_name', 'country_id'],
                        [$city_name, $country_id]
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

    public function update()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {
            
            $city_id = Request::getParam('id');

            $cities = DB::table('cities')
            ->join('countries','cities.country_id','countries.country_id')
            ->where('city_id','=',$city_id)
            ->get();
            $cities = json_decode($cities);
            
            $countries = DB::table('countries')
            ->where('country_id','!=',$cities[0]->country_id)
            ->get();
            $countries = json_decode($countries);

            return $this->view('admin-cities/update',[

                'cities' => $cities,
                'countries' => $countries
                
            ]);

        }else{

            return $this->redirect('../home/index');

        }
    }

    public function update_submit()
    {

      
        session_start();
        if (isset($_SESSION['isAdmin'])) {
            if (!empty(Request::getParam('city_name')) || !empty(Request::getParam('country')) ) {

                $city_id = Request::getParam('id');

                $city_name = Request::getParam('city_name');
                $country = Request::getParam('country');
               

                $datatoupdate = [];

                $datatoupdate['city_id'] = $city_id;
                if (!empty(Request::getParam('city_name'))) {
                    $datatoupdate['city_name'] = $city_name;
                }
                if (!empty(Request::getParam('country'))) {
                    $datatoupdate['country_id'] = $country;
                }

                $updateresult = DB::table('cities')->update($datatoupdate, 'country_id');

                if ($updateresult) {
                $_SESSION['msg'] = '1';  
                }else{
                    $_SESSION['msg'] = '2';
                }

                return $this->redirect('update?id='.$city_id);
        }
        }else{
        return $this->redirect('../home/index');
        }
    }

    
}