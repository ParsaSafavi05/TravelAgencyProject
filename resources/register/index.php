<?php
use App\Models\DB;

session_start();
if (isset($_SESSION['UserLoggedIn']) && !empty($_SESSION['UserLoggedIn'])) {
   
    return $this->redirect('../home/index','');

    }
    else{


        
$content = '
<a href="../register/index" class="btn btn-primary rounded-pill py-2 px-4">Register</a>

<body>          
</div>
</nav>
<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Regsiter now</h1>
            </div>
        </div>
    </div>
    </div>
    </div>

	<!-- main -->
	<div class="main-w3layouts wrapper">
    <div class="main-agileinfo">
    <div class="agileits-top">
    ';



              
$content .='




<div class="container-xxl py-5">
    <div class="container">
    <div class="row g-4">
        <div class="col-lg-3"></div>
            <div class="col-lg-6 justify-content-center col-md-12 wow fadeInUp" data-wow-delay="0.5s">';


            if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])){
                if($_SESSION['msg'] === '1'){
                    $content .= "<div class='alert alert-success'>Signup Successfull!!<p id='counter'></p></div>";
                    $content .= "<script>
            
                    const counterElement = document.getElementById('counter');
            
                    let count = 5;
            
                    function updateCounter() {
                    // Display the current count in the paragraph
                    counterElement.textContent = 'Redirecting in ' + count;
                
                    count--;
            
                if (count < 0) {
                    clearInterval(interval); // Stop the countdown
                    counterElement.textContent = '';
                }
            }
            
            const interval = setInterval(updateCounter, 1000);
            
            
                    </script>";
            
                }else{
                $msg = $_SESSION['msg'];
                $content .= "<div class='alert alert-danger'>$msg</div>";
                }
            }
              $content .='
              <form action="adduser" method="post">
                    <div class="row g-3">
                        
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control text-dark" id="firstname" name="firstname">
                                <label for="firstname">First Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control text-dark" id="lastname" name="lastname">
                                <label for="lastname">Last Name</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control text-dark" id="email" name="email">
                                <label for="email">Email Address</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control text-dark" id="phonenumber"  name="phonenumber">
                                <label for="phonenumber">Phone Number</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control text-dark" id="password" name="password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control text-dark" id="confirm_password" name="confirm_password">
                                <label for="confirm_password">Repeat Password</label>
                            </div>
                        </div>
                        <div class="col-12">
                        <p class="text-center">Already have an account? Click <a class="text-green " href="../login/index">here</a></p>
                            <button class="btn btn-primary w-100 py-3" type="submit">Register</button>
                        </div>
                        </div>
                    </form>
                </div>
                </div>
			</div>
		</div>
	</div>
';
if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])){
if($_SESSION['msg'] === 'Signup Successfull!!'){

    $content .= '<script>
    setTimeout(function() {
        window.location.href = "../login/index";
    }, 5100); 
    </script>';
    
}
}

session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
$this->layout($content);
    }