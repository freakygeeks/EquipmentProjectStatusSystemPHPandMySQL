<?php
	require_once 'header.php';
	
	if (!$loggedin) die();
	
	$item = $equipment = $price = "";
	$msg1 = "<h3>&nbsp;&nbsp;No equipment label is enter.<br></h3>";
	$msg2 = "<h3>&nbsp;&nbsp;Item label already exist.<br></h3>";
	$msg3 = "<h3>&nbsp;&nbsp;Item label is updated.<br></h3>";

	if (isset($_GET['pid']))
	{
		$pid = sanitizeString($_GET['pid']);
	}
	
	echo "<div class='main'>";
	
	echo "<div id='content'>
				<div class='side-menu fl'>
					<h3>Quick Links</h3>
					<ul>
						<li><a href='add_equipment.php'>Add Item Label</a></li>
						<li><a href='equipment.php'>View Item Label</a></li>
				</div>
				
				<div class='side-content fr'>
					<div class='content-module'>
						<div class='content-module-heading cf'>
							<h3 class='fl'>Update Item Label</h3>
						</div>
					<div class='content-module-main cf'>
				
				&nbsp;&nbsp;

				<form name='formUpdate' method='post' id='formUpdate' action='update_equipment.php?pid=$pid'>        
                    <tr><h3>
					<td>&nbsp;</td>
					<td>Update Item Label : $pid </td>&nbsp;<br>";
					
					
					/** start testing drop down for item ***/
					$query = queryMysql("SELECT item FROM equipment WHERE equipment='$pid' ORDER BY equipment_id");
					while ($row = $query -> fetch_array())
					{
						$item = $row['item'];
					
					echo "&nbsp;&nbsp;<h3>&nbsp;&nbsp;Item Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;";
					echo "<select name='itemCat' class='addgroup' required>
						  <option class='addgroup' value='"; echo "'>"; echo $item;  echo "</option>";
					}
					
					$queryItem = queryMysql("SELECT item_id,item_name,price FROM item ORDER BY item_id");
						while($row = $queryItem -> fetch_array()) 
						{
							$item = $row['item_name'];
							echo "<option class='addgroup' value='"; echo $item; echo "'>"; echo $item; echo "</option>";
						}				
					echo "</select><br>";
					/*** end testing drop down for item ***/
	
					echo "&nbsp;&nbsp;<h3>&nbsp;&nbsp;Item Label &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;";
					$query = queryMysql("SELECT equipment FROM equipment WHERE equipment='$pid' ORDER BY equipment_id");
					while ($row = $query -> fetch_array())
					{
						$equipment = $row['equipment'];
                     echo "<td><input name='equipment' value='$equipment' type='text' id='equipment' class='round default-width-input addgroup' required></td><br><br>";
					}
					echo "
					<td>&nbsp;</td>
					<td>
                        <input type='submit' value='Save'>
					 </td>
					</h3></tr>
				</form>
				&nbsp;&nbsp;";
					
	if (isset($_POST['itemCat']) && isset($_POST['equipment']))
	{
		$item = sanitizeString($_POST['itemCat']);
		$equipment = sanitizeString($_POST['equipment']);
		
		if (trim($equipment) == "")
		{
			echo $msg1; //if no text
		}
		
		else 
		{
			$check = queryMysql("SELECT equipment FROM equipment WHERE equipment='$equipment' ORDER BY equipment_id");

			if ($check -> num_rows > 0)
			{
				echo $msg2; //if text already in db
			}	
		
			else
			{
				$queryPrice = queryMysql("SELECT price from item WHERE item_name='$item'");
				while($row = $queryPrice -> fetch_array())
				{
					$price = $row['price'];
				
					queryMysql("UPDATE equipment SET item='$item', equipment='$equipment', price='$price' WHERE equipment='$pid'");
					echo $msg3; //if text not in db, insert text
				}
			}
		}
	}
                
		echo	"</div>
			</div><h5><br><br>NieSe&copy2016<br><br></h5>";
				
	echo "</div></body></html>";
?>
