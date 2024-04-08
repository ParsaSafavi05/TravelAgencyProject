<?php
use App\Models\DB;

    if (isset($_SESSION['isAdmin']) && !empty($_SESSION['isAdmin'])) {
                        
    $userinfo = DB::table('users')
    ->where('user_id','=',$_SESSION['isAdmin'])
    ->get();
    $userinfoArray = json_decode($userinfo, true);

    $firstname = $userinfoArray[0]['firstname'];
    $lastname = $userinfoArray[0]['lastname'];
                    
    $content = '<a href="../adminpanel/info" class="btn btn-primary rounded-pill py-2 px-4">'.$firstname.' '.$lastname.'</a>';

    
          

$content .= '
</div>
</nav>
';
// Navbar Start
    $content .= '
    
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Images</h1>
            </div>
        </div>
    </div>
    </div>
    </div>

	<!-- main -->
	<div class="main-w3layouts wrapper">
    <div class="main-agileinfo">
    <div class="agileits-top">

    <div class="container-xxl py-5">
        <div class="container">

            <div class="row g-4 justify-content-left">
                <form action="upload" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="file" class="form-control bg-white text-dark" id="image_url" name="image_url">
                        </div>
                    </div>
                    <div class="col-md-4">
						<button class="btn btn-primary w-100 py-3" type="submit">Upload</button>
					</div>
                </form>
                
                    
            
            ';
            

            foreach ($images as $image) {
                $content .= '
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="'.$image->image_url.'" alt="">
                        </div>
                            <div class="text-center p-4">
                            <h3 class="mb-0">'.$image->image_name.'</h3>
                            <div class="mb-3">';

                            $content .= '</div>
                        </div>
                    </div>
                </div>
            ';
            }
            $content .= '
                </div>
            </div>
        </div>';
        $this->adminlayout($content);

}else{

    return $this->redirect('../home/index');

}
            





?>