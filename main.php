<?php
// Start the session
session_start();

if (isset($_POST["submit"]) && !empty($_POST["submit"])) {//if an add to cart button was pressed

$current_quantity=intval($_SESSION[$_POST['gadget_type']][$_POST['model']]['quantity']);
$_SESSION[$_POST['gadget_type']][$_POST['model']]['quantity']=$current_quantity+intval($_POST['quantity']);


}
else
{
include 'products.php';//to load the sale products
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
    background-color: #E0E0E0 ;
}
#header {
    background-color:white;
    text-align:center;
    padding:5px;
	width:80%;
	margin-left: 10%;
}
#nav {
    line-height:30px;
    background-color:white;
    height:100%;
    width:10%;
    float:left;
    padding:5px;
    margin-left: 10%;
	margin-top: 1%;
}
#section {
    width:46%;
	margin-top: 1%;
	float:left;
	background-color: white;
    padding:5px;
    margin-left: 1%;	
}
#checkout{
    width:20.5%;
	margin-top: 1%;
	float:left;
	background-color: white;
    padding:5px;
    margin-left: 1%;	 
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){//used to implement the filters
    $("#Phones").click(function(){
        $("#phones").show(1000);
		$("#tablets").hide(1000);
		$("#wearables").hide(1000);
    });
    $("#Tablets").click(function(){
        $("#phones").hide(1000);
		$("#tablets").show(1000);
		$("#wearables").hide(1000);
    });
	$("#Wearables").click(function(){
        $("#phones").hide(1000);
		$("#tablets").hide(1000);
		$("#wearables").show(1000);
    });
	$("#All").click(function(){
	    $("#phones").show(1000);
		$("#tablets").show(1000);
		$("#wearables").show(1000);
	
	});
	});
</script>

</head>
<!--Body Starts-------------------------------------------------------------------------------------------------------->
<body>
<div id='header'>
<h2>Welcome to Aishwarya's test website!</h2>
</div>

<div id="nav">
Filter gadgets:<br>
<!--Filter buttons-->
<button id="Phones">Phones</button><br>
<button id="Tablets">Tablets</button><br>
<button id="Wearables">Wearables</button><br>
<button id="All">All gadgets</button><br>
</div>
<div id="section"> 
<div id="phones">
<h3>Select the phones</h3>
<table>
  <tr>
  
    <td>Phone Model</td>
	<td>Price</td>
    <td>Quantity</td> 
    <td></td>
	
  </tr>
  
  <?php
  foreach ($_SESSION['phones'] as $model => $details ) //to display all the phones
  {
  echo "
  <form method='POST'>
  <tr>
    <td><input type='hidden' name='model' value='".$model."'>".$model."</td>
	<td><input type='hidden' name='price' value='".$details['price']."'>".$details['price']."</td>
    <td><input type='number' name='quantity' style='width: 40px;'></td> 
	<td><input type='hidden' name='gadget_type' value='phones'></td> 
    <td><input type='submit' name='submit' value='Add to cart'></td>
  </tr>
   </form>
  ";//hidden fields to update the fields
  }
  ?>
  
 
</table>

</div>

 
<div id="tablets">
<h3>Select the tablets</h3>
<table>
  <tr>
  
    <td>Tablet Model</td>
	<td>Price</td>
    <td>Quantity</td> 
    <td></td>
	
  </tr>
  
  <?php
  foreach ($_SESSION['tablets'] as $model => $details ) //to display all the tablets
  {
  echo "
  <form method='POST'>
  <tr>
    <td><input type='hidden' name='model' value='".$model."'>".$model."</td> 
	<td><input type='hidden' name='price' value='".$details['price']."'>".$details['price']."</td>
    <td><input type='number' name='quantity' style='width: 40px;'></td> 
	<td><input type='hidden' name='gadget_type' value='tablets'></td> 
    <td><input type='submit' name='submit' value='Add to cart'></td>
  </tr>
   </form>
  ";//hidden fields to update the fields
  }
  ?>
  
 
</table>

</div>

 
<div id="wearables">
<h3>Select the wearables</h3>
<table>
  <tr>
  
    <td>Wearable Model</td>
	<td>Price</td>
    <td>Quantity</td> 
    <td></td>
	
  </tr>
  
  <?php
  foreach ($_SESSION['wearables'] as $model => $details )//to display all the wearables
  {
  echo "
  <form method='POST'>
  <tr>
    <td><input type='hidden' name='model' value='".$model."'>".$model."</td>
	<td><input type='hidden' name='price' value='".$details['price']."'>".$details['price']."</td>
    <td><input type='number' name='quantity' style='width: 40px;'></td> 
	<td><input type='hidden' name='gadget_type' value='wearables'></td> 
    <td><input type='submit' name='submit' value='Add to cart'></td>
  </tr>
   </form>
  ";//hidden fields to update the fields
  }
  ?>
  
 
</table>

</div>

</div>
<div id='checkout'>
Items in cart:<br><br>
<table>
<?php
$total=0;
foreach($_SESSION as $k => $gadget_type )
{
foreach ($gadget_type as $model => $details )
  {
  if($details['quantity']!=NULL and intval($details['quantity'])>0)//to display items in the cart
  {
  echo $model."<br>";
  echo "$".$details['price']." x ";
  echo $details['quantity']." = ".($details['quantity']*$details['price'])."<br>";
  $total = $total + ($details['quantity']*$details['price']);
  }
  }
}
  echo "Total Amount $".$total;
?>

<br><br>
<form action='process.php' method='POST'>
<!--Paypal button-->
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" align="left" style="margin-right:7px;" alt="Submit">
</div>


</body>
</html>
