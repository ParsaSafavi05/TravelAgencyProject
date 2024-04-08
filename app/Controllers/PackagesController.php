<?php
use App\Http\BaseController;
use App\Models\DB;
use App\Http\Request;



class PackagesController extends BaseController{
    public function index()
    {
        session_start();
        $countries = DB::table('countries')
        ->where('countries.active','=','1')
        ->get();
        if(isset($_SESSION['UserLoggedIn'])){
            $userpackages = DB::table('bookings')
            ->join('packages','bookings.package_id','packages.package_id')
            ->join('destinations','packages.destination_id','destinations.destination_id')
            ->where('user_id','=',$_SESSION['UserLoggedIn'])
            ->get();
            return $this->view('packages/index',[
                'countries' => $countries,
                'userpackages' => $userpackages,
            ]);
        }else{
            return $this->view('packages/index',[
                'countries' => $countries,
            ]);
        }
        
        
        
    }

    public function country()
    {
        $country_id = Request::getParam('id');
        $packages = DB::table('packages')
        ->join('destinations','packages.destination_id','destinations.destination_id')
        ->join('hotels','packages.hotel_id','hotels.hotel_id')
        ->join('countries','destinations.country_id','countries.country_id')
        ->join('cities','destinations.city_id','cities.city_id')
        ->where('countries.country_id','=',$country_id)
        ->get();
        return $this->view('packages/country', ['packages' => $packages]);

    }

    public function book()
    {
        session_start();
        if (isset($_SESSION['UserLoggedIn'])) {
            $package_id = Request::getParam('id');
        $packages = DB::table('packages')
        ->join('destinations','packages.destination_id','destinations.destination_id')
        ->join('hotels','packages.hotel_id','hotels.hotel_id')
        ->join('countries','destinations.country_id','countries.country_id')
        ->join('cities','destinations.city_id','cities.city_id')
        ->where('packages.package_id','=',$package_id)
        ->get();
        return $this->view('packages/book',['packages' => $packages]);
        }else{
            return $this->redirect('../login/index');
        }
        
    }

    public function book_validate()
    {   
        session_start();

        $package_id = Request::getParam('package_id');
        $day = Request::getParam('day');
        $month = Request::getParam('month');
        $year = Request::getParam('year');
        $numberofpassengers = Request::getParam('numberofpassengers');

        $packages = DB::table('packages')
        ->where('packages.package_id','=',$package_id)
        ->get();

        $packages = json_decode($packages);

        if ($day < 10) {
            $day = '0'.$day;
        }
        if (!empty($package_id) &&
            !empty($day) && 
            !empty($year) && 
            !empty($month) &&
            !empty($numberofpassengers) &&
            $numberofpassengers < $packages[0]->spots_remaining ) {

                $result = DB::table('bookings')->create(
                    ['user_id', 'package_id' ,'date' ,'num_of_passangers', 'total_price'],
                    [$_SESSION['UserLoggedIn'], $package_id, $month.'/'.$day.'/'.$year, $numberofpassengers, $numberofpassengers * $packages[0]->package_price]);
            
                if ($result) {
                    $_SESSION['msg'] = '1';
                } else {
                    $_SESSION['msg'] = '1';
                }
        }

        return $this->redirect("index");
    }
}