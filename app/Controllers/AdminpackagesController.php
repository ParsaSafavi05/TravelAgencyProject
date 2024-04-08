<?php
use App\Http\BaseController;
use App\Models\DB;
use App\Http\Request;
class AdminpackagesController extends BaseController{
    public function index()
    {   
        session_start();
        if (isset($_SESSION['isAdmin'])) {
        $packages = DB::table('packages')->select('packages.package_id, packages.package_name, packages.package_length,
         packages.spots_remaining, packages.created_at, packages.updated_at, cities.city_name, countries.country_name, hotels.hotel_name' )
        ->join('destinations','packages.destination_id','destinations.destination_id')
        ->join('hotels','packages.hotel_id','hotels.hotel_id')
        ->join('countries','destinations.country_id','countries.country_id')
        ->join('cities','destinations.city_id','cities.city_id')
        ->get();

        $packages = json_decode($packages);

        return $this->view('admin-packages/index', ['packages' => $packages]);
        }else{
            return $this->redirect('../home/index');
        }
       
    }

    public function update()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {
            $destinations = DB::table('destinations')->get();
            $destinations = json_decode($destinations);

            $hotels = DB::table('hotels')
            ->join('countries','hotels.country_id','countries.country_id')
            ->join('cities','hotels.city_id','cities.city_id')
            ->get();
            $hotels = json_decode($hotels);

            $package_id = Request::getParam('id');

            $package = DB::table('packages')
            ->join('destinations','packages.destination_id','destinations.destination_id')
            ->join('hotels','packages.hotel_id','hotels.hotel_id')
            ->join('countries','destinations.country_id','countries.country_id')
            ->join('cities','destinations.city_id','cities.city_id')
            ->where('package_id','=',$package_id)
            ->get();

            $package = json_decode($package);
            return $this->view('admin-packages/update',[
                'package' => $package,
                'destinations' => $destinations,
                'hotels' => $hotels
            ]);

        }else{

            return $this->redirect('../home/index');

        }
    }

    public function update_submit()
    {

      
        session_start();
        if (isset($_SESSION['isAdmin'])) {
            if (!empty(Request::getParam('package_name')) || !empty(Request::getParam('destination')) || !empty(Request::getParam('hotel'))|| 
                !empty(Request::getParam('package_price')) || !empty(Request::getParam('package_length')) || !empty(Request::getParam('spots_remaining'))||
                !empty(Request::getParam('package_description'))) {

                $package_id = Request::getParam('id');
                $package_name = Request::getParam('package_name');
                $destination = Request::getParam('destination');
                $hotel = Request::getParam('hotel');
                $package_price = Request::getParam('package_price');
                $package_length = Request::getParam('package_length');
                $spots_remaining = Request::getParam('spots_remaining');
                $package_description = Request::getParam('package_description');

                $datatoupdate = [];

                $datatoupdate['package_id'] = $package_id;
                if (!empty(Request::getParam('package_name'))) {
                    $datatoupdate['package_name'] = $package_name;
                }

                if (!empty(Request::getParam('destination'))) {
                    $datatoupdate['destination_id'] = $destination;
                }

                if (!empty(Request::getParam('hotel'))) {
                    $datatoupdate['hotel_id'] = $hotel;
                }

                if (!empty(Request::getParam('package_price'))) {
                    $datatoupdate['package_price'] = $package_price;
                }

                if (!empty(Request::getParam('package_length'))) {
                    $datatoupdate['package_length'] = $package_length;
                }

                if (!empty(Request::getParam('spots_remaining'))) {
                    $datatoupdate['spots_remaining'] = $spots_remaining;
                }

                if (!empty(Request::getParam('package_description'))) {
                    $datatoupdate['package_description'] = $package_description;
                }

                $updateresult = DB::table('packages')->update($datatoupdate, 'package_id');

                if ($updateresult) {
                $_SESSION['msg'] = '1';  
                }else{
                    $_SESSION['msg'] = '2';
                }

                return $this->redirect('update?id='.$package_id);
        }
    }else{
        return $this->redirect('../home/index');
    }
    }

    public function new()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {
            $destinations = DB::table('destinations')->get();
            $destinations = json_decode($destinations);

            $hotels = DB::table('hotels')
            ->join('countries','hotels.country_id','countries.country_id')
            ->join('cities','hotels.city_id','cities.city_id')
            ->get();
            $hotels = json_decode($hotels);

            return $this->view('admin-packages/new', [
                'destinations' => $destinations,
                'hotels' => $hotels
            ]);

        }else{

            return $this->redirect('../home/index');

        }
    }

    public function insert()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {

            $package_name = Request::getParam('package_name');
            $destination = Request::getParam('destination');
            $hotel = Request::getParam('hotel');
            $package_price = Request::getParam('package_price');
            $package_length = Request::getParam('package_length');
            $spots_remaining = Request::getParam('spots_remaining');
            $package_description = Request::getParam('package_description');

            if (!empty($package_name) && !empty($destination) &&
                !empty($hotel) && !empty($package_price) &&
                !empty($package_length) && !empty($spots_remaining) &&
                !empty($package_description)) {

                DB::table('packages')->create(
                    ['package_name', 'destination_id' ,'hotel_id' ,'package_price', 'package_length','spots_remaining','package_description'],
                    [$package_name, $destination, $hotel, $package_price, $package_length, $spots_remaining, $package_description ]
    
                );
                $_SESSION['msg'] = 1;
                return $this->redirect('../admin-packages/index');
            }
           


        }else{

            return $this->redirect('../home/index');

        }

    }
}