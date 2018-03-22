<?php	
require_once("includes/initialize.php");	

$message = "";
if(isset($_POST['submit'])){
$photo = new photos();
$photo->caption = $_POST['caption'];
$photo->attach_file($_FILES['uploadphoto']);

if($photo->save()){
$message= "The file has successfully saved!";
}else{
$message = join("<br/>", $photo->errors);
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="#">

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
         <a class="navbar-brand" href="#"> <h2>Bondhu</h2></a>
        </div>
        
		<div class="navbar-collapse collapse">
         
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
	
		<div class="rows">	
			
				<div class="col-xs-6">
				<h3>Bondhu helps you connected and share with 
				the other people in your life</h3>
				
				</div>
			<div class="col-xs-6">
			
					
					<form action="upload_photos.php" enctype="multipart/form-data" class="form-horizontal well" method="post">
					<fieldset>
					<---This will display some messages about the status of the uploaded photo
					and it is either successfully uploaded or not--->
					<?php echo output_message($message);?>
					
					  <legend>Upload Photo</legend>
					
						<div class="form-group">
							<div class="rows">
								<div class="col-md-12">
								<div class="rows">
									<div class="col-md-8">
									<input type="hidden" name="MAX_FILE_SIZE" value="1000000">								
									<input type="file" id="uploadphoto" name="uploadphoto">
									</div>
									<div class="col-md-4">

										
									</div>
								</div>		
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="rows">
								<div class="col-md-12">
								<div class="rows">
									<div class="col-md-8">
										<p>Caption<input type="text" name="caption" class="form-control input-lg"></p>
									</div>		
								</div>
							</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="rows">
								<div class="col-md-12">
								<div class="rows">
									<div class="col-md-2">
									

										<input type="submit" name="submit" class="btn btn-success btn-lg" value="Upload">
									</div>
								</div>		
								</div>
							</div>
						</div>
						
												
						</div>
							
						</div>	
						</fieldset>
				</form>
			</div>	
		   </div><!--rows-->		
		
		
      </div><!--container-->
    </div><!--jumbotron-->

    
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
