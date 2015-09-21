<?php
class details
{
     protected $user=	"aishwarya.chhabra95-facilitator_api1.gmail.com";
     protected $password =  "QQB6ZWJD6A6XWS7K";
     protected $signature= "AFcWxV21C7fd0v3bYYYRCpSSRl31AP93FJjJQpxo7NCppRc.-kcwlolf";
	 //authentication details
	 
     public function apimethod($method,$params)//method to send PayPal API requests. $method specifies the API call, eg: SetExpressCheckOut
      {//$params is the list of parameters specific to the API request
        $params = array_merge($params, array(
                  'METHOD'=>$method,
                  'USER' => $this->user,
				  'SIGNATURE'=>$this->signature,
				  'PWD'=>$this->password,
				  'VERSION'=>"124.0"));//Merging $params with the details required for all the 3 API calls
           
                  $curl=curl_init();
                  curl_setopt_array($curl, array(
                               CURLOPT_URL => "https://api-3t.sandbox.paypal.com/nvp",
							   CURLOPT_POST=>1,
							   CURLOPT_POSTFIELDS => http_build_query($params),
							   CURLOPT_RETURNTRANSFER => 1,
							   CURLOPT_SSL_VERIFYHOST => false,
							   CURLOPT_SSL_VERIFYPEER => false,
							   CURLOPT_VERBOSE => 1));
                   $response = curl_exec($curl);//executing cURL query
                   $responseArray = array();//saving the response
                   parse_str($response, $responseArray);
                   if(curl_errno($curl))
                    {
                       var_dump(curl_error($curl));
                       curl_close($curl);
                       return false;
                    }
	               else
                    {
					   if($responseArray['ACK'] == 'Success')
                       {
						 return($responseArray);//returns response if ACK is successful
						}
					   else
					   {
					     var_dump($responseArray);
					     return false;
					   }
					}	
	  }
	  }
  
?>
