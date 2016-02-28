<?php
	require_once 'header.php';
	
	if (!$loggedin) die();
	
	$result_item = queryMysql("SELECT * FROM item");
	$item_count = mysqli_num_rows($result_item);
	
	$result_equipment = queryMysql("SELECT * FROM equipment");
	$equipment_count = mysqli_num_rows($result_equipment);
	
	$result_borrower = queryMysql("SELECT * FROM borrower");
	$borrower_count = mysqli_num_rows($result_borrower);
	
	echo "<div class='main'>";
	
	echo "<div id='content'>
				<div class='side-menu fl'>
					<h3>Quick Links</h3>
					<ul>
						<li><a href='add_item.php'>Add Item</a></li>
						<li><a href='add_equipment.php'>Add Item Label</a></li>
						<li><a href='add_borrower.php'>Add Borrower</a></li>
						<li><a href='add_status.php'>Add Status</a></li>
						<li><a href='report.php'>View Report</a></li>
						<li><a href='change_pass.php'>Change Password</a></li></ul>
				</div>
						
						
			<div class='side-content fr'>
				<div class='content-module'>
					<div class='content-module-heading cf'>
						<h3 class='fl'>Statistics</h3>
				    </div> 
						<div class='content-module-main cf'>
								<table style='width:550px; float:left;' border='0' cellpadding='0' cellspacing='0'>
								  <tr>
									<td width='250' align='left'>&nbsp;</td>
									<td width='150' align='left'>&nbsp;</td>
								  </tr>
								  <tr>
									<td align='left'>&nbsp;</td>
									<td align='left'>&nbsp;</td>
								  </tr>
								  <tr>
									<td align='left'>Total Number of Item</td>
									<td align='left'>"; echo  $item_count; echo "&nbsp;</td>
								  </tr>
								  <tr>
									<td align='left'>&nbsp;</td>
									<td align='left'>&nbsp;</td>
								  </tr>
								  <tr>
									<td align='left'>Total Number of Item Label</td>
									<td align='left'>"; echo $equipment_count; echo "</td>
								  </tr>   
								  <tr>
									<td align='left'>&nbsp;</td>
									<td align='left'>&nbsp;</td>
								  </tr>
								  <tr>
									<td align='left'>Total Number of Borrower</td>
									<td align='left'>"; echo $borrower_count; echo "</td>
								  </tr>   
								  <tr>
									<td align='left'>&nbsp;</td>
									<td align='left'>&nbsp;</td>
								  </tr>
						</div>
					</table>
			</div>";
				
	echo "</div></body></html><h5><br><br>NieSe&copy2016<br><br></h5>";
?>









