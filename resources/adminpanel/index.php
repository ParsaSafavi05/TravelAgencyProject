<?php
use App\Models\DB;

session_start();
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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Admin Panel</h1>
                </div>
            </div>
        </div>
        </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- main -->
        <div class="main-w3layouts wrapper">
        <div class="main-agileinfo">
        <div class="agileits-top">
        ';
    }
    else{

       return $this->redirect('../home/index');
                        
    }            



$this->adminlayout($content);
?>