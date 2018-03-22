<?php	
require_once("includes/initialize.php");	
include 'header.php';
?>

<div class="container">
		<div class="well">
	
			<div class="row">
				<div class="col-xs-6 col-md-3">
						<a data-target="#myModal" data-toggle="modal" href="" title=
						"Click here to Change Image.">
				<?php
				
				$mydb->setQuery("SELECT * FROM photos WHERE `member_id`='{$_SESSION['member_id']}' and `pri`='yes'");
				$cur = $mydb->loadResultList();
				if ($mydb->affected_rows()== 0){
					echo '<img src="./uploads/p.jpg" class="img-thumbnail"/>';	
				
				} 
				foreach($cur as $object){
				   
						echo '<img src="./uploads/'. $object->filename.'" class="img-thumbnail"  />';
					
					}	
				?>
					</a>	
					
				<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button class="close" data-dismiss="modal" type=
									"button">×</button>

									<h4 class="modal-title" id="myModalLabel">Choose Your best
									picture for your Profile.</h4>
								</div>

								<form action="save_photo.php" enctype="multipart/form-data" method=
								"post">
									<div class="modal-body">
										<div class="form-group">
											<div class="rows">
												<div class="col-md-12">
													<div class="rows">
														<div class="col-md-8">
															<input name="MAX_FILE_SIZE" type=
															"hidden" value="1000000"> <input id=
															"upload_file" name="upload_file" type=
															"file">
														</div>

														<div class="col-md-4"></div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer">
										<button class="btn btn-default" data-dismiss="modal" type=
										"button">Close</button> <button class="btn btn-primary"
										name="savephoto" type="submit">Save Photo</button>
									</div>
								</form>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->



























					<div class="list-group">
					    <a href="gallery.php" class="list-group-item">
					      <span class="badge pull-right">
					      	<?php $mydb->setQuery("SELECT * FROM photos WHERE `member_id`='{$_SESSION['member_id']}'");
						      	$cur = $mydb->executeQuery();
								echo $row_count = $mydb->num_rows($cur);
					        ?>
					    </span>
					     View photos
					    </a>
					    <a href="peopleUknow.php" class="list-group-item">
					      <span class="badge pull-right">
					      	<?php $mydb->setQuery("SELECT * FROM user_info");
						      	$cur = $mydb->executeQuery();
								echo $row_count = $mydb->num_rows($cur);
					        ?>
					    </span>
					     Friends you may know
					    </a>
				
					</div>
					<div class="panel panel-success">
					<?php 
						$mydb->setQuery("Select * from basic_info where member_id=".$_SESSION['member_id']);
						$info = $mydb->loadSingleResult();
					
					?>
			  		<div class="panel-heading"><h3 class="panel-title">Information</h3></div>
					   <div class="panel-body">	
							<p class="text-muted">Networks:</p>	<p><?php echo (isset($info->networks)) ? $info->networks : 'None'; ?></p>
							<p class="text-muted">Relationship Status:</p><p><?php echo (isset($info->rel_stats)) ? $info->rel_stats : 'None'; ?></p>
							<p class="text-muted">Birthday:</p>	<p><?php echo bdate_toText($_SESSION['bday']); ?></p>
																				            					            		
						</div>
					          
					</div>

					<div class="panel panel-default">
					  <div class="panel-heading"> <h3 class="panel-title">Friends</h3></div>
					  <div class="panel-body">
					   <?php 
						$mydb->setQuery("Select * from user_info ");
						$cur = $mydb->loadResultList();
						foreach($cur as $object):
					
						?>
						

						<?php endforeach;?>
					  </div>
					</div>

				</div>

				<div class="col-xs-12 col-sm-6 col-md-8">
					<div class="page-header">
						<h3><?php echo $_SESSION['fName']. ' '. $_SESSION['lName'];?></h3>
					</div>

					<ul class="nav nav-tabs">
					  <li class="#"><a href="home.php">Home</a></li>
					  <li><a href="newsfeed.php">Newsfeed</a></li>
					  <li><a href="friends.php">Friends</a></li>
					  <li class="#"><a href="info.php">Info</a></li>
					  <li class="active"><a href="message.php">Messages</a></li>
					</ul>
				<div class="well">
					<form action="pbasicinfo.php" class="form-horizontal well span9" method="post">
				 
				</form>

				</div><!--End of well-->
		</div>
	</div>

	
     
  </body>
</html>
 
      <hr>
    
    </div> <!-- /container -->
	<footer>
     
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script src="js/tooltip.js"></script>
	<script src="assets/js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	 <script src="js/popover.js"></script>
	 
	
  </body>
</html>
