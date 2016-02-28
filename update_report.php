<?php
	require_once 'header.php';
	require_once('calendar/tc_calendar.php');
	
	if (!$loggedin) die();
	
	$status = $borrower  = $returner = $dateBorrow = $dateReturn = "";
	$msg1 = "<h3>&nbsp;&nbsp;Please fill in all the required information.<br></h3>";
	$msg2 = "<h3>&nbsp;&nbsp;Item label report is updated.<br></h3>";

	if (isset($_GET['pid']))
	{
		$pid = sanitizeString($_GET['pid']);
	}
	
	echo "<div class='main'>";
	
	echo "<div id='content'>
				<div class='side-menu fl'>
					<h3>Quick Links</h3>
					<ul>
						<li><a href='report.php'>View Report</a></li>
				</div>
				
				<div class='side-content fr'>
					<div class='content-module'>
						<div class='content-module-heading cf'>
							<h3 class='fl'>Update Report</h3>
						</div>
					<div class='content-module-main cf'>
				
				&nbsp;&nbsp;

				<form name='formUpdate' method='post' id='formUpdate' action='update_report.php?pid=$pid'>        
                    <tr><h3>
					<td>&nbsp;</td>
					<td>Update Item Label Report : $pid </td>&nbsp;<br>";
					
					/** start testing drop down for status ***/
					
					$query = queryMysql("SELECT status FROM equipment WHERE equipment='$pid' ORDER BY equipment_id");
					while ($row = $query -> fetch_array())
					{
						$status = $row['status'];
								
					echo "&nbsp;&nbsp;<h3>&nbsp;&nbsp;Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;";
					echo "<select name='statusCat' class='addgroup' required>
						 <option class='addgroup' value='"; echo "'>"; echo $status;  echo "</option>";
					}
					
					$queryStatus = queryMysql("SELECT status_id,status_name FROM status ORDER BY status_id");
						while($row = $queryStatus -> fetch_array()) 
						{
							$status = $row['status_name'];
							echo "<option class='addgroup' value='"; echo $status; echo "'>"; echo $status; echo "</option>";
						}				
					echo "</select><br>";
					/*** end testing drop down for status ***/
	
					/** start testing drop down for borrower ***/
					$query = queryMysql("SELECT borrower FROM equipment WHERE equipment='$pid' ORDER BY equipment_id");
					while ($row = $query -> fetch_array())
					{
						$borrower = $row['borrower'];
					
					echo "&nbsp;&nbsp;<h3>&nbsp;&nbsp;Borrower &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;";
					echo "<select name='borrowerCat' class='addgroup' required>
						 <option class='addgroup' value='"; echo "'>"; echo $borrower;  echo "</option>";
					}
					
					$queryBorrower = queryMysql("SELECT borrow_id,borrow_name FROM borrower ORDER BY borrow_id");
						while($row = $queryBorrower -> fetch_array()) 
						{
							$borrower = $row['borrow_name'];
							echo "<option class='addgroup' value='"; echo $borrower; echo "'>"; echo $borrower; echo "</option>";
						}				
					echo "</select><br>";
					/*** end testing drop down for borrower ***/
					
					/** start testing drop down for dateborrow ***/
					$query = queryMysql("SELECT dateBorrow FROM equipment WHERE equipment='$pid' ORDER BY equipment_id");
					while ($row = $query -> fetch_array())
					{
						$dateBorrow = $row['dateBorrow'];
					
					echo "&nbsp;&nbsp;<h3>&nbsp;&nbsp;Date Borrow &nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;"; echo $dateBorrow;
					}
					
					$myCalendar = new tc_calendar("dateBorrow", true, false);
					$myCalendar->setIcon("calendar/images/iconCalendar.gif");
					$myCalendar->setDate(1, date('m'), date('Y'));
					$myCalendar->setPath("calendar/");
					$myCalendar->setYearInterval(2000, 2030);
					//$myCalendar->autoSubmit(true, "form1");
					$myCalendar->setAlignment('left', 'bottom');
					$myCalendar->setAutoHide(true, 10000); //10 secs
					$myCalendar->showWeeks(true);
					$myCalendar->startMonday(true);
					$myCalendar->writeScript();
					
					echo "<br>";
					/*** end testing drop down for dateborrow ***/
					
					/** start testing drop down for returner ***/
					$query = queryMysql("SELECT returner FROM equipment WHERE equipment='$pid' ORDER BY equipment_id");
					while ($row = $query -> fetch_array())
					{
						$returner = $row['returner'];
						
					echo "&nbsp;&nbsp;<h3>&nbsp;&nbsp;Returner &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;";
					echo "<select name='returnerCat' class='addgroup' required>
						  <option class='addgroup' value='"; echo "'>"; echo $returner;  echo "</option>";
					}
					
					$queryReturner = queryMysql("SELECT borrow_id,borrow_name FROM borrower ORDER BY borrow_id");
						while($row = $queryReturner -> fetch_array()) 
						{
							$returner = $row['borrow_name'];
							echo "<option class='addgroup' value='"; echo $returner; echo "'>"; echo $returner; echo "</option>";
						}				
					echo "</select><br>";
					/*** end testing drop down for returner ***/
	
					/** start testing drop down for datereturn ***/
					$query = queryMysql("SELECT dateReturn FROM equipment WHERE equipment='$pid' ORDER BY equipment_id");
					while ($row = $query -> fetch_array())
					{
						$dateReturn = $row['dateReturn'];
					
					echo "&nbsp;&nbsp;<h3>&nbsp;&nbsp;Date Return &nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;"; echo $dateReturn;
					}
					
					$myCalendar = new tc_calendar("dateReturn", true, false);
					$myCalendar->setIcon("calendar/images/iconCalendar.gif");
					$myCalendar->setDate(1, date('m'), date('Y'));
					$myCalendar->setPath("calendar/");
					$myCalendar->setYearInterval(2000, 2030);
					//$myCalendar->autoSubmit(true, "form1");
					$myCalendar->setAlignment('left', 'bottom');
					$myCalendar->setAutoHide(true, 10000); //10 secs
					$myCalendar->showWeeks(true);
					$myCalendar->startMonday(true);
					$myCalendar->writeScript();
					
					echo "<br>";
					/*** end testing drop down for datereturn ***/
	
	
					echo "
					<br><td>&nbsp;
                        <input type='submit' value='Save'>
					 </td>
					</h3></tr>
				</form>
				&nbsp;&nbsp;";
					
	if (isset($_POST['statusCat']) && isset($_POST['borrowerCat']) && isset($_POST['returnerCat']) && isset($_POST['dateBorrow']) && isset($_POST['dateReturn']))
	{
		$status = sanitizeString($_POST['statusCat']);
		$borrower = sanitizeString($_POST['borrowerCat']);
		$returner = sanitizeString($_POST['returnerCat']);
		$dateBorrow = sanitizeString($_POST['dateBorrow']);
		$dateReturn = sanitizeString($_POST['dateReturn']);
		
		if (trim($status) == ""|| trim($borrower) == "" || trim($returner) == "" || trim($dateBorrow) == "" || trim($dateReturn) == "")
		{
			echo $msg1; //if no text
		}
		
		else 
		{				
			queryMysql("UPDATE equipment SET status='$status', borrower='$borrower', returner='$returner', dateBorrow='$dateBorrow', dateReturn='$dateReturn' WHERE equipment='$pid'");
			echo $msg2; //update status, borrower and returner
		}
	}
                
		echo	"</div>
			</div><h5><br><br>NieSe&copy2016<br><br></h5>";
				
	echo "</div></body></html>";
?>
