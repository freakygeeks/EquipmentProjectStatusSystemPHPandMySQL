<?php
	require_once 'header.php';
	
	if (!$loggedin) die();
	
	$search = $cat = $temp = "";
	$msg1 = "<h3>&nbsp;&nbsp;No text is enter to be search.<br></h3>";
	$msg2 = "result exist in database.";
	$msg3 = "<h3>&nbsp;&nbsp;No result in database.<br></h3>";
	
	$start = 0; // Variables for the first page hit
	$page_counter = 0;
    $per_page = 50;
    $next = $page_counter + 1;
    $previous = $page_counter - 1;
	
	if (isset($_GET['q']))
	{
		$temp = sanitizeString($_GET['q']);
	}
	
	if (isset($_GET['c']))
	{
		$cat = sanitizeString($_GET['c']);
	}
	
	if (isset($_POST['search'])) //if search, search page
	{				
		$search = sanitizeString($_POST['search']);
		$_SESSION['search'] = $search;
		$temp = $_SESSION['search'];
	}
	if (isset($_POST['category'])) //if search, search page
	{				
		$category = sanitizeString($_POST['category']);
		$_SESSION['category'] = $category;
		$cat = $_SESSION['category'];
	}
	
	if(isset($_GET['start']))  // Check the page location with start value sent by get request and change variable values accordingly
	{
		$start = sanitizeString($_GET['start']);
		$page_counter =  $_GET['start'];
		$start = $start *  $per_page;
		$next = $page_counter + 1;
		$previous = $page_counter - 1;
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
							<h3 class='fl'>Search Item Label </h3>
						</div>
					<div class='content-module-main cf'>
						<table>
						<br>
						<form name='search' method='post' action='search_equipment.php'>
						
						&nbsp;&nbsp;<h3>&nbsp;&nbsp;Search Category &nbsp;
						<select name='category' class='searchgroup'>
							<option class='searchgroup' value='item' "; if ($cat=='item') echo 'selected="selected"'; echo ">Item Name</option>
							<option class='searchgroup' value='equipment' "; if ($cat=='equipment') echo 'selected="selected"'; echo ">Item Label</option>
						</select>
						
						&nbsp;&nbsp;<input class='addgroup' name='search' value='$search' type='text' placeholder='Search Text' required>
						&nbsp;&nbsp;<input name='Search' type='submit' value='Search'>
						</form><br><br>";
						
						echo "<tr>
							<th>No</th>
							<th>Item Name</th>
							<th>Item Label </th>
							<th>Price </th>
							<th>Update</th>
							<th>Delete</th>									
						</tr>";
							
							
				if ($search == " ")
				{
					echo $msg1; //if no text
				}
				else 
				{
					$query = queryMysql("SELECT equipment_id,item,equipment,price FROM equipment WHERE $cat LIKE '%$temp%' ORDER BY equipment_id LIMIT $start, $per_page");

					if ($query -> num_rows > 0)
					{
							$count_query = queryMysql("SELECT item FROM equipment WHERE $cat LIKE '%$temp%'");
							$count = $count_query -> num_rows;
							 
							echo $msg = "<h3>&nbsp;&nbsp;$count $msg2</h3>";  //if text already in db
						
							$i = 0;
							while($row = $query -> fetch_array()) 
							{
								$i++;
								echo "<tr><h3>
								<td>"; echo $i+$start; echo"</td>
								<td>"; echo $row['item']; echo "</td>
								<td>"; echo $row['equipment']; echo "</td>
								<td>"; echo "RM "; echo $row['price']; echo "</td>
								<td><a href='update_equipment.php?pid="; echo $row['equipment']; echo "'><img class='update' src='dist/img/update.png'></a></td>
								<td><a href='delete_equipment.php?pid="; echo $row['equipment']; echo "'><img class='delete' src='dist/img/delete.png'></a></td>
								</h3></tr>";
							}
						
						/*** start test code for search pagination **/
						
							$paginations = ceil($count / $per_page); // calculate number of paginations required based on row count 
					
							echo "</div></table>
							</div>";

							echo "<div>";
							echo "<ul class='paginate pag2 clearfix'>";
							
							if($page_counter == 0) 
							{
								echo "<li><a href=?start='0'&q=$temp&c=$cat class=single>0</a></li>"; //&search=$temp
								for ($j=1; $j < $paginations; $j++) 
								{ 
									echo "<li><a href=?start=$j&q=$temp&c=$cat class=single>".$j. "</a></li>";
								}
							}
							else
							{
								echo "<li><a href=?start=$previous&q=$temp&c=$cat class=single>Previous</a></li>"; 
								for ($j=0; $j < $paginations; $j++) 
								{
									if ($j == $page_counter) 
									{
										echo "<li><a href=?start=$j&q=$temp&c=$cat class=single>".$j."</a></li>";
									}
									else
									{
										echo "<li><a href=?start=$j&q=$temp&c=$cat class=single>".$j."</a></li>";
									} 
								}
								if($j != $page_counter+1)
									echo "<li><a href=?start=$next&q=$temp&c=$cat class=single>Next</a></li>"; 
							}
				
						/*** end test code for search pagination ***/		
							echo "</ul>
						</div>";
					}
					else
					{
						echo $msg3; //if text not in db
					}
				}
	echo "</div></body></html>";	
?>
