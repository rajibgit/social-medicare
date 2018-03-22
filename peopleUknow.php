<?php
error_reporting(E_ERROR | E_PARSE);
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
						
						    <a href="gallery.php" class="list-group-item ">
						      <span class="badge pull-right">
						      	<?php $mydb->setQuery("SELECT * FROM photos WHERE `member_id`='{$_SESSION['member_id']}'");
							      	$cur = $mydb->executeQuery();
									echo $row_count = $mydb->num_rows($cur);
						        ?>
						    </span>
						     View photos
						    </a>
						    <a href="peopleUknow.php" class="list-group-item active" >
						      <span class="badge pull-right">
						      	<?php $mydb->setQuery("SELECT * FROM user_info");
							      	$cur = $mydb->executeQuery();
									$row_count = $mydb->num_rows($cur);
									echo $row_count-1;
									$flag = $row_count-1;
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
					<h3 class="text-primary">Site members</h3>
					<div class="panel panel-default">
					
					  <div class="panel-body">
			
						
					   <?php 





						$mydb->setQuery("SELECT * 
											FROM  `user_info` 
											WHERE  `member_id` !='{$_SESSION['member_id']}'");
						$cur = $mydb->loadResultList();
						
						foreach($cur as $info ):
							$mydb->setQuery("SELECT * FROM photos WHERE `member_id`=".$info->member_id ." 
								AND `member_id`!='{$_SESSION['member_id']}' and `pri`='yes'");
							$pho = $mydb->loadResultList();
						?>
					<p class="panel-body-right">
						<?php
							if ($mydb->affected_rows()== 0){
					echo '<a '.$info->member_id.'">';
						echo '<img src="./uploads/p.jpg" class="img-thumbnail" width="100" height="100"/>';	
							} //for profile pic
					echo '</a>';
								
								foreach($pho as $object){	
									echo '<a '.$info->member_id.'">';
									echo '<img src="./uploads/'. $object->filename.'" class="img-thumbnail" width="100" height="100" />';
									echo '</a>';

								}

							?>   
				             	<br/>
							<strong>
							<?php echo $info->fName. ' ' .$info->lName;

							?>
								
							</strong>
							<br/>
							<a>


								
							</form>		 	
                            
										<div style="clear: both; margin-bottom: 20px;"></div>					
									<?php  
									
									endforeach;

									// echo '<input type="hidden" value="'.$flag.'" id="flag">';


									?>

                           

	



	
	
	
	
					</div>
					
					
					
				
				</div>
	</div>

	
      
      <hr>
    
    </div> 
    <style type="text/css">
    	
    	.request-send{
    		display: none;
    	}
    </style>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/tooltip.js"></script>
	<script src="assets/js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/popover.js"></script>
	 	 <!-- <script src="js/friendrequest.js"></script> -->


  <script type="text/javascript">
    $(document).ready(function() {

    	// var f = $("#flag").val();

      $(".send-request").click(function() {
        // alert("lol");
        var _this = $(this);
    	var rowValue = $(this).attr('data-row');
    	// alert(rowValue);
        if (rowValue) {
        	$(this).html(" ");
        		$(this).html("Request Sent");
        		$(this).css("background-color","#428bca");
        		$(this).css("border-color","#428bca"); 

        	var dataToSend = { contentId: rowValue };
        	
        	// $(".request-send").css("display","block");
    
          $.post("friend_request_save.php", dataToSend, function(data, status){
              if(status === 'success')
              {
            	    
              }
            });

        }
        else {
          // $("#search-option").css("display","none")
        }
      });

    });
  </script> 
	 
	
  </body>
</html>
