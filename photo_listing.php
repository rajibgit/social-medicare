<?php	
require_once("includes/initialize.php");	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Bondhu</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.php">Bondhu</a>
        </div>
        
		<div class="navbar-collapse collapse">
         
          <form class="navbar-form navbar-right">
            <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Home</a></li>
           <li class="dropdown">

			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile <b class="caret"></b></a>
             
			 <ul class="dropdown-menu">
                <li><a href="#">My Profile</a></li>
                <li><a href="#">Edit profile</a></li>
                <li><a href="#">Edit profile Picture</a></li>
				<li><a href="#">Customize profile</a></li>
				<li><a href="#">Edit Work and Education</a></li>
               
              </ul>
            </li>
			<li class="dropdown">

			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<b class="caret"></b></a>
             
			 <ul class="dropdown-menu">
                <li><a href="#">Account Settings</a></li>
                <li><a href="#">Privacy Settings</a></li>
                <li><a href="#">Manage Social Accounts</a></li>
				<li><a href="#">Manage Credits</a></li>
				<li><a href="#">Logout</a></li>
               
              </ul>
            </li>
          </ul>
		</form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <div class="container">
		<div class="well">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Image</th><th>Filename</th><th>Caption</th><th>Size</th><th>Type</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
					$photo = new photos();
					global $mydb;
					$mydb->setQuery("SELECT * FROM photos");
	

					$cur = $mydb->loadResultList();

					foreach ($cur as $object){
			    Print out the contents of the entry 
					echo '<tr>';
					echo '<td> <img src="./images/'.$object->filename.'" width="100px"/></td>';
					echo '<td>'.$object->filename.'</td>';
					echo '<td>'.$object->caption.'</td>';
					echo '<td>'.$photo->size_as_text($object->size) .'</td>';
					echo '<td>'.$object->type.'</td>';
					}

				?>
			
				
				</tr>
			<tbody>
		</table>
	</div>
	
	
     
  </body>
</html>
  
      <hr>

      <footer>
  
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
