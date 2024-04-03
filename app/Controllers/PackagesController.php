<?php
use App\Http\BaseController;
use App\Models\DB;
use App\Http\Request;



class PackagesController extends BaseController{
    public function index()
    {
        $countries = DB::table('countries')
        ->where('countries.active','=','1')
        ->get();
        
        
        return $this->view('packages/index',[
            'countries' => $countries,
        ]);
        
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
}