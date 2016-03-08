<?php
	require_once 'header.php';
	
	if (!$loggedin) die();
	
	$msg1 = "<h3>&nbsp;&nbsp;Status is successfully deleted.<br></h3>";

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
							<h3 class='fl'>Delete Status</h3>
						</div>
					<div class='content-module-main cf'>
				
				&nbsp;&nbsp;

				<form name='formUpdate' method='post' id='formUpdate' action='delete_status.php?pid=$pid'>        
                    <tr><h3>
					<td>&nbsp;</td>
					<td>Delete Status : $pid </td>&nbsp;
					</h3></tr>
				</form>
				&nbsp;&nbsp;";
				
	if (isset($_GET['pid']))
	{
		$pid = sanitizeString($_GET['pid']);
		
		$check = queryMysql("SELECT status_name FROM status WHERE status_name='$pid'");
				
		if ($check -> num_rows > 0)
		{
			queryMysql("DELETE FROM status WHERE status_name='$pid'");
			echo $msg1; //if text not in db, update text
		}
	}

                
		echo	"</div>
			</div><h5><br><br>Copyright &copy; NieSe 2016<br><br></h5>";
				
	echo "</div></body></html>";
?>
