<?php
	require_once 'header.php';
	
	if (!$loggedin) die();
	
	$borrower = $phone = $supervisor = $class = $session = "";
	$msg1 = "<h3>&nbsp;&nbsp;No borrower name is enter.<br></h3>";
	$msg2 = "<h3>&nbsp;&nbsp;Borrower name already exist.<br></h3>";
	$msg3 = "<h3>&nbsp;&nbsp;Borrower name is updated.<br></h3>";

	if (isset($_GET['pid']))
	{
		$pid = sanitizeString($_GET['pid']);
	}
	
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
							<h3 class='fl'>Update Borrower</h3>
						</div>
					<div class='content-module-main cf'>
				
				&nbsp;&nbsp;

				<form name='formUpdate' method='post' id='formUpdate' action='update_borrower.php?pid=$pid'>        
                    <tr><h3>
					<td>&nbsp;</td>
					<td>Update Borrower : $pid </td><br><br>
					
                     <td>&nbsp;</td>
					<td>Borrower Name : </td>&nbsp;";
					$query = queryMysql("SELECT borrow_name FROM borrower WHERE borrow_name='$pid' ORDER BY borrow_id");
					while ($row = $query -> fetch_array())
					{
						$borrower = $row['borrow_name'];
					
                     echo "<td><input class='addgroup' name='borrower' value='$borrower' type='text' id='borrower' maxlength='200' class='round default-width-input' required></td>";
					}
					echo "
				   <td>&nbsp;<br><br></td>
					 <td>
					 <td>&nbsp;&nbsp;Phone Number &nbsp;: </td>&nbsp;";
					$query = queryMysql("SELECT telephone FROM borrower WHERE borrow_name='$pid' ORDER BY borrow_id");
					while ($row = $query -> fetch_array())
					{
						$phone = $row['telephone'];
					
                     echo "<td><input class='addgroup' name='phone' value='$phone' type='text' id='phone' maxlength='200' class='round default-width-input' required></td>";
					}
					echo "
					 <td>&nbsp;<br><br></td>
					 <td>
					 <td>&nbsp;&nbsp;Supervisor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </td>&nbsp;";
					$query = queryMysql("SELECT supervisor FROM borrower WHERE borrow_name='$pid' ORDER BY borrow_id");
					while ($row = $query -> fetch_array())
					{
						$supervisor = $row['supervisor'];
                     echo "<td><input class='addgroup' name='supervisor' value='$supervisor' type='text' id='supervisor' maxlength='200' class='round default-width-input' required></td>";
					}
					echo "
					 <td>&nbsp;<br><br></td>
					 <td>
					 <td>&nbsp;&nbsp;Class &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </td>&nbsp;";
					$query = queryMysql("SELECT class FROM borrower WHERE borrow_name='$pid' ORDER BY borrow_id");
					while ($row = $query -> fetch_array())
					{
						$class = $row['class'];
                     echo "<td><input class='addgroup' name='class' value='$class' type='text' id='class' maxlength='200' class='round default-width-input' required></td>";
					}
					echo "
					 <td>&nbsp;<br><br></td>
					 <td>
					 <td>&nbsp;&nbsp;Session &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </td>&nbsp;";
					$query = queryMysql("SELECT session FROM borrower WHERE borrow_name='$pid' ORDER BY borrow_id");
					while ($row = $query -> fetch_array())
					{
						$session = $row['session'];
                     echo "<td><input class='addgroup' name='session' value='$session' type='text' id='session' maxlength='200' class='round default-width-input' required></td>";
					}
					echo "
					 <td>&nbsp;<br><br></td>
					
					<td>
                        &nbsp;&nbsp;<input type='submit' value='Save'>
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
				queryMysql("UPDATE borrower SET borrow_name='$borrower', telephone='$phone', supervisor='$supervisor', class='$class', session='$session' WHERE borrow_name='$pid'");
				echo $msg3; //if text not in db, insert text
			}
		}
	}
                
		echo	"</div>
			</div><h5><br><br>Copyright &copy; NieSe 2016<br><br></h5>";
				
	echo "</div></body></html>";
?>
