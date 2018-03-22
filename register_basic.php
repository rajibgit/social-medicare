
<?php
//set up mysql connection
mysql_connect("localhost", "root", "") or die(mysql_error());
//select database
mysql_select_db("saibah_medicare") or die(mysql_error());

$f_name = $_POST['fName'];
$l_name = $_POST['lName'];
$email = $_POST['email'];
$password = sha1($_POST['password']);
$month	  = $_POST['month']; 
$month    = $month + 1;
$day	  = $_POST['day'];
$yr	      = $_POST['yr'];
$bday     = $yr . '-' . $month . '-' .  $day;
$gender   = $_POST['gender'];
$profession   = $_POST['profession'];
$contact_num   = $_POST['contact_num'];



$query = "INSERT INTO `user_info` (`fName`, `lName`, `email`, `pword`, `gender`, `bday`,`profession`,`contact_num`) 
VALUES ('{$f_name}', '{$l_name}', '{$email}', '{$password}','{$gender}','{$bday}','{$profession}','{$contact_num}')";
					
if (mysql_query($query)) {
   header("location:http://localhost/saibah_medicare_new/home.php");
    
} else{
	   header("location:http://localhost/saibah_medicare_new/index.php");

    die("Failed: " . mysql_error());
}
?>
<?php
//set up mysql connection
mysql_connect("localhost", "root", "") or die(mysql_error());
//select database
mysql_select_db("saibah_medicare") or die(mysql_error());

$f_name = $_POST['fName'];
$l_name = $_POST['lName'];
$email = $_POST['email'];
$password = sha1($_POST['password']);
$month	  = $_POST['month']; 
$month    = $month + 1;
$day	  = $_POST['day'];
$yr	      = $_POST['yr'];
$bday     = $yr . '-' . $month . '-' .  $day;
$gender   = $_POST['gender'];
$profession   = $_POST['profession'];
$contact_num   = $_POST['contact_num'];



$query = "INSERT INTO `user_info` (`fName`, `lName`, `email`, `pword`, `gender`, `bday`,`profession`,`contact_num`) 
VALUES ('{$f_name}', '{$l_name}', '{$email}', '{$password}','{$gender}','{$bday}','{$profession}','{$contact_num}')";
					
if (mysql_query($query)) {
   header("location:http://localhost/saibah_medicare/home.php");
    
} else{
	   header("location:http://localhost/saibah_medicare/index.php");

    die("Failed: " . mysql_error());
}
?>