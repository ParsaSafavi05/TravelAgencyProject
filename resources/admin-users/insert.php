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
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Users Insert</h1>
                </div>
            </div>
        </div>
        </div>
        </div>
        <div class="container-xxl py-5">
        <div class="container">
        <div class="row g-4">
            <div class="col-lg-2"></div>
                <div class="col-lg-8 justify-content-center col-md-12 wow fadeInUp" data-wow-delay="0.5s">
    
        <!-- main -->
        <div class="main-w3layouts wrapper">
            <div class="main-agileinfo">
                <div class="agileits-top">';
                if(!empty($_SESSION['msg'])){
                    if ($_SESSION['msg'] == '1') {
                        $content .= '<div class="alert alert-success">Insert Successful!</div>';
                    }
                    elseif ($_SESSION['msg'] == '2') {

                        $content .= '<div class="alert alert-danger">Fill In All The fields.</div>';

                    }
                    elseif ($_SESSION['msg'] == '3') {

                        $content .= '<div class="alert alert-danger">Passwords Do Not Match.</div>';

                    }
                    }elseif ($_SESSION['msg'] == '4') {

                        $content .= '<div class="alert alert-danger">Email Already In Use.</div>';

                    }
                   $_SESSION['msg'] = null;
                
            
            $content .= '
            <form action="insert_submit" method="post">
				<div class="row g-3">
				
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" class="form-control bg-white text-dark" placeholder="First Name" id="firstname" name="firstname">
                            <label for="firstname">First Name</label>
                        </div>
					</div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" class="form-control bg-white text-dark" placeholder="Last Name" id="lastname" name="lastname">
                            <label for="lastname">Last Name</label>
                        </div>
					</div>
                   
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control bg-white text-dark" placeholder="Email" id="email" name="email">
                            <label for="email">Email</label>
                        </div>
					</div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control bg-white text-dark" placeholder="Phone Number" id="phonenumber" name="phonenumber">
                            <label for="phonenumber">Phone Number</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select bg-white text-dark" id="role" name="role">
                            <option selected value="3">User</option>
                            <option value="1">Admin</option>
                            </select>
                            <label for="role">Role</label>
                        </div>
					</div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control bg-white text-dark" placeholder="Password" id="password" name="password">
                            <label for="password">Password</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control bg-white text-dark" placeholder="Repeat Password" id="repeatpassword" name="repeatpassword">
                            <label for="repeatpassword">Repeat Password</label>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-floating">
                            <textarea class="form-control text-dark" placeholder="Address" id="address" name="address" style="height: 100px"></textarea>
                            <label for="address">Address</label>
                        </div>
					</div>

                    <div class="col-9">
						<button class="btn btn-primary w-100 py-3" type="submit">Insert</button>
					</div>
                    
                    <div class="col-3">
                        <a href="index" class="btn btn-info text-white w-100 py-3" type="index">Back</a>
                    </div>

                    <div class="col-6"></div>
					</div>
				</form>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
        
        
        
        ';
    }
    else{

       return $this->redirect('../home/index');
                        
    }            



$this->adminlayout($content);
?>