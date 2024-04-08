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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Destinations Insert</h1>
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
                    if ($_SESSION['msg'] === 1) {
                        $content .= '<div class="alert alert-success">Insert Successful!</div>';
                    }elseif ($_SESSION['msg'] === 2) {
                        $content .= '<div class="alert alert-danger">Something went wrong.</div>';
                    }
                   $_SESSION['msg'] = null;
                }
            $content .= '<form action="insert_submit" method="post" enctype="multipart/form-data">
				<div class="row g-3">
				
                    
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control bg-white text-dark" placeholder="Destination Name" id="destination_name" name="destination_name">
                            <label for="destination_name">Destination Name</label>
                        </div>
					</div>

                 
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select bg-white text-dark" id="country" name="country">';    
                            foreach ($countries as $country) {
                                $content .= '<option value="'.$country->country_id.'">'.$country->country_name.'</option>';
                            }
                            $content .= '</select>
                            <label for="country">country</label>
                        </div>
					</div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select bg-white text-dark" id="city" name="city">';    
                            foreach ($cities as $city) {
                                $content .= '<option value="'.$city->city_id.'">'.$city->city_name.', '.$city->country_name.'</option>';
                            }
                            $content .= '</select>
                            <label for="city">city</label>
                        </div>
					</div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="file" class="form-control bg-white text-dark" id="image_url" name="image_url">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-floating">
                            <textarea class="form-control text-dark" placeholder="Description" id="description" name="description" style="height: 100px"></textarea>
                            <label for="description">Destination Description</label>
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