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

					<div class="list-group">
					    <a href="gallery.php" class="list-group-item active">
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
			<div class="panel panel-default">
			   <div class="panel-heading"><h3 class="panel-title">List of Photos</h3></div>
				<div class="panel-body">		
       
    
					<?php
					
					$mydb->setQuery("SELECT * FROM photos WHERE `member_id`='{$_SESSION['member_id']}'");
					$cur = $mydb->loadResultList();
					foreach($cur as $object): ?>
							<a data-target="#myModal" data-toggle="modal" >
					   		<img src="./uploads/<?php echo $object->filename; ?> " class="img-thumbnail" width="200" height="200" />
					  	 	</a>
					<?php endforeach;?>

					<!-- Modal -->

						<div class="modal fade" id="myModall" tabindex="-1">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-body">
								
										</div>

								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
				</div>
				</div>		
			</div>
		
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
	 <script>
		$(document).ready(function(){
           $('a img').on('click',function(){
                var src = $(this).attr('src');
                var image = '<img src="' + src + '" class="img-responsive"/>';
                $('#myModall').modal();
                $('#myModall').on('shown.bs.modal', function(){
                    $('#myModall .modal-body').html(image);
                });
                $('#myModall').on('hidden.bs.modal', function(){
                    $('#myModall .modal-body').html('');
                });
           });  
        })
	</script>
	
  </body>
</html>
