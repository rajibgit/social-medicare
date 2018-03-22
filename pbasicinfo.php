<?php
error_reporting(E_ERROR | E_PARSE);
require_once("includes/initialize.php");	
include 'header.php';

$network   = $_POST['network'];
$gender    = $_POST['gender'];
$month 	   = $_POST['mm'] + 1; 
$bday      = $_POST['yr'].'-'.$month.'-'. $_POST['dd'];
$interest  = $_POST['interested'];
$rel_stats = $_POST['relstatus'];
$language  = $_POST['language'];
$religion  = $_POST['Religion'];
$reldesc   = $_POST['Reldesc'];
$political = $_POST['politicalviews'];
$poldesc   = $_POST['poldesc'];
$member_id = $_SESSION['member_id'];
global $mydb;
//check if theres a current information for every user
$mydb->setQuery("Select * FROM basic_info where member_id='{$member_id}'");
$cur = $mydb->executeQuery();
$row_count = $mydb->num_rows($cur);//get the number of count

//if the row count is equal to one therefore there is an existing data for the user
if ($row_count == 1){
//then it will simply do the editing of the user's information
$mydb->setQuery("UPDATE `basic_info` SET 
		`networks`      =  '{$network}',
		`interested_in` =  '{$interest}',
		`rel_stats`     =  '{$rel_stats}',
		`language`      =  '{$language}',
		`religion`      =  '{$religion}',
		`rel_desc`      =  '{$reldesc}',
		`political_view` =  '{$political}',
		`pol_desc`      =  '{$poldesc}'
		 WHERE member_id=".$_SESSION['member_id']);
$mydb->executeQuery();
//check if the update statement has been executed successfully in the database
if ($mydb->affected_rows() == 1) {

echo "<script type=\"text/javascript\">
		//alert(\"Basic Information Updated successfully.\");
		window.location='info.php';
	</script>";

} else{
echo "<script type=\"text/javascript\">
		alert(\"Updating Basic information Failed!\");
		window.location='info.php';
	</script>";
}
//this code will update the birthday and gender of the user in the users_table
$mydb->setQuery("UPDATE  `user_info` SET  `gender` =  '{$gender}',
`bday` = '{$bday}' WHERE  member_id=".$_SESSION['member_id']);
$mydb->executeQuery();

}else{
//else no results user's information found then it will insert the user's information in the database
$mydb->setQuery("INSERT INTO `basic_info` (`networks`, `interested_in`, 
				`rel_stats`, `language`, `religion`, `rel_desc`, 
				`political_view`, `pol_desc`, `member_id`)
				VALUES ( '{$network}', '{$interest}', '{$rel_stats}', '{$language}',
						 '{$religion}', '{$reldesc}', '{$political}', '{$poldesc}', '{$member_id}');");
$mydb->executeQuery();

if ($mydb->affected_rows() == 1) {

echo "<script type=\"text/javascript\">
		//alert(\"Basic Information created successfully.\");
		window.location='info.php';
	</script>";

} else{
echo "<script type=\"text/javascript\">
		alert(\"Saving Basic information Failed!\");
	</script>";
}

}
$mydb->setQuery("UPDATE  `philsocialdb`.`user_info` SET  `gender` =  '{$gender}',
`bday` =  '{$bday}' WHERE  member_id=".$_SESSION['member_id']);
$mydb->executeQuery();

?>