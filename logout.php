<?php
	require_once 'header.php';
	
	if (isset($_SESSION['user']))
	{
		destroySession();
		header('location: index.php');
	}
	
	else 
		echo "<div class='main'><br>" .
		"You cannot log out because you are not logged in";
?>
	</br><br></div>
	<h5><br><br>Copyright &copy; NieSe 2016<br><br></h5></body>
</html>
