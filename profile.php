<?php	
require_once("includes/initialize.php");	
include 'header.php';
?>

<div class="container">
		<div class="well">




        <?php 

        	if($_GET){
        		$user = $_GET['user'];
        	}

        	$sql = "SELECT * from user_info";
			$query = mysql_query($sql) or die;
			$row = mysql_fetch_array($query);
			// echo "<pre>";
			// print_r($row);
			// die();

			$gender = $row['gender'];
			$bday = $row['bday'];
			$firstName = $row['fName'];
			$lastName = $row['lName'];
        ?>










	
			<div class="row">
				<div class="col-xs-6 col-md-3">
						<a data-target="#myModal" data-toggle="modal" href="" title=
						"Click here to Change Image.">
				<?php
				
				$mydb->setQuery("SELECT * FROM photos WHERE `member_id`='$user' and `pri`='yes'");
				$cur = $mydb->loadResultList();
				if ($mydb->affected_rows()== 0){
					echo '<img src="./uploads/p.jpg" class="img-thumbnail"/>';	
				
				} 
				foreach($cur as $object){
				   
						echo '<img src="./uploads/'. $object->filename.'" class="img-thumbnail"  />';
					
					}	
				?> 
					
					

					<div class="list-group">
					    <a href="gallery.php" class="list-group-item">
					      <span class="badge pull-right">
					      	<?php $mydb->setQuery("SELECT * FROM photos WHERE `member_id`='$user'");
						      	$cur = $mydb->executeQuery();
								echo $row_count = $mydb->num_rows($cur);
					        ?>
					    </span>
					     View photos
					    </a>
					    				
					</div>
					<div class="panel panel-success">
					<?php 
						$mydb->setQuery("SELECT * FROM basic_info WHERE `member_id`='$user'");
						$info = $mydb->loadSingleResult();
					
					?>
			  		<div class="panel-heading"><h3 class="panel-title">Information</h3></div>
					   <div class="panel-body">	
							<p class="text-muted">Networks:</p>	<p><?php echo (isset($info->networks)) ? $info->networks : 'None'; ?></p>
							<p class="text-muted">Relationship Status:</p><p><?php echo (isset($info->rel_stats)) ? $info->rel_stats : 'None'; ?></p>
							<p class="text-muted">Birthday:</p>	<p><?php echo bdate_toText($bday); ?></p>
																				            					            		
						</div>
					          
					</div>

					<div class="panel panel-default">
					  <div class="panel-heading"> <h3 class="panel-title">Friends</h3></div>
					  <div class="panel-body">
					   <?php 
						$mydb->setQuery("SELECT * FROM user_info WHERE `member_id`='$user'");
						$cur = $mydb->loadResultList();
						foreach($cur as $object):
					
						?>
						

						<?php endforeach;?>
					  </div>
					</div>

				</div>

				<div class="col-xs-12 col-sm-6 col-md-8">
					<div class="page-header">
						<h3><?php echo $firstName. ' '. $lastName;?></h3>
					</div>
				<div class="well">
					<form action="pbasicinfo.php" class="form-horizontal well span9" method="post">
				 
					 <fieldset>
						<legend>Basic Information</legend>
						<div class="rows">
						<!---- this is the area where we are going to add the code for modal>-->
							<div class="col-xs-12"><!--Start row for basic Information-->

							<div class="form-group">
								<div class="rows">
								  <div class="col-md-12">
									<div class="col-md-4" id="Networks">
									   <H4><strong><strong></h4>
									</div>
									
									<div class="col-md-8">
									<a data-target="#EditBasicInfo" data-toggle="modal" href="" title="Click to edit Basic Information.">
									
									</a>
									</div>
								  </div>
								</div>
							  </div>

							  	
							<?php 
								$mydb->setQuery("SELECT * FROM basic_info WHERE `member_id`=$user");
								$info = $mydb->loadSingleResult();
								
								?>
<!-- Modal -->												
   <div class="modal fade" id="EditBasicInfo" tabindex="-1">
	<div class="modal-dialog">
	 <div class="modal-content">
	  <div class="modal-header">
	   <button class="close" data-dismiss="modal" type="button">Close</button>
           <h4 class="modal-title" id="myModalLabel">Basic Information</h4>
	  </div>

	    <div class="modal-body">
	     <div class="form-group">
	      <div class="rows">
			<div class="col-md-12">
			 <div class="rows">
			  <div class="form-group">
				<div class="rows">
				 <div class="col-md-12">
				   <div class="col-md-4" id="Networks">
					 <label for="network">Networks :</label>
					</div>
					<div class="col-md-8">
	     <input class="form-control input-sm" id="network" name="network" placeholder= "network" type="text" value="<?php echo (isset($info->networks)) ? $info->networks : 'None'; ?>">
				  </div>
				 </div>
				</div>
			   </div>

        <div class="form-group">
		  <div class="rows">
	        <div class="col-md-12">
			 <div class="col-md-4" id="gender">
			  <label for="sex">Gender :</label>
			 </div>
			    <div class="col-md-8">
		<!-- <input class="form-control input-sm" id="sex" name="sex" placeholder="sex" type="text" >-->
			<select class="form-control input-sm" name="gender" id="gender">
			<option value="Male">Male</option>
			<option value="Female">Female</option>	
			</select>	

			  </div>
		   </div>
		  </div>
	   </div>

		<div class="form-group">
		 <div class="rows">
		  <div class="col-md-12">
			<div class="col-md-4" id="bday">
			 <label for="bday">Birth Day :</label>
			</div>
			<div class="col-md-8">
			<div class="rows">
			<div class="col-md-12">
			<div class="col-md-4">
			 <select class="form-control input-sm" name="mm">
			<?php 
		$m = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
		 foreach ($m as $month=>$value) {
			echo '<option value='.$month.'>'.$value .'</option>';
				                         }
			  ?>
			  </select>
			</div>
			<div class="col-md-4">
			<select class="form-control input-sm" name="dd">
			<?php 
			 $d = range(31, 1);
				foreach ($d as $day) {
				echo '<option value='.$day.'>'.$day.'</option>';
									 }	
			 ?>
			</select>
			</div>
			<div class="col-md-4">
			<select class="form-control input-sm" name="yr">
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
			</div>
		   </div>
		  </div>
												
	       <div class="form-group">
			 <div class="rows">
			   <div class="col-md-12">
		         <div class="col-md-4" id="">
					<label for="interested">Interested In :</label>
				 </div>
				<div class="col-md-8">
				 <select class="form-control input-sm" name="interested" >
				    <option value="Women">Women</option>
					 <option value="Men">Men</option>	
				 </select>	

				</div>
			  </div>
			</div>
		   </div>

			 <div class="form-group">
			  <div class="rows">
				<div class="col-md-12">
				  <div class="col-md-4" id="">
					<label for="status">Relationship Status :</label>
				  </div>
					<div class="col-md-8">
					<select class="form-control input-sm" name="relstatus" >
				      <option value="Sinlge">Single</option>
					  <option value="In a Relationship">In a Relationship</option>
					  <option value="Maried">Maried</option>
					  <option value="Divorced">Divorced</option>
					  <option value="Engaged">Engaged</option>
					  <option value="It's Complicated">It's Complicated</option>
					  <option value="In an open Relationship">In an open Relationship</option>
					  <option value="Widowed">Widowed</option>

					</select>	

					  </div>
				 </div>
				</div>
			   </div>

														  <div class="form-group">
															<div class="rows">
															  <div class="col-md-12">
																<div class="col-md-4" id="language">
																   <label for="language">Language :</label>
																</div>
															   <div class="col-md-8">
																  <input class="form-control input-sm" id="language" name="language" placeholder="Whats your language" type="text" value="<?php echo (isset($info->language)) ? $info->language : 'None'; ?>">
																</div>
															  </div>
															</div>
														  </div>

														  <div class="form-group">
															<div class="rows">
															  <div class="col-md-12">
																<div class="col-md-4" id="Religion">
																   <label for="Religion">Religion :</label>
																</div>
															   <div class="col-md-8">
																  <input class="form-control input-sm" id="Religion" name="Religion" placeholder="What are your religious beliefs?" type="text" value="<?php echo (isset($info->religion)) ? $info->religion : 'None'; ?>">

																</div>
															  </div>
															</div>
														  </div>

														  <div class="form-group">
															<div class="rows">
															  <div class="col-md-12">
																<div class="col-md-4" id="Reldesc">
																   <label for="Reldesc">Description :</label>
																</div>
															   <div class="col-md-8">
																  <textarea class="form-control input-sm" id="Reldesc" name="Reldesc" placeholder="" >
																	<?php echo (isset($info->rel_desc)) ? $info->rel_desc : 'None'; ?>
																</textarea>
																</div>
															  </div>
															</div>
														  </div>
														    <div class="form-group">
															<div class="rows">
															  <div class="col-md-12">
																<div class="col-md-4" id="politicalviews">
																   <label for="politicalviews">Political Views :</label>
																</div>
															   <div class="col-md-8">
																  <input class="form-control input-sm" id="politicalviews" name="politicalviews"
																   placeholder="What are your political beliefs?" type="text"value="<?php echo (isset($info->political_view)) ? $info->political_view : 'None'; ?>">

																</div>
															  </div>
															</div>
														  </div>

														  <div class="form-group">
															<div class="rows">
															  <div class="col-md-12">
																<div class="col-md-4" id="poldesc">
																   <label for="poldesc">Description :</label>
																</div>
															   <div class="col-md-8">
																  <textarea class="form-control input-sm" id="poldesc" name="poldesc" placeholder="" >
																	<?php echo (isset($info->pol_desc)) ? $info->pol_desc : 'None'; ?>
																</textarea>
																</div>
															  </div>
															</div>
														  </div>
														<div class="col-md-4"></div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer">
										<button class="btn btn-default" data-dismiss="modal" type="button">Close</button> 
										<button class="btn btn-primary" name="savebasicinfo" type="submit">Save</button>
									</div>
							<!--	</form>-->
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
							  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-4" id="Networks">
								   <h5>Networks :</h5>
								</div>
							   <div class="col-md-8">
							   	  <h5><a><?php echo (isset($info->networks)) ? $info->networks : 'None'; ?></a></h5>
								</div>
								
							  </div>
							</div>
						  </div>

						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-4" id="gender">
								     <h5>Gender :</h5>
								</div>
							   <div class="col-md-8">
								<h5><a><?php echo $gender; ?></a></h5>
								</div>
							  </div>
							</div>
						  </div>

						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-4" id="bday">
								   <h5>Birth Day :</h5>
								</div>
							   <div class="col-md-8">
								  <h5><a><?php echo $bday; ?></a></h5>
								</div>
							  </div>
							</div>
						  </div>

						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-4" id="interest">
								   <h5>Interested In:</h5>
								</div>
							   <div class="col-md-8">
								  <h5><a><?php echo (isset($info->interested_in)) ? $info->interested_in : 'None'; ?></a></h5>
								</div>
							  </div>
							</div>
						  </div>

						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-4" id="relstats">
								   <h5>Relationship Status :</h5>
								</div>
							   <div class="col-md-8">
								  <h5><a><?php echo (isset($info->rel_stats)) ? $info->rel_stats : 'None'; ?></a></h5>
								</div>
							  </div>
							</div>
						  </div>

						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-4" id="language">
								   <h5>Language:</h5>
								</div>
							   <div class="col-md-6">
								   <h5><a><?php echo (isset($info->language)) ? $info->language : 'None'; ?></a></h5>
								</div>
							  </div>
							</div>
						  </div>
						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-4" id="religion">
								   <h5>Religion:</h5>
								</div>
							   <div class="col-md-6">
								   <h5><a><?php echo (isset($info->religion)) ? $info->religion : 'None'; ?></a></h5>
								</div>
							  </div>
							</div>
						  </div>

						<div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-8" id="reldesc">
								   <h5>Descriptions:</h5>
								</div>
							   <div class="col-md-4">
								   <h5><a><p><?php echo (isset($info->rel_desc)) ? $info->rel_desc : 'None'; ?><p></a></h5>
								</div>
							  </div>
							</div>
						  </div>
						  <div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-8" id="politicalview">
								   <h5>Political Views:</h5>
								</div>
							   <div class="col-md-4">
								   <h5><a><?php echo (isset($info->political_view)) ? $info->political_view : 'None'; ?></a></h5>
								</div>
							  </div>
							</div>
						  </div>

						<div class="form-inline">
							<div class="rows">
							  <div class="col-md-12">
								<div class="col-md-8" id="poldesc">
								   <h5>Descriptions:</h5>
								</div>
							   <div class="col-md-4">
								   <h5><a><p><?php echo (isset($info->pol_desc)) ? $info->pol_desc : 'None'; ?></p></a></h5>
								</div>
							  </div>
							</div>
						  </div>	
										  
							</div>  
							</div><!--End row for basic Information-->
            
					</fieldset>
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
