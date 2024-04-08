<?php
use App\Http\BaseController;
use App\Models\DB;
use App\Http\Request;
class AdminimagesController extends BaseController{
    public function index()
    {   
        session_start();
        if (isset($_SESSION['isAdmin'])) {
            $images = DB::table('images')
            ->get();
            $images = json_decode($images);
            return $this->view('admin-images/index',['images' => $images]);
        }else{
            return $this->redirect('../home/index');
        }
        
    }
    
    public function upload()
    {
        session_start();
        if (isset($_SESSION['isAdmin'])) {
            
            $image_url = Request::getFile('image_url');
            if (!empty($image_url)) {
                if(!file_exists($image_url['name'])){
                    $uploadDir = '../public/img/';
                    move_uploaded_file($image_url['tmp_name'], $uploadDir . $image_url['name']);
                    DB::table('images')->create(
                        ['image_name', 'image_url'],
                        [$image_url['name'], '../../public/img/' . $image_url['name']]
        
                    );
                    return $this->redirect('index');
                }else{
                    
                    return $this->redirect('index');
                }
                }

        }else{
            
            return $this->redirect('../home/index');

        }
    }
    
}