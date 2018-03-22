<?php
error_reporting(E_ERROR | E_PARSE);
require_once("includes/initialize.php");	
include 'header.php';
?>


				<div class="col-xs-12 col-sm-6 col-md-8">
					

					
				

               <!--newsfeed-->
               <?php
						
					global $mydb;	
					$mydb->setQuery("SELECT `comments`.id as `id`, `comments`.member_id as `member_id`, `comments`.comment_id as `comment_id`,`comments`.content as `content`, `comments`.author as `author`, `comments`.created as `created`,`comments`.to as `to`, `comments`.category as `category`,`photos`.filename as `filename` from comments LEFT JOIN photos ON `comments`.member_id = `photos`.member_id 
                           where `photos`.pri='yes'
                        
					 ORDER BY created DESC");
					$cur = $mydb->loadResultList();
					
					echo '<div class="table-responsive">';
				

					echo '<table border="0" class="table table-hover" >';
				
					foreach ($cur as $comm){
						echo '<tr>';
						$propic = $comm->filename;
						if($propic==null || $propic=='') $propic='p.jpg';
						echo '<td rowspan="2">';
						echo '<img src="./uploads/'. $propic.'" class="img-object" width="50px" height="60px" />';
						echo '</td>';
						echo '<td><strong><a href="home.php?id='.$_SESSION['member_id'].'">'.$comm->author.'</a></strong> ';		
						
						
						echo '<br/><div style="font-size: 1em" ><p align="left">'.$comm->content. '</p><div style="1em"><p><a align="left">Category: '.$comm->category. ' </a></p></div>


										'.date_toText($comm->created).'</div>';


                       echo '<class="panel-footer" align="left">
							<a href="#">Like</a>';






						echo '</td>';
						

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

























				</div><!--End of well-->
		</div>
	</div>

	
     
  
 
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
	  <script src="js/search.js"></script>
	 
	
  </body>
</html>
