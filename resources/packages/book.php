<?php
use App\Models\DB;

    $package = json_decode($data['packages']) ;


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
';
// Navbar Start
if (!empty($package)) {
    $content .= '
    <head>
    <link href="dist/the-datepicker.css" rel="stylesheet" />
    <script src="dist/the-datepicker.js"></script>
    
    </head>
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">'.$package[0]->package_name.' Package</h1>
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
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Packages</h6>
                <h1 class="mb-5">'.$package[0]->package_name.' Package</h1>
            </div>';
            $content .= '<div class="row g-4 justify-content-center">';

                $content .= '
                
            
                <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="container">
                    <div class="booking p-5">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="package-item bg-light opacity-25">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="'.$package[0]->image_url.'" alt="">
                                </div>
                                <div class="d-flex border-bottom">
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>'.$package[0]->city_name.', '.$package[0]->country_name.'</small>
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>'.$package[0]->package_length.' days</small>
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-hotel text-primary me-2"></i>'.$package[0]->hotel_name.'</small>
                                </div>
                                <div class="d-flex border-bottom">
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-user text-primary me-2"></i>'.$package[0]->spots_remaining.' left</small>
                                    <small class="flex-fill text-center py-2"><i class="fa fa-star text-primary me-2"></i>'.$package[0]->hotel_rating.'</small>
                                </div>
                                    <div class="text-center p-4">
                                    <h3 class="mb-0">'.$package[0]->package_price.'</h3>
                                    <div class="mb-3">';
        
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
                                    <p>'.$package[0]->package_description.'</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h1 class="text-white mb-4">Book A Tour</h1>';
                            

                            $content .= '<form action="book_validate">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="number" class="form-control bg-transparent text-light" id="numberofpassengers" name="numberofpassengers" placeholder="Your Name" value="1" min="1" max="'.$package[0]->spots_remaining.'">
                                            <label for="numberofpassengers">Number Of Passangers</label>
                                        </div>
                                    </div>

        
                                            <input type="hidden" name="package_id" value="'.$package[0]->package_id.'">
                                      
                                            <div class="col-md-2">
                                            <div class="form-floating">
                                                <select class="form-select bg-light text-dark" id="month" name="month">
                                                    <option value="01">Jan</option>
                                                    <option value="02">Feb</option>
                                                    <option value="03">Mar</option>
                                                    <option value="04">Apr</option>
                                                    <option value="05">May</option>
                                                    <option value="06">Jun</option>
                                                    <option value="07">Jul</option>
                                                    <option value="08">Aug</option>
                                                    <option value="09">Sept</option>
                                                    <option value="10">Oct</option>
                                                    <option value="11">Nov</option>
                                                    <option value="12">Dec</option>
                                                </select>
                                            <label for="month">Month</label>
                                            </div>
                                        </div>

                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <input type="number" class="form-control bg-light text-dark" id="day" name="day" value="1" min="1" max="31">
                                            <label for="day">Day</label>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <select class="form-select bg-light text-dark" id="year" name="year">
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                            </select>
                                        <label for="year">Year</label>
                                        </div>
                                    </div>
                                   
                                    <div class="col-12">
                                        <button class="btn btn-outline-light w-100 py-3" type="submit">Add To Cart</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
                ';
            
            $content .= '
                </div>
            </div>
        </div>';
}else{
    $content .= ' 
    
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Not Found</h1>
            </div>
        </div>
    </div>
    </div>
    </div>

	<!-- main -->
	<div class="main-w3layouts wrapper">
    <div class="main-agileinfo">
    <div class="agileits-top">
    
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                <h1 class="mb-4">Package Not Found</h1>
                <p class="mb-4">We’re sorry, the package for the country you have looked for does not exist in our website! Maybe go to our home page or try to use a search?</p>
                <a class="btn btn-primary rounded-pill py-3 px-5" href="index">Go Back To Packages</a>
            </div>
        </div>
    </div>
</div>
';
}
            




$this->layout($content);
?>