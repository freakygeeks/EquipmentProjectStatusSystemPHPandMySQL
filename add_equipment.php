<?php
	require_once 'header.php';
	
	if (!$loggedin) die();
	
	$item = $equipment = $price = "";
	$msg1 = "<h3>&nbsp;&nbsp;Please fill in all the required information.<br></h3>";
	$msg2 = "<h3>&nbsp;&nbsp;Item Label already exist.<br></h3>";
	$msg3 = "<h3>&nbsp;&nbsp;Item Label is added.<br></h3>";

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
							<h3 class='fl'> Add Item Label</h3>
						</div>
					<div class='content-module-main cf'>
				
				&nbsp;&nbsp;

				<form name='formAdd' method='post' id='formAdd' action='add_equipment.php'>        
                    <tr><h3>
					<td>&nbsp;</td>";
					
					/** start testing drop down for item ***/
					echo "&nbsp;&nbsp;<h3>&nbsp;&nbsp;Item Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;";
					echo "<select name='itemCat' class='addgroup' required>
						  <option class='addgroup' value=''> ---------------All Item Name-------------------</option>";
					$queryItem = queryMysql("SELECT item_id,item_name,price FROM item ORDER BY item_id");
						while($row = $queryItem -> fetch_array()) 
						{
							$item = $row['item_name'];
							echo "<option class='addgroup' value='"; echo $item; echo "'>"; echo $item; echo "</option>";
						}				
					echo "</select><br>";
					/*** end testing drop down for item ***/
	
					echo "&nbsp;&nbsp;<h3>&nbsp;&nbsp;Item Label &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;
                      <td><input name='equipment' value='$equipment' type='text' id='equipment' class='round default-width-input addgroup' required></td><br><br>
					<td>&nbsp;</td>
					<td>
                        <input type='submit' value='Submit'>
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
				
					queryMysql("ALTER TABLE equipment AUTO_INCREMENT=1");
					queryMysql("INSERT INTO equipment SET item='$item', equipment='$equipment', price='$price'");
				}
				echo $msg3; //if text not in db, insert text
			}
		}
	}
                
		echo	"</div>
			</div><h5><br><br>Copyright &copy; NieSe 2016<br><br></h5>" ;
				
	echo "</div></body></html>";
?>
