<?php
require_once("includes/initialize.php");	

 $comment_id = $_POST['comment_id'];
 $content = $_POST['content'];
 $author = $_POST['author'];
 $member_id = $_POST['memberid'];
 $destination = $_POST['to'];
 $category =  $_POST['category']; 
 $created =  strftime("%Y-%m-%d %H:%M:%S", time());


	global $mydb;
	$mydb->setQuery("INSERT INTO `saibah_medicare`.`comments` (`member_id`, `comment_id`, `content`, `author`, `to`, `category` ,`created`) 
						VALUES ('{$member_id}','{$comment_id}', '{$content}', '{$author}', '{$destination}', '{$category}','{$created}');");
	$mydb->executeQuery();
	
	if ($mydb->affected_rows() == 1) {
		
		echo "<script type=\"text/javascript\">
					
					window.location='home.php';
				</script>";
		
	} else{
		echo "<script type=\"text/javascript\">
					</script>";
	}


?>