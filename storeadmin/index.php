
<?php
 session_start();

 if(!isset($_SESSION['manager']))
 {
 header("location:admin_login.php");
 exit();
} 
  

 // Be sure to check that this manager SESSION value is in fact in the database
$managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); // filter everything but numbers and letters
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]); // filter everything but numbers and letters
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); // filter everything but numbers and letters
// Run mySQL query to be sure that this person is an admin and that their password session var equals the database information
// Connect to the MySQL database  
//include "../storescript/connect_to_mysql.php"; 
mysql_connect('localhost','root') or die ("could not connect to mysql");
mysql_select_db('store') or die ("no database");  
$sql = mysql_query("SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1"); // query the person
// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
$existCount = mysql_num_rows($sql); // count the row nums
if ($existCount == 0) { // evaluate the count
	 echo "Your login session data is not on record in the database.";
     exit();
}

?>



<!DOCTYPE html>
<html>
<head>
<title>Store Admin Area</title>

<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>

<body>
<div align="center" id="mainWrapper">
<?php
include_once("../template_header.php");
?>

<div id="pageContent">
Store Admin's content
<div align="left" style="margin-left:24px">
<h2>Hello manager </h2>
<a href="inventory_list.php"> Inventory list</a> </br>
<a href="#"> Something here</a>
</div>
</div>


<?php
include_once("../template_footer.php");
?>




</div>



</body>

</html>
