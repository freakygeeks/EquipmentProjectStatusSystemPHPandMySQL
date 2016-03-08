<?php
	require_once 'header.php';
	
	if (!$loggedin) die();
	
	$search = $category = "";
	
	$start = 0; // Variables for the first page hit
	$page_counter = 0;
    $per_page = 50;
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
					<h3>Report</h3>
					<ul>
						<li><a href='report.php'>View Report</a></li>
				</div>
				
				<div class='side-content fr'>
					<div class='content-module'>
						<div class='content-module-heading cf'>
							<h3 class='fl'>View Report</h3>
						</div>
					<div class='content-module-main cf'>
						<table>
						<br>
							<form name='search' method='post' id='formsearch' action='search_report.php'>
						
						&nbsp;&nbsp;<h3>&nbsp;&nbsp;Search Category &nbsp;
						<select name='category' class='searchgroup'>
							<option class='searchgroup' value='status'>Status</option>
							<option class='searchgroup' value='equipment'>Item Label</option>
							<option class='searchgroup' value='item'>Item Name</option>
							<option class='searchgroup' value='borrower'>Borrower</option>
							<option class='searchgroup' value='returner'>Returner</option>
						</select>
						
						&nbsp;&nbsp;&nbsp;&nbsp;<input class='addgroup' name='search' value='$search' type='text' placeholder='Search' required> 
						&nbsp;&nbsp;<input name='Search' type='submit' value='Search'>
						</form><br><br><br>";
						
					echo "	<tr>
							<th>No</th>
							<th>Status</th>
							<th>Item Label</th>
							<th>Item Name</th>
							<th>Borrower</th>
							<th>Date Borrow</th>
							<th>Returner</th>
							<th>Date Return</th>
							<th>Update</th>								
						</tr>";
	
	$query = queryMysql("SELECT * FROM equipment ORDER BY equipment_id LIMIT $start, $per_page"); 
		
		$i = 0; 
		while($row = $query -> fetch_array())
		{		
			$i++; 
			echo "<tr><h3>
	
				<td>"; echo $i+$start; echo "</td>
				<td>"; echo $row['status']; echo "</td>
				<td>"; echo $row['equipment']; echo "</td>
				<td>"; echo $row['item']; echo "</td>
				<td>"; echo $row['borrower']; echo "</td>
				<td>"; echo $row['dateBorrow']; echo "</td>
				<td>"; echo $row['returner']; echo "</td>
				<td>"; echo $row['dateReturn']; echo "</td>
				<td><a href='update_report.php?pid="; echo $row['equipment']; echo "'><img class='update' src='dist/img/update.png'></a></td>
			</h3></tr>";
		}
		
			$count_query = queryMysql("SELECT * FROM equipment"); // query to get total number of rows in messages table
			$count = $count_query -> num_rows;
			
			$paginations = ceil($count / $per_page); // calculate number of paginations required based on row count 
			
				
		echo "</table></div>
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
			</div><h5><br><br>Copyright &copy; NieSe 2016<br><br></h5>";     
				
	echo "</div></body></html>";
?>
