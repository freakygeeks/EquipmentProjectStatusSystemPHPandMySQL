<?php
	require_once 'header.php';
	
	if (!$loggedin) die();
	
	$item = $price = "";
	$msg1 = "<h3>&nbsp;&nbsp;No item name is enter.<br></h3>";
	$msg2 = "<h3>&nbsp;&nbsp;Item name already exist.<br></h3>";
	$msg3 = "<h3>&nbsp;&nbsp;Item name is updated.<br></h3>";

	if (isset($_GET['pid']))
	{
		$pid = sanitizeString($_GET['pid']);
	}
	
	echo "<div class='main'>";
	
	echo "<div id='content'>
				<div class='side-menu fl'>
					<h3>Quick Links</h3>
					<ul>
						<li><a href='add_item.php'>Add Item</a></li>
						<li><a href='item.php'>View Item</a></li>
				</div>
				
				<div class='side-content fr'>
					<div class='content-module'>
						<div class='content-module-heading cf'>
							<h3 class='fl'>Update Item</h3>
						</div>
					<div class='content-module-main cf'>
				
				&nbsp;&nbsp;

				<form name='formUpdate' method='post' id='formUpdate' action='update_item.php?pid=$pid'>        
                    <tr><h3>
					<td>&nbsp;</td>
					<td>Update Item : $pid </td><br><br>
                     <td>&nbsp; Item Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </td>&nbsp;";
					$query = queryMysql("SELECT item_name FROM item WHERE item_name='$pid' ORDER BY item_id");
					while ($row = $query -> fetch_array())
					{
						$item = $row['item_name'];
                     echo "<td><input class='addgroup' name='item' value='$item' type='text' id='item' maxlength='200' class='round default-width-input' required></td>";
                   	}
					echo "
					<td>&nbsp;<br><br></td>
					 <td>
					 <td>&nbsp;&nbsp;Item Price (RM) &nbsp;: </td>&nbsp;";
					 $query = queryMysql("SELECT price FROM item WHERE item_name='$pid' ORDER BY item_id");
					while ($row = $query -> fetch_array())
					{
						$price = $row['price'];
                     echo "<td><input class='addgroup' name='price' value='$price' type='text' id='item' maxlength='200' class='round default-width-input' required></td>";
					}
					echo "
					 <td>&nbsp;<br><br></td>
					 <td>
                        &nbsp;&nbsp;<input type='submit' value='Save'>
					 </td>
					</h3></tr>
				</form>
				&nbsp;&nbsp;";
				

		
	if (isset($_POST['item']) && isset($_POST['price']))
	{
		$item = sanitizeString($_POST['item']);
		$price = sanitizeString($_POST['price']);
		
		if (trim($item) == "" || trim($price) == "")
		{
			echo $msg1; //if no text
		}
		
		else 
		{
			$check = queryMysql("SELECT item_name FROM item WHERE item_name='$item'");

			if ($check -> num_rows > 0)
			{
				echo $msg2; //if text already in db
			}	
		
			else
			{
				queryMysql("UPDATE item SET item_name='$item', price='$price' WHERE item_name='$pid'");
				echo $msg3; //if text not in db, insert text
			}
		}
	}
                
		echo	"</div>
			</div><h5><br><br>Copyright &copy; NieSe 2016<br><br></h5>";
				
	echo "</div></body></html>";
?>
