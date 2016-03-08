<?php
	require_once 'header.php';
	
	if (!$loggedin) die();
	
	$status = "";
	$msg1 = "<h3>&nbsp;&nbsp;No status name is enter.<br></h3>";
	$msg2 = "<h3>&nbsp;&nbsp;Status name already exist.<br></h3>";
	$msg3 = "<h3>&nbsp;&nbsp;Status name is updated.<br></h3>";

	if (isset($_GET['pid']))
	{
		$pid = sanitizeString($_GET['pid']);
	}
	
	echo "<div class='main'>";
	
	echo "<div id='content'>
				<div class='side-menu fl'>
					<h3>Quick Links</h3>
					<ul>
						<li><a href='add_status.php'>Add Status</a></li>
						<li><a href='status.php'>View Status</a></li>
				</div>
				
				<div class='side-content fr'>
					<div class='content-module'>
						<div class='content-module-heading cf'>
							<h3 class='fl'>Update Status</h3>
						</div>
					<div class='content-module-main cf'>
				
				&nbsp;&nbsp;

				<form name='formUpdate' method='post' id='formUpdate' action='update_status.php?pid=$pid'>        
                    <tr><h3>
					<td>&nbsp;</td>
					<td>Update Status : $pid </td><br><br>
                     <td>&nbsp; Status Name &nbsp;&nbsp: </td>&nbsp;";
					$query = queryMysql("SELECT status_name FROM status WHERE status_name='$pid' ORDER BY status_id");
					while ($row = $query -> fetch_array())
					{
						$status = $row['status_name'];
                     echo "<td><input class='addgroup' name='status' value='$status' type='text' id='status' maxlength='200' class='round default-width-input' required></td>";
                   	}
					echo "
					<td>&nbsp;<br><br></td>
					 <td>
                         &nbsp;&nbsp;<input type='submit' value='Save'>
					 </td>
					</h3></tr>
				</form>
				&nbsp;&nbsp;";
				

		
	if (isset($_POST['status']))
	{
		$status = sanitizeString($_POST['status']);
				
		if (trim($status) == "")
		{
			echo $msg1; //if no text
		}
		
		else 
		{
			$query = queryMysql("SELECT status_name FROM status WHERE status_name='$status'");

			if ($query -> num_rows > 0)
			{
				echo $msg2; //if text already in db
			}	
		
			else
			{
				queryMysql("UPDATE status SET status_name='$status' WHERE status_name='$pid'");
				echo $msg3; //if text not in db, update text
			}
		}
	}
                
		echo	"</div>
			</div><h5><br><br>Copyright &copy; NieSe 2016<br><br></h5>";
				
	echo "</div></body></html>";
?>
