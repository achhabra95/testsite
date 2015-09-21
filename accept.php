
<?php
session_start();
include 'details.php';
$params = array(  'TOKEN'=>$_GET['token'] );//get token from url


$obj =new details();
$response_arr1 = $obj->apimethod('GetExpressCheckoutDetails',$params); //getting details of the check out. This is the 2nd API request.
if($response_arr1)
{	

$params['PAYERID']=$_GET['PayerID'];//get payer id from url
$params['PAYMENTREQUEST_0_PAYMENTACTION'] = "Sale";
$params['PAYMENTREQUEST_0_AMT']=$response_arr1['PAYMENTREQUEST_0_AMT'];
$response_arr2=$obj->apimethod('DoExpressCheckoutPayment',$params);//doing out the check out. This is the 3rd and last API request.
   if($response_arr2)
   {
    echo '<img src="https://image.freepik.com/free-photo/green-tick-in-circle_21335495.jpg" width="200" align="middle" height="200">';
     echo ' Congratulations! Your payment is successful.   ';
	 
   }
   else
   {
     echo 'error2';
   }
}
else
{
  echo 'Error1';
}
echo '<a href="http://teststore.site90.net/testsite/main.php">Click here to go back<a>';
session_unset(); //closing session so that the cart becomes empty again
session_destroy();


 


				  
				  
				  
				  
			
					   
?>
