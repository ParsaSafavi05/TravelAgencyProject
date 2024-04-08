<?php
use App\Models\DB;

if (isset($_SESSION['isAdmin']) && !empty($_SESSION['isAdmin'])) {
                        
    $userinfo = DB::table('users')
    ->where('user_id','=',$_SESSION['isAdmin'])
    ->get();
    $userinfoArray = json_decode($userinfo, true);

    $firstname = $userinfoArray[0]['firstname'];
    $lastname = $userinfoArray[0]['lastname'];
                    
    $content = '<a href="info" class="btn btn-primary rounded-pill py-2 px-4">'.$firstname.' '.$lastname.'</a>';

    $content .= '
    </div>
    </nav>
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Countries Update</h1>
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
                    if ($_SESSION['msg'] === '1') {
                        $content .= '<div class="alert alert-success">Update Successful!</div>';
                    }elseif ($_SESSION['msg'] === '2') {
                        $content .= '<div class="alert alert-warning">No changes were made.</div>';
                    }
                   $_SESSION['msg'] = null;
                }
            $content .= '
            <form action="update_submit" method="post">
				<div class="row g-3">
				
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control bg-white text-dark" placeholder="Country Name" id="country_name" name="country_name" value="'.$country[0]->country_name.'">
                            <label for="country_name">Country Name</label>
                        </div>
					</div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select bg-white text-dark" id="active" name="active">
                            ';
                                if ($country[0]->active == '0') {
                                    $content .= '<option value="1">Active</option>
                                                 <option selected value="0">Inactive</option>';
                                }else{
                                    $content .= '<option selected value="1">Active</option>
                                                 <option value="0">Inactive</option>';
                                }
                            $content .= '</select>
                            <label for="city">city</label>
                        </div>
					</div>

                    
                    <input type="hidden" name="id" value="'.$country[0]->country_id.'">     
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