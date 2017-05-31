<?PHP

include_once('../vendor/autoload.php');

use parcelmonkeygroup\pmuksdk\client;
use parcelmonkeygroup\pmuksdk\HelloWorld;

// Add your credentials (obtain these from your account on parcelmonkey.co.uk)
$UserId   = 'YOURUSERID';
$ApiKey   = 'YOURAPIKEY';
$Version  = '3.0';

// Initialise the client 
$client = new client($UserId,$ApiKey, $Version);

// Create the request passing in the client
$request = new HelloWorld($client);
$request->setEcho('testing 123');

try {
  
  $response = $request->send();

  echo print_r($response,true);
  
} catch (\Exception $e) {
  
  echo $e->getMessage();
  
}


?>