<?php
	require_once 'header.php';
	
	if (!$loggedin) die();
	
	$borrower = $phone = $supervisor = $class = $session = "";
	$msg1 = "<h3>&nbsp;&nbsp;Please fill in all the required information.<br></h3>";
	$msg2 = "<h3>&nbsp;&nbsp;Borrower name already exist.<br></h3>";
	$msg3 = "<h3>&nbsp;&nbsp;Borrower name is added.<br></h3>";

	echo "<div class='main'>";
	
	echo "<div id='content'>
				<div class='side-menu fl'>
					<h3>Quick Links</h3>
					<ul>
						<li><a href='add_borrower.php'>Add Borrower</a></li>
						<li><a href='borrower.php'>View Borrower</a></li>
				</div>
				
				<div class='side-content fr'>
					<div class='content-module'>
						<div class='content-module-heading cf'>
							<h3 class='fl'>Add Borrower</h3>
						</div>
					<div class='content-module-main cf'>
				
				&nbsp;&nbsp;

				<form name='formAdd' method='post' id='formAdd' action='add_borrower.php'>        
                    <tr><h3>
					<td>&nbsp;</td>
					<td>Borrower Name : </td>&nbsp;
                      <td><input class='addgroup' name='borrower' value='$borrower' type='text' id='borrower' maxlength='200' class='round default-width-input' required></td>
                   	<td>&nbsp;<br><br></td>
					 <td>
					 <td>&nbsp;&nbsp;Phone Number &nbsp;: </td>&nbsp;
                      <td><input class='addgroup' name='phone' value='$phone' type='text' id='phone' maxlength='200' class='round default-width-input' required></td>
                     <td>&nbsp;<br><br></td>
					 <td>
					 <td>&nbsp;&nbsp;Supervisor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </td>&nbsp;
                      <td><input class='addgroup' name='supervisor' value='$supervisor' type='text' id='supervisor' maxlength='200' class='round default-width-input' required></td>
                     <td>&nbsp;<br><br></td>
					 <td>
					 <td>&nbsp;&nbsp;Class &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </td>&nbsp;
                      <td><input class='addgroup' name='class' value='$class' type='text' id='class' maxlength='200' class='round default-width-input' required></td>
                     <td>&nbsp;<br><br></td>
					 <td>
					 <td>&nbsp;&nbsp;Session &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </td>&nbsp;
                      <td><input class='addgroup' name='session' value='$session' type='text' id='session' maxlength='200' class='round default-width-input' required></td>
                     <td>&nbsp;<br><br></td>
					 <td>
                        &nbsp;&nbsp;<input type='submit' value='Submit'>
					 </td>
					</h3></tr>
				</form>
				&nbsp;&nbsp;";
				

		
	if (isset($_POST['borrower']) && isset($_POST['phone']) && isset($_POST['supervisor']) && isset($_POST['class']) && isset($_POST['session']))
	{
		$borrower = sanitizeString($_POST['borrower']);
		$phone = sanitizeString($_POST['phone']);
		$supervisor = sanitizeString($_POST['supervisor']);
		$class = sanitizeString($_POST['class']);
		$session = sanitizeString($_POST['session']);
		
		if (trim($borrower) == "" || trim($phone) == "" || trim($supervisor) == "" || trim($class) == "" || trim($session) == "")
		{
			echo $msg1; //if no text
		}
		
		else 
		{
			$check = queryMysql("SELECT borrow_name FROM borrower  WHERE borrow_name='$borrower'");

			if ($check -> num_rows > 0)
			{
				echo $msg2; //if text already in db
			}	
		
			else
			{
				queryMysql("ALTER TABLE borrower AUTO_INCREMENT=1");
				queryMysql("INSERT INTO borrower SET borrow_name='$borrower', telephone='$phone', supervisor='$supervisor', class='$class', session='$session'");
				echo $msg3; //if text not in db, insert text
			}
		}
	}
                
		echo	"</div>
			</div><h5><br><br>Copyright &copy; NieSe 2016<br><br></h5>";
				
	echo "</div></body></html>";
?>
