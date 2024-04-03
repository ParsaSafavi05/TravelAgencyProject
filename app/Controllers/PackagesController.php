<?php
use App\Http\BaseController;
use App\Models\DB;
use App\Http\Request;



class PackagesController extends BaseController{
    public function index()
    {
        $countries = DB::table('countries')
        ->get();
        
        
        return $this->view('packages/index',[
            'countries' => $countries,
        ]);
        
    }

    public function country()
    {
        $country_id = Request::getParam('id');
        $packages = DB::table('packages')
        // ->select('packages.packages_id, packages.package_name, packages.package_price, 
        // packages.spots_remaining, packages.package_length, packages.package_description, 
        // destinations.destination_name, hotels.hotel_rating, hotels.hotel_name, destinations.image_url,
        //  country.country_name')
        ->join('destinations','packages.destination_id','destinations.destination_id')
        ->join('hotels','packages.hotel_id','hotels.hotel_id')
        ->join('countries','destinations.country_id','countries.country_id')
        ->join('cities','destinations.city_id','cities.city_id')
        ->where('countries.country_id','=',$country_id)
        ->get();
        return $this->view('packages/country', ['packages' => $packages]);

    }
}