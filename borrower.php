<?php
	require_once 'header.php';
	
	if (!$loggedin) die();
	
	$search = $category = "";
	
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
						<li><a href='add_borrower.php'>Add Borrower</a></li>
						<li><a href='borrower.php'>View Borrower</a></li>
				</div>
				
				<div class='side-content fr'>
					<div class='content-module'>
						<div class='content-module-heading cf'>
							<h3 class='fl'>View Borrower </h3>
						</div>
					<div class='content-module-main cf'>
						<table>
						<br>
						<form name='search' method='post' id='formsearch' action='search_borrower.php'>
						
						&nbsp;&nbsp;<h3>&nbsp;&nbsp;Search Category &nbsp;
						<select name='category' class='searchgroup'>
							<option class='searchgroup' value='borrow_name'>Borrower Name</option>
							<option class='searchgroup' value='supervisor'>Supervisor</option>
							<option class='searchgroup' value='class'>Class</option>
							<option class='searchgroup' value='session'>Session</option>
						</select>
						
						&nbsp;&nbsp;&nbsp;&nbsp;<input class='addgroup' name='search' value='$search' type='text' placeholder='Search' required> 
						&nbsp;&nbsp;<input name='Search' type='submit' value='Search'>
						</form><br><br><br>";
						
						echo "<tr>
							<th>No</th>
							<th>Borrower Name</th>
							<th>Phone</th>
							<th>Supervisor</th>
							<th>Class</th>
							<th>Session</th>
							<th>Update</th>
							<th>Delete</th>									
						</tr>";
									
			/*** start of testing code3 ***/
			$query = queryMysql("SELECT * FROM borrower ORDER BY borrow_id LIMIT $start, $per_page"); // query to get messages from messages table
			
				$i = 0;
				while($row = $query -> fetch_array()) 
				{
					$i++;
					echo "<tr><h3>
						<td>"; echo $i+$start; echo"</td>
						<td>"; echo $row['borrow_name']; echo "</td>
						<td>"; echo $row['telephone']; echo "</td>
						<td>"; echo $row['supervisor']; echo "</td>
						<td>"; echo $row['class']; echo "</td>
						<td>"; echo $row['session']; echo "</td>
						<td><a href='update_borrower.php?pid="; echo $row['borrow_name']; echo "'><img class='update' src='dist/img/update.png'></a></td>
						<td><a href='delete_borrower.php?pid="; echo $row['borrow_name']; echo "'><img class='delete' src='dist/img/delete.png'></a></td>
					</h3></tr>";
				}
			
			$count_query = queryMysql("SELECT * FROM borrower"); // query to get total number of rows in messages table
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
				</div>";                  
					
	echo "</div><h5><br><br>NieSe&copy2016<br><br></h5></body></html>";	
?>
