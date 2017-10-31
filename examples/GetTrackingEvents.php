<?PHP

include_once('../vendor/autoload.php');

use parcelmonkeygroup\pmuksdk\client;
use parcelmonkeygroup\pmuksdk\GetTrackingEvents;

// Add your credentials (obtain these from your account on parcelmonkey.co.uk)
$UserId   = 'YOURUSERID';
$ApiKey   = 'YOURAPIKEY';
$Version  = '3.1';

// Initialise the client 
$client = new client($UserId,$ApiKey, $Version);

// Create the request passing in the client
$request = new GetTrackingEvents($client);
$request->setShipmentId('1234567');

try {
  
  $response = $request->send();

  echo print_r($response,true);
  
} catch (\Exception $e) {
  
  echo $e->getMessage();
  
}


?>