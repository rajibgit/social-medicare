<?php	
error_reporting(E_ERROR | E_PARSE);
require_once("includes/initialize.php");	
include 'header.php';
?>

<br/>

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
									"button">Close</button>

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
					     See site members
					    </a>
					    <a href="siteDoctors.php" class="list-group-item" >
						      <span class="badge pull-right">
						      	<?php $mydb->setQuery("SELECT * FROM user_info");
							      	$cur = $mydb->executeQuery();
									$row_count = $mydb->num_rows($cur);
									echo $row_count-1;
									$flag = $row_count-1;
						        ?>
						    </span>
						     See site doctors
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

				</div>
				<div class="col-xs-12 col-sm-6 col-md-8">
					

					
				<div class="well">
				<div class="row">
				<div class="col-md-12">
					<div class="panel-group" id="accordion">
					  <div class="panel panel-primary">
						<div class="panel-heading">
						  <h5 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" title="What's on your mind?">
							 Post problem
							</a>
							</h5>
						</div>
						
						<form action="save_post.php" method="POST">
						<div id="collapseOne" class="panel-collapse collapse">
						  <div class="panel-body">
							<input type="hidden" name="comment_id" value="<?php echo $_SESSION['member_id']; ?>">
							<input type="hidden" name="memberid" value="<?php echo $_SESSION['member_id']; ?>">
							<input type="hidden" name="author" value="<?php echo $_SESSION['fName']. ' '. $_SESSION['lName']; ?>">
							<input type="hidden" name="to" value="<?php echo $_SESSION['member_id']; ?>">

							<input type="hidden" name="category" value="<?php echo $_SESSION['category']; ?>">
							<textarea class="form-control input-sm" name="content" placeholder="Faceing a problem ???"></textarea>
								
						</div>
						<div class="panel-footer" align="right">
							<button class="btn btn-primary btn-sm" type="submit" name="share">post</button>
							
                            
	  <select class="form-inline" name="category" >
                           
                            <option value="">Category</option>
							<?php
							  $c = array("Skin","Head","Hair","Ear","Eye","Nose","Teeth","lip","Tounge","Neck","Sholder","Hand","Nail","Brest","Belly","Waist","Leg","Back pain","Others");
							  foreach ($c as $category) {
								  echo '<option value='.$category.'>'.$category.'</option>';
							  }
     						  ?>
                          </select>
							
							 
          
							
						</div>
						</div>
						</form>
					  </div>
					</div>	
				
					<?php
						
					global $mydb;	
					$mydb->setQuery("SELECT * from comments where comment_id=".$_SESSION['member_id']." ORDER BY created DESC");
					$cur = $mydb->loadResultList();
					
					echo '<div class="table-responsive">';
				

					echo '<table border="0" class="table table-hover" >';
				
					echo '<tr>';
					foreach ($cur as $comm){
					$mydb->setQuery("SELECT * FROM photos WHERE `member_id`='{$_SESSION['member_id']}' and pri='yes'");
						$propic = $mydb->loadResultList();
						if ($mydb->affected_rows()== 0){
							echo '<td rowspan="2"><img src="./uploads/p.jpg" class="img-object" width="50px" height=60px" /></td>';	
						
						} 
						foreach ($propic as $obj){
							echo '<td rowspan="2">';
							echo '<img src="./uploads/'. $obj->filename.'" class="img-object" width="50px" height="60px" />';
							echo '</td>';
						}	
						
						echo '<td><strong><a href="home.php?id='.$_SESSION['member_id'].'">'.$comm->author.'</a></strong> ';		
						
						
						echo '<br/><div style="font-size: 1em" ><p align="left">'.$comm->content. '</p><div style="1em"><p><a align="left">Category: '.$comm->category. ' </a></p></div>

										'.date_toText($comm->created).'</div>';
                         echo '<class="panel-footer" align="left">
							<a href="#">Like</a>';

						echo '<td><a href="delete_post.php?id='.$comm->id.'"><button type="button" class="close" aria-hidden="true">&times;</button></a></td>';
						echo '</tr>';
					
						echo '<tr>';
				
						echo '<td>';
						echo '<table border="0">';
					
						/* this area is for listing of sub-comment*/
						$mydb->setQuery("SELECT * FROM  `subcomment` WHERE `comment_id` = ".$comm->id." ORDER BY created" );
						$sub = $mydb->loadResultList();
						foreach ($sub as $subcomm){
							echo '<tr>';

							$mydb->setQuery("SELECT * FROM photos WHERE `member_id`='{$subcomm->member_id}' and pri='yes'");
							$propic = $mydb->loadResultList();
							if ($mydb->affected_rows()== 0){
								echo '<td><img src="./uploads/p.jpg" class="img-object" width="30px" height=40px" /></td>';

							}
							foreach ($propic as $obj){
								echo '<td >';
								echo '<img src="./uploads/'. $obj->filename.'" class="img-object" width="30px" height="40px" />';
								echo '</td>';
							}

							echo '<td><p><a href="home.php?id='.$_SESSION['member_id'].'">
												'.$subcomm->subauthor.'</a>  '.$subcomm->subcontent .'</p><div style="font-size: 0.9em"><p>'.date_toText($subcomm->created).'</p> </div></td>';
							echo '<td><a href="delete_sub.php?id='.$subcomm->subc_id.'"><button type="button" class="close" aria-hidden="true">&times;</button></a></td>';
							echo '';
							echo '<tr>';
							echo '</tr>';
							echo '</tr>';

						}

						//This area is for creating a new comment
						echo '<tr>';
						echo '<form action="save_subcomm.php" method="post">';
						echo '<input name="commentid" type="hidden" value="'. $comm->id .'">';
						echo '<input name="memberid" type="hidden" value="'. $_SESSION['member_id'] .'">';
						echo '<input name="subauthor" type="hidden" value="'. $_SESSION['fName']. ' '. $_SESSION['lName'] .'">';

						$mydb->setQuery("SELECT * FROM photos WHERE `member_id`='{$_SESSION['member_id']}' and pri='yes'");
						$propic = $mydb->loadResultList();
						if ($mydb->affected_rows()== 0){
							echo '<td><img src="./uploads/p.jpg" class="img-object" width="30px" height=30px" /></td>';

						}
						foreach ($propic as $obj){
							echo '<td >';
							echo '<img src="./uploads/'. $obj->filename.'" class="img-object" width="30px" height="30px" />';
							echo '</td>';
						}

						echo '<td><input name="subcontent" type="text" style="width: 400px;" class="form-control input-sm" placeholder="Write a comment...">';
						echo '</form>';
						echo '</tr>';
						echo '</table>';
						//echo '</div>';
						/*
						End of New sub comment.
						*/						
						echo '</div>';
					
						echo '</div>';//end of col-lg-6
						echo '</div>';//end of row
						echo '</div>';//end of well
						echo  '</tr>';
						
							
					}
					echo '</table>';
					?>
						
		</div>
				
				</div>
			</div>
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
	  <script src="assets/js/search.js"></script>
     <script type="text/javascript" src="jquery.js"></script>	 
	 <script src="js/search.js"></script>
  </body>
</html>
