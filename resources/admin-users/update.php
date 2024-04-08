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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Package Update</h1>
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
                if(isset($_SESSION['msg'])){
                    if ($_SESSION['msg'] == 1) {
                        $content .= '<div class="alert alert-success">Update Successful!</div>';
                    }elseif ($_SESSION['msg'] == 2) {
                        $content .= '<div class="alert alert-warning">No changes were made.</div>';
                    }elseif ($_SESSION['msg'] == 3) {
                        $content .= '<div class="alert alert-danger">Passwords Do Not Match.</div>';
                    }
                    $_SESSION['msg'] = null;
                }

                
            $content .= '<form action="update_submit" method="post">
				<div class="row g-3">
				
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" class="form-control bg-white text-dark" id="firstname" name="firstname" value="'.$user[0]->firstname.'" >
                            <label for="firstname">First Name</label>
                        </div>
					</div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" class="form-control bg-white text-dark" id="lastname" name="lastname" value="'.$user[0]->lastname.'">
                            <label for="lastname">Last Name</label>
                        </div>
					</div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" class="form-control bg-white text-dark" id="email" name="email" value="'.$user[0]->email.'">
                            <label for="email">Email</label>
                        </div>
					</div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control bg-white text-dark" id="phonenumber" name="phonenumber" value="'.$user[0]->phonenumber.'">
                            <label for="phonenumber">Phone Number</label>
                        </div>
					</div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select bg-white text-dark" id="role" name="role">';
                            if ($user[0]->role_id == 3) {

                                $content .= '<option selected value="3">User</option>';
                                $content .= '<option value="1">Admin</option>';
                                
                            }else{
                                
                                $content .= '<option value="3">User</option>';
                                $content .= '<option selected value="1">Admin</option>';

                            }
                                
                            $content .= '</select>
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
                            <textarea class="form-control text-dark" placeholder="Address" id="address" name="address" style="height: 100px">'.$user[0]->address.'</textarea>
                            <label for="address">Address</label>
                        </div>
                    </div>
                    <input type="hidden" name="id" value='.$user[0]->user_id.'>
                    

                    <div class="col-9">
						<button class="btn btn-secondary w-100 py-3" type="submit">Update</button>
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