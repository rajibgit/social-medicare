
<?php
require_once("includes/initialize.php");    

	$f_Name   = $_POST['fName'];
	$l_Name   = $_POST['lName'];
	$email    = $_POST['email'];
	$password = sha1($_POST['password']);
	$gender   = $_POST['gender'];
	
	$month	  = $_POST['month']; 
	$month    = $month + 1;
	$day	  = $_POST['day'];
	$yr	      = $_POST['yr'];
 	$bday     = $yr . '-' . $month . '-' .  $day;
	$profession   = $_POST['profession'];
	$contact_num   = $_POST['contact_num'];
	


		$member = new member();
		$member->fName 		= $f_Name;
		$member->lName 		= $l_Name;
		$member->email 		= $email;
		$member->pword 		= $password;
		$member->gender		= $gender;
		$member->bday       = $bday;
		$member->profession = $profession;
		$member->contact_num = $contact_num;
		
		$member->create();					
?>
    <script type="text/javascript">
    alert("Registation completed login with your email id and your password .");
		window.location = "home.php";
	</script>
    