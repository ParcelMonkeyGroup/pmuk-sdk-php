<?PHP

include_once('../vendor/autoload.php');

use parcelmonkeygroup\pmuksdk\client;
use parcelmonkeygroup\pmuksdk\CreateShipment;

// Add your credentials (obtain these from your account on parcelmonkey.co.uk)
$UserId   = 'YOURUSERID';
$ApiKey   = 'YOURAPIKEY';
$Version  = '3.0';

// Initialise the client 
$client = new client($UserId,$ApiKey, $Version);

// Create the request passing in the client
$request = new CreateShipment($client);

// Supply all required data to the request
$request->setDeliveryAddress(
  
  'Unit 21 Tollgate', // address1
  '', // address2
  '', // address3
  'Chandlers Ford', // town
  'Hampshire', // county
  'SO53 3TG', // postcode
  'US', // country ISO
  'Rich', // name
  '01234567890', // phone
  'noreply@parcelmonkey.com' // email

);

$request->setCollectionAddress(
  
  'Unit 21 Tollgate', // address1
  '', // address2
  '', // address3
  'Chandlers Ford', // town
  'Hampshire', // county
  'SO53 3TG', // postcode
  'GB', // country ISO
  'Rich', // name
  '01234567890', // phone
  'noreply@parcelmonkey.com' // email

);

$request->addBox(10,10,10,1);

$request->setGoodsValue(10);

$request->setPalletised(false);

$request->setServiceCode('international_pmair');

$request->setCollectionDate('2017-06-01');

$request->setContentsDescription('Books');

$request->setCustomsData(
  'commercial', // doc_type
  'Sold', // reason
  'Rich', // sender_name
  'VAT No 12345678', // sender_tax_reference
  'Nicola', // recipient_name
  'Private Individual', // recipient_tax_reference
  'GB' // country_of_manufacture
);

$request->addCustomsItem(1,'book',10);



try {
  
  $response = $request->send();
  
  echo print_r($response,true);
  
} catch (\Exception $e) {
  
  echo $e->getMessage();
  
}


?>