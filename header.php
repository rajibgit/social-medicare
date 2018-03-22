<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Yokemate Medicare</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- user defined CSS -->
    <link href="includes/myCSS.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
	<?php 
	    //login confirmation
		confirm_logged_in();
	?> 
<!--	.table th, .table td { 
     border-top: none; 
 }-->
  </head>

  <body>
<br/>
    <div class="navbar navbar-inverse navbar-fixed-top">
      
        
          
         
       
        
		<div class="navbar-collapse collapse">
         
          <ul class="nav nav-tabs">
            <li> <img src="contents/img/y.png" class="img-circle" alt="Flower" width="80px" height="40px"></li>
             <li><a href="home.php">My Posts</a></li>  
             <li><a href="post.php">ALL problem posts</a></li>


      <li class="dropdown">
      
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <b class="caret"></b></a>
             
       <ul class="dropdown-menu">
          <li><a href="search.php?category=skin">Skin</a></li>
          <li><a href="search.php?category=head">Head</a></li>
          <li><a href="search.php?category=hair">Hair</a></li>
          <li><a href="search.php?category=ear">Ear</a></li>
          <li><a href="search.php?category=eye">Eye</a></li>
          <li><a href="search.php?category=nose">Nose</a></li>
          <li><a href="search.php?category=teeth">Teeth</a></li>
          <li><a href="search.php?category=lip">Lip</a></li>
          <li><a href="search.php?category=tounge">Tounge</a></li>
          <li><a href="search.php?category=neck">Neck</a></li>
          <li><a href="search.php?category=sholder">Sholder</a></li>
          <li><a href="search.php?category=hand">Hand</a></li> 
          <li><a href="search.php?category=nail">Nail</a></li>
          <li><a href="search.php?category=orthopedic">Orthopedic</a></li>
          <li><a href="search.php?category=belly">Belly</a></li>
          <li><a href="search.php?category=waist">Waist</a></li>
          <li><a href="search.php?category=leg">Leg</a></li>
          <li><a href="search.php?category=others">Others</a></li>
        </ul>
      </li>
      
    
            <li class="dropdown">
      
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Msg-Doctor <b class="caret"></b></a>
             
       <ul class="dropdown-menu">
                <li><a href="skin.php">Skin specialist</a></li>
      <li><a href="#">Heart specialist</a></li>
      <li><a href="#">cancer specialist</a></li>
      <li><a href="#">child specialist</a></li>
       <li><a href="#">Gynecologist</a></li>
       <li><a href="#">Hair specialist</a></li>
       <li><a href="#">Eye specialist</a></li>
          
              </ul>
            </li>

          
      
      <li><a href="top_ques.php">Top Questions</a></li>
      
   
    
            <li >
			
			<a href="home.php" >
			<?php 
			echo $_SESSION['fName'];?> 
				
			</a>
             
			 
            </li>
            <li>   
    
              <form class="navbar-form navbar-left" action="search.php" method="POST">
                <div class="input-group">
                  <input type="text" name="pattern" class="form-control" placeholder="Search">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="search">
                      <i class="glyphicon glyphicon-search"></i>
                    </button>
                  </div>
                </div>
              </form>

           </li>
             <li><a href="logout.php" align="right">Logout</a></li>
            </li>
          </ul>
		</form>
     </div>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <br>