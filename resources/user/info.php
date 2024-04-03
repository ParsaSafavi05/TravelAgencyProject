<?php
use App\Models\DB;
$i = "'";
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


        return $this->redirect('../login/index','');

    }            

$content .= '
</div>
</nav>
<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">'.$firstname.' '.$lastname.$i.'s Profile</h1>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="container-xxl py-5">
    <div class="container">
        

        <div class="row g-4">
            <div class="col-lg-3"></div>
                <div class="col-lg-6 justify-content-center col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <form action="update" method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control text-dark" id="email" disabled value="'.$user[0]->email.'">
                                <label for="email">Email Address</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control text-dark" id="phonenumber" disabled value="'.$user[0]->phonenumber.'">
                                <label for="phonenumber">Phone Number</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Your address goes here" id="address" name="address" value="'.$user[0]->address.'" style="height: 100px"></textarea>
                                <label for="address">Address</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="newPassword" name="newPassword">
                                <label for="newPassword">New Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="repeatPassword" name="repeatPassword">
                                <label for="repeatPassword">Repeat Password</label>
                            </div>
                        </div>
                        <div class="col-10">
                            <button class="btn btn-primary w-100 py-3" type="submit">Update</button>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-danger w-100 py-3" type="submit">logout</button>
                        </div>
                    </div>
                </form>
                </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</div>
	<!-- main -->
	<div class="main-w3layouts wrapper">
    <div class="main-agileinfo">
    <div class="agileits-top">
    <a href="logout">logout</a>
    ';


$this->layout($content);
?>