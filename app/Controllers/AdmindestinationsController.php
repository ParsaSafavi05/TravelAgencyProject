<?php
use App\Http\BaseController;
use App\Models\DB;
use App\Http\Request;
class AdmindestinationsController extends BaseController{
    public function index()
    {   
        session_start();
        if (isset($_SESSION['isAdmin'])) {
        $destinations = DB::table('destinations')
        ->join('countries','destinations.country_id','countries.country_id')
        ->join('cities','destinations.city_id','cities.city_id')
        ->get();

        $destinations = json_decode($destinations);

        return $this->view('admin-destinations/index', ['destinations' => $destinations]);
        }else{
            return $this->redirect('../home/index');
        }
       
    }

    public function insert()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {

            $countries = DB::table('countries')->get();
            $countries = json_decode($countries);

            $cities = DB::table('cities')->join('countries','cities.country_id','countries.country_id')
            ->get();
            $cities = json_decode($cities);

            return $this->view('admin-destinations/insert', [
                'countries' => $countries,
                'cities' => $cities
            ]);

        }else{

            return $this->redirect('../home/index');

        }
    }

    public function insert_submit()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {

            $destination_name = Request::getParam('destination_name');
            $country = Request::getParam('country');
            $city = Request::getParam('country');
            $description = Request::getParam('description');
            $image_url = Request::getFile('image_url');
            if (!empty($destination_name) && !empty($country) &&
                !empty($city) && !empty($image_url) && !empty($description)) {
                    if (!empty($image_url)) {
                        if(file_exists($image_url['name'])){
                            $uploadDir = '../public/img/';
                            move_uploaded_file($image_url['tmp_name'], $uploadDir . $image_url['name']);
                        }
                        
                        DB::table('destinations')->create(
                            ['destination_name', 'country_id' ,'city_id' ,'image_url','destination_description'],
                            [$destination_name, $country, $city, '../../public/img/'.$image_url['name'],$description]
            
                        );
                        $_SESSION['msg'] = 1;
                            return $this->redirect('admin-countries/insert');
                        }else{
                        
                        $_SESSION['msg'] = 2;
                            return $this->redirect('admin-countries/insert');
                        }
                    }else{
                        DB::table('destinations')->create(
                            ['destination_name', 'country_id' ,'city_id' ,'image_url','destination_description'],
                            [$destination_name, $country, $city, '../../public/img/package-1',$description]
            
                        );
                        $_SESSION['msg'] = 1;
                        return $this->redirect('insert');
                    }
                   
           


            }else{

                return $this->redirect('../home/index');

            }

    }

    public function update()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {

            $destination_id = Request::getParam('id');

            $destinations = DB::table('destinations')
            ->join('countries','destinations.country_id','countries.country_id')
            ->join('cities','destinations.city_id','cities.city_id')
            ->where('destination_id','=',$destination_id)
            ->get();

            $destination = json_decode($destinations);

            $images = DB::table('images')
            ->where('image_url','!=',$destination[0]->image_url)
            ->get();
            $images = json_decode($images);
            
            $countries = DB::table('countries')
            ->where('country_id','!=', $destination_id)
            ->get();
            $countries = json_decode($countries);

            $cities = DB::table('cities')
            ->join('countries','cities.country_id', 'countries.country_id')
            ->where('city_id','!=', $destination[0]->city_id)
            ->get();
            $cities = json_decode($cities);

            $destimg = DB::table('images')
            ->where('image_url','=',$destination[0]->image_url)
            ->get();
            $destimg = json_decode($destimg);

            return $this->view('admin-destinations/update',[
                'destination' => $destination ,
                'images' => $images,
                'countries' => $countries,
                'destimg' => $destimg,
                'cities' => $cities
            ]);

        }else{

            return $this->redirect('../home/index');

        }
    }

    public function update_submit()
    {

      
        session_start();
        if (isset($_SESSION['isAdmin'])) {
            if (!empty(Request::getParam('destination_name')) || !empty(Request::getParam('image')) || !empty(Request::getParam('country'))|| 
                !empty(Request::getParam('city')) || !empty(Request::getParam('description'))) {

                $destination_id = Request::getParam('id');
                $destination_name = Request::getParam('destination_name');
                $image = Request::getParam('image');
                $country = Request::getParam('country');
                $city = Request::getParam('city');
                $description = Request::getParam('description');
                
                $datatoupdate = [];

                $datatoupdate['destination_id'] = $destination_id;
                if (!empty(Request::getParam('destination_name'))) {
                    $datatoupdate['destination_name'] = $destination_name;
                }

                if (!empty(Request::getParam('image'))) {
                    $image_url = DB::table('images')
                    ->select('image_url')
                    ->where('image_id','=',$image)
                    ->get();
                    $image_url = json_decode($image_url);
                    $datatoupdate['image_url'] = $image_url[0]->image_url;
                }

                if (!empty(Request::getParam('country'))) {
                    $datatoupdate['country_id'] = $country;
                }

                if (!empty(Request::getParam('city'))) {
                    $datatoupdate['city_id'] = $city;
                }

                if (!empty(Request::getParam('description'))) {
                    $datatoupdate['destination_description'] = $description;
                }

                $updateresult = DB::table('destinations')->update($datatoupdate, 'destination_id');

                if ($updateresult) {
                $_SESSION['msg'] = '1';  
                }else{
                    $_SESSION['msg'] = '2';
                }

                return $this->redirect('update?id='.$destination_id);
        }
        }else{
        return $this->redirect('../home/index');
        }
    }

   
}