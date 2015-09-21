-----------------------------------------------------------------------------
Author: Aishwarya Chhabra
PayPal Test Site
(Main Languages used: PHP, HTML, CSS, Javascript (JQuery))
Note: Comments have been included in the source code.
IMPORTANT: At times an Internal Server Error is reported on the PayPal sandbox website. Please refresh the page.
-----------------------------------------------------------------------------


Website URL: http://teststore.site90.net/testsite/main.php

This website is a test e-commerce website. The main aim of this website is to focus on the integration of PayPal express check out system with the e-store through PayPal APIs.
The website has the following php pages:

1) main.php: This is the main website page. It lists all the products in the store (for which it uses session variables). 
   It also has a filter to categorize the types of products the store has to offer such as phones, tablets and wearables. It uses JQuery for this.
   The items are displayed in the form of a table. the user has the option to select the quantity of the desired product and add them to the cart.   
   Once, the user has selected all the products, he/she has to click on the PayPal Express check out button which directs to the process.php page.
   
2) process.php: This is a mostly a background page. 
   It sends the PayPal SetExpressCheckout API request, after which the user is directed to PayPal's website to confirm the transaction.

3) accept.php: Once the user has confirmed the transaction, PayPal redirects the browser to this page. 
   The Token and PayerId are extracted and the GetExpressCheckoutDetails and DoExpressCheckout API requests are performed. A successful message is displayed when the whole transaction is complete.
   The user has an option to go back to the main.php page from here.
  
4) decline.php: If the user cancels the transaction, the browser is redirected to this page. The user has an option to go back to the main.php page from here.

5) details.php: This php file contains the details class and apimethod function. The apimethod function is designed to send out API requests to PayPal.
   cURL in php is used for this.

6) products.php: This file contains all the items the store has to offer. The products are stored in Session variables.   
--------------------------------------------------------------------------------

Three API calls to the Paypal servers are sent:
1) SetExpressCheckout
2) GetExpressCheckoutDetails
3) DoExpressCheckout

Errors are displayed if requests are unsuccessful.

---------------------------------------------------------------------------------

  
  

