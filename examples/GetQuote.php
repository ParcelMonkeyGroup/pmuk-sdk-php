<?PHP

include_once('../vendor/autoload.php');

use parcelmonkeygroup\pmuksdk\client;
use parcelmonkeygroup\pmuksdk\GetQuote;

// Add your credentials (obtain these from your account on parcelmonkey.co.uk)
$UserId   = 'YOURUSERID';
$ApiKey   = 'YOURAPIKEY';
$Version  = '3.0';

// Initialise the client 
$client = new client($UserId,$ApiKey, $Version);

// Create the request passing in the client
$request = new GetQuote($client);

// Supply all required data to the request
$request->setDeliveryAddress(
  
  'Unit 21 Tollgate',
  '',
  '',
  'Chandlers Ford',
  'Hampshire',
  'SO53 3TG',
  'GB',
  'Rich',
  '01234567890',
  'noreply@parcelmonkey.com'

);

$request->setCollectionAddress(
  
  'Unit 21 Tollgate',
  '',
  '',
  'Chandlers Ford',
  'Hampshire',
  'SO53 3TG',
  'GB',
  'Rich',
  '01234567890',
  'noreply@parcelmonkey.com'

);

$request->setCollectionDate('2017-05-31');

$request->addBox(10,10,10,1);

$request->setGoodsValue(10);

$request->setPalletised(false);

try {
  
  $response = $request->send();

  echo print_r($response,true);
  
} catch (\Exception $e) {
  
  echo $e->getMessage();
  
}


?>