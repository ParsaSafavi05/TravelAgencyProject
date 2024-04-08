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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Coutnries</h1>
                </div>
            </div>
        </div>
        </div>
        </div>
    
        <!-- main -->
        <div class="main-w3layouts wrapper">
        <div class="main-agileinfo">
        <div class="agileits-top">
        
        </table>
<div class="container justify-content-center">
        <table class="table table-bordered">
          <thead class="thead-light text-light bg-primary">
            <tr>
              <th></th>
              <th>Country Name</th>
              <th>Country Status</th>
            </tr>
          </thead>
          <tbody>';

            foreach ($countries as $country) {
                $content .= '
                <tr>
                  
                  <td style="width:10px"><a class="btn btn-outline-secondary rounded-circle" href="update?id='.$country->country_id.'"><i class="fa-solid fa-pen-to-square"></i></a></td>
                  <td>'.$country->country_name.'</td>';
                  if ($country->active == 1) {

                    $content .='<td><a class="btn btn-outline-primary disabled><i class="fa-solid fa-pen-to-square">Active</i></a></td>';

                  }else{

                    $content .='<td><a class="btn btn-outline-secondary disabled><i class="fa-solid fa-pen-to-square">Inactive</i></a></td>';

                  }
                    
                $content .= '</tr>
                
                ';
            }
           


          $content .= '
          
          </tbody>
          </table>
          <a class="btn btn-primary rounded-pill py-2 px-3" href="insert">Insert New</a>
          </div>
        ';






    }
    else{

       return $this->redirect('../home/index');
                        
    }            



$this->adminlayout($content);
?>