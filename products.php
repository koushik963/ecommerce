<?php 

error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
// Run a select query to get my letest 6 items
// Connect to the MySQL database  
include "storescript/connet_to_mysql.php"; 
$dynamicList = "";
$cartOutput =" ";
$count=0;
$sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC ");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
             $id1 = $row["id"];
			 $product_name1 = $row["product_name"];
			 $price1 = $row["price"];
			 $date_added1 = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 if($count==0)
			 {
			 $cartOutput .= "<tr>";
			 }
		$cartOutput .= '<td border="0"><a href="product.php?id=' . $id1 . '">' . $product_name1 . '</a><br /><a href="product.php?id=' . $id1 . '"><img src="inventory_images/' . $id1 . '.jpg" alt="' . $product_name1. '" width="200" height="200" border="1" /></a>' .'</br>'.'price'.'$'. $price1 . '</td>';
		
		
		$count=$count+1;
		if($count==4)
		{
		$cartOutput .= "</tr>";
		$count=0;
		}
		/*	 $dynamicList .= '<table width="50%" border="1" cellspacing="0" cellpadding="6">
        <tr>
          <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a>
        ' . $product_name . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $id . '">View Product Details</a>
        </tr>
      </table>';*/
    }
} else {
	$dynamicList = "We have no products listed in our store yet";
}
mysql_close();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Store Home Page</title>
<link rel="shortcut icon" href="style/favicon.ico" />
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
<style>
#pageContent
{
min-height:550px;
}
</style>
</head>

<body >
<div align="center" id="mainWrapper">
<?php
include_once("template_header.php");
?>

<div id="pageContent" >
<table width="100%"border="0">
      <?php echo $cartOutput; ?>
	  </table>
</div>


<?php
include_once("template_footer.php");
?>




</div>



</body>

</html>
