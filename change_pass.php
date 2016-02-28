<?php
	require_once 'header.php';
	
	if (!$loggedin) die();
	
	$old_pwd = $pwd = $c_pwd = $old_password = $password = $confirm_pwd = "";
	$error1 = "<h3>Please fill in all the required information.<br></h3>";
	$error2 = "<h3>Your new password and confirm password does not match.<br></h3>";
	$error3 = "<h3>Your current password is incorrect.<br></h3>";
	$success = "<h3>Your new password update successfully.<br></h3>";
 
  	echo "
			<form method='post' autocomplete='off' id='password_form'>
			<p><br>Current password<br />
			<input type='password' name='old_password' /><br><br>
			</p>
			<p>New password<br />
			<input type='password' name='password'  id='password' class='ser' /><br><br>
			</p>
			<p>Confirm password<br />
			<input type='password' name='confirm_pwd' id='confirm_pwd' class='ser' /><br><br>
			</p>
			<p align='left'>
			<input name='submit' type='submit' value='Save Password' class='submit' /><br><br>
			</p>
			</form><h5><br><br>Copyright NieSe@2016<br><br></h5>";
  
    if (isset($_POST['old_password']) && isset($_POST['password']) && isset($_POST['confirm_pwd'])) 
	{				
		$old_pwd = sanitizeString($_POST['old_password']);
		$pwd = sanitizeString($_POST['password']);
		$c_pwd = sanitizeString($_POST['confirm_pwd']);
	
		$query = queryMysql("SELECT * FROM `members` WHERE `user`='$user' AND `pass`='$old_pwd'");
	
		if (trim($old_pwd) == "" || trim($pwd) == "" || trim($c_pwd) == "")
		{
			echo $error1; //if no text
		}
		
		elseif($pwd!=$c_pwd) 
		{
			echo $error2;
		}
		
		elseif($pwd!=$old_pwd) 
		{
			if($query -> num_rows == 1) 
			{
				$query = queryMysql("UPDATE `members` SET `pass` = '$pwd' WHERE `user`='$user'");
				$old_password=''; $password =''; $confirm_pwd = '';
				echo $success;
			}
		}
	
		else
		{
			echo $error3;
		}
	}
?>