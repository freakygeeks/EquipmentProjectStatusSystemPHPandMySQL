<?php
	require_once 'header.php';
	
	if (!$loggedin) die();
	
	$search = "";
	
	$start = 0; // Variables for the first page hit
	$page_counter = 0;
    $per_page = 20;
    $next = $page_counter + 1;
    $previous = $page_counter - 1;
	
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
						<li><a href='add_item.php'>Add Item</a></li>
						<li><a href='item.php'>View Item</a></li>
				</div>
				
				<div class='side-content fr'>
					<div class='content-module'>
						<div class='content-module-heading cf'>
							<h3 class='fl'>View Item </h3>
						</div>
					<div class='content-module-main cf'>
						<table>
						<br>
						<form name='search' method='post' id='formsearch' action='search_item.php'>
						&nbsp;&nbsp;&nbsp;&nbsp;<input class='addgroup' name='search' value='$search' type='text' placeholder='Search' required> 
						&nbsp;&nbsp;<input name='Search' type='submit' value='Search'>
						</form><br><br><br>";
						
						echo "<tr>
							<th>No</th>
							<th>Item Name</th>
							<th>Item Price</th>
							<th>Update</th>
							<th>Delete</th>									
						</tr>";
									
			/*** start of testing code3 ***/
			$query = queryMysql("SELECT item_id,item_name,price FROM item ORDER BY item_id LIMIT $start, $per_page"); // query to get messages from messages table
			
				$i = 0;
				while($row = $query -> fetch_array()) 
				{
					$i++;
					echo "<tr><h3>
						<td>"; echo $i+$start; echo"</td>
						<td>"; echo $row['item_name']; echo "</td>
						<td>"; echo "RM "; echo $row['price']; echo "</td>
						<td><a href='update_item.php?pid="; echo $row['item_name']; echo "'><img class='update' src='dist/img/update.png'></a></td>
						<td><a href='delete_item.php?pid="; echo $row['item_name']; echo "'><img class='delete' src='dist/img/delete.png'></a></td>
					</h3></tr>";
				}
			
			$count_query = queryMysql("SELECT * FROM item"); // query to get total number of rows in messages table
			$count = $count_query -> num_rows;
			
			$paginations = ceil($count / $per_page); // calculate number of paginations required based on row count 
			
			echo "</div></table>
			</div>";

			echo "<div>";
				echo "<ul class='paginate pag2 clearfix'>";
                    if($page_counter == 0) 
					{
						echo "<li><a href=?start='0' class=single>0</a></li>";
						for ($j=1; $j < $paginations; $j++) 
						{ 
							echo "<li><a href=?start=$j class=single>".$j. "</a></li>";
						}
                    }
					else
					{
                        echo "<li><a href=?start=$previous class=single>Previous</a></li>"; 
                        for ($j=0; $j < $paginations; $j++) 
						{
							if ($j == $page_counter) 
							{
								echo "<li><a href=?start=$j class=single>".$j."</a></li>";
							}
							else
							{
								echo "<li><a href=?start=$j class=single>".$j."</a></li>";
							} 
						}
						if($j != $page_counter+1)
							echo "<li><a href=?start=$next class=single>Next</a></li>"; 
                    }   
						  
				echo "</ul>
				</div><h5><br><br>NieSe&copy2016<br><br></h5>";                  
					
	echo "</div></body></html>";	
?>
