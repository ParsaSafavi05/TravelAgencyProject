<?php
use App\Models\DB;

session_start();
if (isset($_SESSION['UserLoggedIn']) && !empty($_SESSION['UserLoggedIn'])) {
   
    return $this->redirect('../home/index','');

    }
    else{


        
$content = '

<link href="../../public/css/registerStyle.css" rel="stylesheet">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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


if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])){
    if($_SESSION['msg'] === 'Signup Successfull!!'){
        $content .= "<div class='alert alert-success'>Signup Successfull!!</div>";
        $content .= "<p id='counter'></p>";
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

				<form action="addUser" method="post">
					<input class="text" type="text" name="firstname" placeholder="Firstname" required="">
					<input class="text" type="text" name="lastname" placeholder="lastname" required="">
					<input class="text email" type="email" name="email" placeholder="Email Address" required="">
					<input class="text email" type="text" name="phonenumber" placeholder="Phone Number" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input class="text" type="password" name="confirm_password" placeholder="Repeat Password" required="">
					<input type="submit" value="Register">
                 <p>Already have an account? Click <a class="text-green" href="../login/index">here</a></p>
				</form>
			</div>
		</div>
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
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