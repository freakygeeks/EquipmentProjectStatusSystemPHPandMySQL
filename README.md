This is my Equipment Project System Inventory created to keep track the status of project equipment developed using PHP language and MySQL database.

To compile and use this sytem. Please follow steps as below:
1. Install xampp in your Window or Linux
2. Please change the code in functions.php as per your mysql username and mysql password.
	$dbhost = 'localhost';
	$dbname = 'eproject';
	$dbuser = 'dbuser'; #you need to write your mysql username
	$dbpass = 'dbpass'; #you need to write your mysql password
	$appname = "Welcome to Equipment Project Status System";

3. Create a database name eproject and then import .sql file in the \data folder into that database.
4. Password for this system can be retrieve from table "members" after importing the .sql into MySQL database.
   e.g : username - haziq
		 password - haziq

That's all. Happy learning!

If you did find any bug in this system or if you have updated and upgraded the module in this system, feel free to share it with me and to pull request from my repository.
Your contribution is highly appreciated.
