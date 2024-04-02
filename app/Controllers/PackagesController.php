<?php
use App\Http\BaseController;
use App\Models\DB;


class PackagesController extends BaseController{
    public function index()
    {


        $packages = DB::table('packages')
        ->select('packages.packages_id, packages.package_name, packages.package_price, 
        packages.number_of_people, packages.package_length, packages.package_description, 
        destinations.destination_name, hotels.hotel_rating, hotels.hotel_name, packages.image_url, destinations.destination_country, destinations.destination_city')
        ->join('destinations','packages.destination_id','destinations.destination_id')
        ->join('hotels','packages.hotel_id','hotels.hotel_id')
        ->get();

        return $this->view('packages/index', ['packages' => $packages]);
    }

    public function readmore()
    {
        return $this->view('packages/readmore',['']);
    }
}