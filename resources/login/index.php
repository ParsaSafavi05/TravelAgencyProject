<?php
use App\Models\DB;

session_start();
if (isset($_SESSION['UserLoggedIn']) && !empty($_SESSION['UserLoggedIn'])) {

    return $this->redirect('../home/index','');


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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Login now</h1>
            </div>
        </div>
    </div>
    </div>
    </div>

<head>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../../public/css/registerStyle.css" rel="stylesheet">
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<div class="agileits-top">';
				if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
					if ($_SESSION['msg'] == '1') {
						$content .= "<div class='alert alert-danger'>Wrong Email Or Password</div>";
					}
				}
				session_unset();
				session_destroy();

				$content .= '<form action="validate" method="post">
					<input class="text email" type="email" name="email" placeholder="Email Address" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input type="submit" value="Login">
                    <p>Dont have an account? Click <a class="text-green" href="../register/index">here</a></p>
                    </form>
			</div>
		</div>
		<!-- copyright -->
		
		<!-- //copyright -->
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
	<!-- //main -->
';



$this->layout($content);