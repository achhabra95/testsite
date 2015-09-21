
<?php

session_start();
include'details.php';
$i=0;
$total=0;
foreach($_SESSION as $k => $gadget_type )//getting all the products in the cart in an multi-dimensional array called $products
{
foreach ($gadget_type as $model => $details )
  {
     if($details['quantity']!=NULL and intval($details['quantity'])>0)
     {
     $products[$i]['name']= $model;
	 $products[$i]['price']= $details['price'];
	 $products[$i]['quantity']= $details['quantity'];
	 $total = $total + ($products[$i]['quantity']*$products[$i]['price']);//adding the total price
	 $i++;
	 }
  }
}
 if($total==0)//if no product was selected
 {
 echo 'You have not selected any item! Click \'Add to cart\' to add your items.<br><a href=\'http://teststore.site90.net/testsite//main.php\'>Click here to go back<a>';
 }
 else
 {
$params = array(  'RETURNURL'=>"http://teststore.site90.net/testsite/accept.php",
				  'CANCELURL'=>"http://teststore.site90.net/testsite/decline.php",
		          'PAYMENTREQUEST_0_PAYMENTACTION' => "Sale",
		          'PAYMENTREQUEST_0_AMT'=>$total,
				  );//adding fields required for the API request
foreach ($products as $key => $product)//adding details of all the products in the cart
{
$params['L_PAYMENTREQUEST_0_NAME'.$key] = $product['name'];
$params['L_PAYMENTREQUEST_0_AMT'.$key] = $product['price'];
$params['L_PAYMENTREQUEST_0_QTY'.$key] = $product['quantity'];

}

$obj =new details;
$response_arr = $obj->apimethod('SetExpressCheckout',$params);//calling the SetExpressCheckout API method. This is the first API request.
if($response_arr)//if successful then redirecting the browser
{
 header("Location: https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=".$response_arr['TOKEN']);
						
}
else
{
echo 'Error';
}
				  
}		  
				  
			
					   
?>

