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
                <h1 class="mb-5">Choose The Country</h1>
            </div>';
            $content .= '<div class="row g-4 justify-content-left">';

            foreach (json_decode($data['countries']) as $country) {
                $content .= '
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div id="'.$country->country_id.'" class="package-item">
                            <div class="text-center p-4">
                            <a href="country?id='.$country->country_id.'" class="btn btn-primary rounded-pill py-2 px-4">'.$country->country_name.' Packages</a>

                            <div>';

                            //star rating
                            // $counter = 1;
                            // $stars = $package->hotel_rating;
                            // while ($counter <= 5) {
                            //     if($stars < $counter){

                            //         $content.='<small class="fa fa-regular fa-star text-primary"></small>';

                            //     }else{

                            //         $content.='<small class="fa fa-solid fa-star text-primary"></small>';

                            //     }
                            //     $counter++;
                            // }

                            $content .= '</div>
                        </div>
                    </div>
                </div>
            ';
            }
            $content .= '
                </div>
            </div>
        </div>
        
        
        
        ';
    // Navbar End


$this->layout($content);
?>