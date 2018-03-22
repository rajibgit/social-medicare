<?php
	if (isset($_POST['btnlogin'])){
		//form has been submitted1
		
		$email	= trim($_POST['log_email']);
		$upass	= trim($_POST['log_pword']);
		//$utype	= trim($_POST['utpye']);
		$h_upass = sha1($upass);
		if($email == ''){	
			echo 'Username or Password Not Registered! ';
		}elseif($upass == ''){	
			echo 'Username or Password Not Registered!';
		
		}else{
			
			//`member_id`, `fName`, `lName`, `email`, `pword`, `mm`, `dd`, `yy`, `gender`
			$sql = "SELECT * FROM `user_info` WHERE `email`='". $email ."' and `pword`='". $h_upass ."'";
			$result = mysql_query($sql) or die;
			$numrows = mysql_num_rows($result);
			if ($numrows == 1){
				$found_user = mysql_fetch_array($result);
				$_SESSION['member_id'] = $found_user['member_id'];
				$_SESSION['fName'] = $found_user['fName'];
				$_SESSION['lName'] = $found_user['lName'];
				$_SESSION['email'] = $found_user['email'];
				$_SESSION['pword'] = $found_user['pword'];
				$_SESSION['gender'] = $found_user['gender'];
				
		?>	<script type="text/javascript">
				alert("Welcome! back to Bondhu<?php echo $_SESSION['fName'];?> your are successfully logged in.");
				window.location = "home.php";
			</script>
		<?php

				
			}else{
			?>	<script type="text/javascript">
				alert("Username or Password does not match!!!!");
				window.location = "home.php";
				</script>
		<?php
			}
				
		}	
	}else{
		
		$email	= "";
		$upass	= "";
		$utype	= "";
	}

?>