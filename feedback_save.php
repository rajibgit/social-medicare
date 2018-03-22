<?php
session_start();
mysql_connect("localhost", "root", "") or die(mysql_error());
//select database
mysql_select_db("bondhu") or  die(mysql_error());

$content = $_POST['content'];
$member_id = $_POST['memberid'];
$created =  strftime("%Y-%m-%d %H:%M:%S", time());


	$query ="INSERT INTO `bondhu`.`feedback` (`member_id`, `content`, `created`) 
						VALUES ('{$member_id}','{$content}', '{$created}')";

					
if (mysql_query($query)) {
    
    		echo "<script type=\"text/javascript\">
					alert(\"feedback sended.\");
					window.location='home.php';
				</script>";
} else{

    		echo "<script type=\"text/javascript\">
					alert(\"send faied!!!\");
					window.location='home.php';
				</script>";

    die("Failed: " . mysql_error());
}
?>

