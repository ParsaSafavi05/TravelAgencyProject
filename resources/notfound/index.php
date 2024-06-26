<?php

if (isset($_SESSION['UserLoggedIn']) && !empty($_SESSION['UserLoggedIn'])) {
                        
    
                    
    $content = '<a href="../user/info" class="btn btn-primary rounded-pill py-2 px-4">'.$userinfo[0]->firstname.' '.$userinfo[0]->lastname.'</a>';

    }elseif(isset($_SESSION['isAdmin']) && !empty($_SESSION['isAdmin'])){

        $content = '<a href="../adminpanel/index" class="btn btn-primary rounded-pill py-2 px-4">'.$userinfo[0]->firstname.' '.$userinfo[0]->lastname.'</a>';
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
                <h1 class="mb-4">Page Not Found</h1>
                <p class="mb-4">We’re sorry, the page you have looked for does not exist in our website! Maybe go to our home page or try to use a search?</p>';
                if (isset($_SESSION['isAdmin'])) {
                    $content .= '<a class="btn btn-primary rounded-pill py-3 px-5" href="../adminpanel/index">Go Back To Dashboard</a>';
                }else{
                    $content .= '<a class="btn btn-primary rounded-pill py-3 px-5" href="../home/index">Go Back To Home</a>';

                }
            $content .= '</div>
        </div>
    </div>
</div>

    ';

if (isset($_SESSION['isAdmin'])) {
    $this->adminlayout($content);
}else{

    $this->layout($content);
}
?>