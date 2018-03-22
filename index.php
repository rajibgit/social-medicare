<?php	
require_once("includes/initialize.php");	
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="author">
  <link href="#" rel="shortcut icon">

  <title>saibah</title><!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet"><!-- Custom styles for this template -->
  <link href="jumbotron.css" rel="stylesheet">
  <script type="text/javascript" src="js/registrationformValidation.js"> </script>


?>  
</head>
<?php
if (isset($_POST['btnlogin'])) {
    //form has been submitted1
    
    $email = trim($_POST['log_email']);
    $upass = trim($_POST['log_pword']);
    
    $h_upass = sha1($upass);
    //check if the email and password is equal to nothing or null then it will show message box
    if ($email == '') {
?>    <script type="text/javascript">
                alert("fill the Username !");
                </script>
            <?php
        
    } elseif ($upass == '') {
?>    <script type="text/javascript">
                alert("fill the Password !");
                </script>
            <?php
    } else {
		//it creates a new objects of member
        $member = new member();
		//make use of the static function, and we passed to parameters
		$res = $member::AuthenticateMember($email, $h_upass);
		//then it check if the function return to true
		if($res == true){
			?>   <script type="text/javascript">
					//then it will be redirected to home.php
					window.location = "home.php";
				</script>
			<?php
		
		
		} else {
?>    <script type="text/javascript">
                alert("Username or Password Not Registered ! ");
                window.location = "home.php";
                </script>
        <?php
        }
        
    }
} else {
    
    $email = "";
    $upass = "";
    
}

?>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type=
        "button"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class=
        "icon-bar"></span></button> <a class="navbar-brand" href="#" style=
        "font-weight: bold">Saibah Medicare</a>
      </div>

      <div class="navbar-collapse collapse">
        <form class="navbar-form navbar-right" method="POST" action="index.php">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control" name="log_email">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="log_pword">
            </div>
            <button type="submit" class="btn btn-success" name="btnlogin">Sign in</button>
        </form>
      </div><!--/.navbar-collapse -->
    </div>
  </div><!-- Main jumbotron for a primary marketing message or call to action -->
  

 <br>



<div class="col-xs-6" >
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="contents/img/doctor.jpg" alt="Chani" width="290" height="500">
        <div class="carousel-caption">
          
        </div>
      </div>

      <div class="item">
        <img src="contents/img/b.jpg" alt="Chania" width="420" height="900">
        <div class="carousel-caption">
          
        </div>
      </div>
    
      <div class="item">
        <img src="contents/img/food.jpg" alt="Flower" width="900" height="1000">
        <div class="carousel-caption">
          
        </div>
      </div>

      <div class="item">
        <img src="contents/img/c.jpg" alt="Flower" width="330" height="800">
        <div class="carousel-caption">
          
        </div>
      </div>
  
    </div>
<div class="col-xs-6">
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
  </div>
</div> 

        <div class="col-xs-6">
    <!--action="register.php"  onsubmit="return checkRegistration();"-->
          <form  action="register.php" class="form-horizontal" id="register" method="post" onSubmit="return checkRegistration();" >
            <fieldset>

              <legend>Sign Up</legend>

              <h4>It’s free and always will be.</h4>

              <div class="rows">
                <div class="col-xs-12">
                  <div class="form-group">
                    <div class="rows">
                      <div class="col-md-12">
                        <div class="col-lg-6" id="divfname">
                          <input class="form-control input-lg" id="fName" name="fName" placeholder=
                          "your first name..." type="text" >
                        </div>

                        <div class="col-lg-6">
                          <input class="form-control input-lg" id="lName" name="lName" placeholder=
                          "your last name..." type="text">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group" id="divemail">
                  <div class="rows">
                      <div class="col-md-12">
                        <div class="col-lg-12">
                          <input class="form-control input-lg" id="email" name="email" 
                placeholder="your email..." type="text" onblur="checkEmail();">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group" id="divremail">
                    <div class="rows">
                      <div class="col-md-12">
                        <div class="col-lg-12">
                          <input class="form-control input-lg" id="reemail" name="reemail"
                  placeholder="Re-enter your Email..." type="text" onblur="checkEmail2();">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group" id="divpass">
                    <div class="rows">
                      <div class="col-md-12">
                        <div class="col-lg-12">
                          <input class="form-control input-lg" id="password" name="password"
                          placeholder="New Password" type="password">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-inline">
                    <div class="rows">
                      <div class="col-md-12">
                        <div class="col-lg-3">
                          <label>Birthday:</label>
                        </div>

                        <div class="col-lg-3">
                          <select class="form-inline input-sm" name="month" id="month">
                           
                            <option value="">Month</option>
              <?php
                $m = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                foreach ($m as $month) {
                  echo '<option value='.$month.'>'.$month.'</option>';
                }
                  ?>
                          </select>
                        

                        
                          <select class="form-inline input-sm" name="day" id="day">
                           
                         <option value="">Day</option>
              <?php 
                $d = range(31, 1);
                foreach ($d as $day) {
                  echo '<option value='.$day.'>'.$day.'</option>';
                }
              
              ?>
                          </select>
                       

                        
              <select class="form-inline input-sm" name="yr" id="yr">
                           <option value="">Year</option>
              <?php 
                  $years = range(2010, 1900);
                  foreach ($years as $yr) {
                    echo '<option value='.$yr.'>'.$yr.'</option>';
                  }
                
                  ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>





<br>


                  <div class="form-inline">
                    <div class="rows">
                      <div class="col-md-12" style="text-align: left">
           
            <div class="col-lg-3">
            <label>Gender:   </label>
                        <div class="radio">
                          <label><input checked id="optionsRadios1" name="gender" type=
                          "radio" value="Female">Female</label>
                        </div>
           
           
           
                        <div class="radio">
                          <label><input id="optionsRadios2" name="gender" type="radio"
                          value="Male"> Male</label>
                        </div>
                        </div>
          
</div>
                    </div>
                  </div>


            



 <div class="form-inline">
                    <div class="rows">
                      <div class="col-md-12" style="text-align: left">

           
            <div class="col-lg-3">
            <label> Profession: </label>
                        <div class="radio">
                          <label><input checked id="optionsRadios1" name="profession" type=
                          "radio" value="doctor">Doctor</label>
                        </div>
          
           
                        <div class="radio">
                          <label><input id="optionsRadios2" name="profession" type="radio"
                          value="others"> Others</label>
                        </div>
          </div>  
            </div>
                    </div>
                  </div>
                  
<br>
<div class="form-inline">
                    <div class="rows">
                      <div class="col-md-12" style="text-align: left">
           
            <div class="col-lg-3">

    <label for="user">Contact number </label>
    <input type="txt" class="form-control" name="contact_num" placeholder="phone or mobile number">
    </div>
    </div>
    </div>
  </div>
<br>


           <div class="form-inline">
                    <div class="rows">
                      <div class="col-md-12">
            
            </div>
           </div>
          </div>           
                  <div class="form-group">
                    <div class="rows">
                      <div class="col-md-8">
                        <div class="col-lg-12">
                          <button class="btn btn-success btn-lg" type="submit" name="Submit">Sign Up</button>
                        </div>
                      </div>
                    </div>
                  </div>
                    
          
        </div>
              </div>
            </fieldset>
          </form>
        </div>
      <!--rows-->
    <!--container-->

  <hr>

  <footer>
  
  </footer><!-- /container -->
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="assets/js/jquery.js"></script> 
  <script src="js/bootstrap.min.js"></script>

</body>
</html>