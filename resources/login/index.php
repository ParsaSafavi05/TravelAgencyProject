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


	<div class="container-xxl py-5">
    <div class="container">
    <div class="row g-4">
        <div class="col-lg-4"></div>
            <div class="col-lg-4 justify-content-center col-md-12 wow fadeInUp" data-wow-delay="0.5s">


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

				$content .= '
				<form action="validate" method="post">
				<div class="row g-3">
					
					<div class="col-md-12">
						<div class="form-floating">
							<input type="text" class="form-control text-dark" id="email" name="email">
							<label for="email">Email Address</label>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-floating">
							<input type="password" class="form-control text-dark" id="password" name="password">
							<label for="password">Password</label>
						</div>
					</div>
					<div class="col-12">
					<p class="text-center">Don'."'".'t have an account? Click <a class="text-green " href="../login/index">here</a></p>
						<button class="btn btn-primary w-100 py-3" type="submit">Login</button>
					</div>
					</div>
				</form>
			</div>
			</div>
			</div>
		</div>
		</div>
		</div>

		
	</div>
	<!-- //main -->
';



$this->layout($content);