<?PHP

include_once('../vendor/autoload.php');

use parcelmonkeygroup\pmuksdk\client;
use parcelmonkeygroup\pmuksdk\GetLabelUrl;

// Add your credentials (obtain these from your account on parcelmonkey.co.uk)
$UserId   = 'YOURUSERID';
$ApiKey   = 'YOURAPIKEY';
$Version  = 2.1;

// Initialise the client 
$client = new client($UserId,$ApiKey, $Version);

// Create the request passing in the client
$request = new GetLabelUrl($client);

$request->setShipmentId('YOURSHIPMENTID');  // ShipmentId obtained from CreateShipment

try {
  
  $response = $request->send();

  echo print_r($response,true);
  
} catch (\Exception $e) {
  
  echo $e->getMessage();
  
}


?>