<?php
use App\Models\DB;

session_start();
if (isset($_SESSION['UserLoggedIn']) && !empty($_SESSION['UserLoggedIn'])) {
                        
    $userinfo = DB::table('users')
    ->where('user_id','=',$_SESSION['UserLoggedIn'])
    ->get();
    $userinfoArray = json_decode($userinfo, true);

    $firstname = $userinfoArray[0]['firstname'];
    $lastname = $userinfoArray[0]['lastname'];
                    
    $content = '<a href="../user/info" class="btn btn-primary rounded-pill py-2 px-4">'.$firstname.' '.$lastname.'</a>';

    }
    else{

        $content = '<a href="../register/index" class="btn btn-primary rounded-pill py-2 px-4">Register</a>';
                        
    }            

$content .= '
</div>
</nav>

<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Packages</h1>
            </div>
        </div>
    </div>
    </div>
    </div>

	<!-- main -->
	<div class="main-w3layouts wrapper">
    <div class="main-agileinfo">
    <div class="agileits-top">';
// Navbar Start
$content .= '<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Packages</h6>
                <h1 class="mb-5">Awesome Packages</h1>
            </div>';
            $content .= '<div class="row g-4 justify-content-center">';

            foreach (json_decode($data['packages']) as $package) {
                $content .= '
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="'.$package->image_url.'" alt="">
                        </div>
                        <div class="d-flex border-bottom">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>'.$package->destination_city.', '.$package->destination_country.'</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>'.$package->package_length.' days</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user text-primary me-2"></i>'.$package->number_of_people.' poeple</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-hotel text-primary me-2"></i>'.$package->hotel_name.'</small>
                        </div>
                        <div class="text-center p-4">
                            <h3 class="mb-0">'.$package->package_price.'</h3>
                            <div class="mb-3">';
                            $counter = 1;
                            $stars = $package->hotel_rating;
                            while ($counter <= 5) {
                                if($stars < $counter){

                                    $content.='<small class="fa fa-regular fa-star text-primary"></small>';

                                }else{

                                    $content.='<small class="fa fa-solid fa-star text-primary"></small>';

                                }
                                $counter++;
                            }
                            $content .= '</div>
                            <p>'.$package->package_description.'</p>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="#" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                <a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>


                
            ';
            }
            $content .= '
                </div>
            </div>
        </div>';
    // Navbar End


$this->layout($content);
?>