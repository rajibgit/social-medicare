<?php
require_once("includes/initialize.php");	

 $comment_id = $_POST['commentid'];
 $content = $_POST['subcontent'];
 $author = $_POST['subauthor'];
 $member_id = $_POST['memberid'];
 $created =  strftime("%Y-%m-%d %H:%M:%S", time());


	global $mydb;
	$mydb->setQuery("INSERT INTO `saibah_medicare`.`subcomment` ( `comment_id`, `member_id`, `subauthor`, `subcontent`, `created`) 
						VALUES ('{$comment_id}', '{$member_id}',  '{$author}', '{$content}', '{$created}');");
	$mydb->executeQuery();
	
	if ($mydb->affected_rows() == 1) {
		
		echo "<script type=\"text/javascript\">
					//alert(\"Comment created .\");
					window.location='home.php';
				</script>";
		
	} else{
		echo "<script type=\"text/javascript\">
					alert(\"Comment  Failed!\");
				</script>";
	}


?>