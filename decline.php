<?php
session_start();

 echo '<img src="
https://upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Fairytale_button_cancel.svg/2000px-Fairytale_button_cancel.svg.png" align="middle" width="200" height="200">';
   
echo ' You have cancelled your transaction. ';
session_unset(); //closing session so that the cart becomes empty again
session_destroy();
?>
<a href='http://teststore.site90.net/testsite/main.php'>Click here to go back<a>

