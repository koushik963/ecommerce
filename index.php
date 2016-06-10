<?php 

// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
// Run a select query to get my letest 6 items
// Connect to the MySQL database  
include "storescript/connet_to_mysql.php"; 
$dynamicList = "";
$sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC LIMIT 3");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $dynamicList .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a></td>
          <td width="83%" valign="top">' . $product_name . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $id . '">View Product Details</a></td>
        </tr>
      </table>';
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

<!--image slide show-->
<link rel="stylesheet" href="nivo-slider/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="nivo-slider/themes/default/default.css" type="text/css" media="screen" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="nivo-slider/jquery.nivo.slider.pack.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider();
});
</script>

</head>

<body >
<div align="center" id="mainWrapper">
<?php
include_once("template_header.php");
?>

<div id="pageContent" border="0">
<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td width="32%" valign="top"><h3 ><font color="">Take Our store Gift card</font></h3>
      
        <a href="http://localhost/projects/shop" ><img src="style/gift.jpg" width="100%"/></a>
      </td>
    <td width="35%" valign="top"><h3>Latest Designer Fashions</h3>
      <p><?php echo $dynamicList; ?><br />
        </p>
      <p><br />
      </p></td>
    <td width="83%" valign="top"><h3>Advertisements</h3>
	
     <!-- <video width="300" height="200" autoplay="autoplay" controls>
        <source src="adds/Niharika.mp4" type="video/mp4"> 
       </video>-->
	   <!--image slide show-->
	   <!-- Then somewhere in the <body> section -->
	   
	   <!--
	   <div class="slider-wrapper" height="100px">
    <div id="slider" class="nivoSlider">
        <img src="nivo-slider/demo/images/nemo.jpg" alt="" />
        <a href="http://dev7studios.com"><img src="nivo-slider/demo/images/toystory.jpg" alt="" title="#htmlcaption" /></a>
        <img src="nivo-slider/demo/images/up.jpg" alt="" title="This is an example of a caption" />
        <img src="nivo-slider/demo/images/walle.jpg" alt="" />
    </div>
    </div>
    <div id="htmlcaption" class="nivo-html-caption">
        <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
     </div>
   -->
 </td>
  </tr>
</table>
</div>


   
<!-- Image Slider Area -->

 <div class="slider-wrapper theme-default" style=" top:290px; righ:900px;left:800px;position: absolute; z-index: 1; visibility: show; min-height=600px">
    <div id="slider" class="nivoSlider">
        <img src="nivo-slider/demo/images/nemo.jpg" alt="" title="#htmlcaption"/>
       <img src="nivo-slider/demo/images/toystory.jpg" alt="" title="#htmlcaption" />
        <img src="nivo-slider/demo/images/up.jpg" alt="" title="#htmlcaption" />
        <img src="nivo-slider/demo/images/walle.jpg" alt="" title="#htmlcaption" />
    </div>
</div>
<div id="htmlcaption" class="nivo-html-caption">
    <strong>Watch cool Animation movies <a href="http://www.pixar.com/features_films" target="_blank">Here</a>.</strong>
</div>


<?php
include_once("template_footer.php");
?>




</div>



</body>

</html>
