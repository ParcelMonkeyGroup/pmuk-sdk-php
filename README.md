# Parcel Monkey UK - PHP SDK
This package is an SDK to interact with the Parcel Monkey UK API. Using this you can book parcel deliveries from the UK to anywhere in the world.

Parcel Monkey UK gives you access to well known services such as Parcelforce, DHL, DPD, DX and more.

## API Documentation & Version
Currently compatible with Version 2.1 of the Parcel Monkey UK API.
https://www.parcelmonkey.co.uk/resources/api/api_doc.pdf

## Installation
You can install this package using composer:
`composer require parcelmonkeygroup/pmuk-sdk-php`

## Basic Usage
Examples for each request object are in the `/examples` directory.

```
<?PHP

include_once('../vendor/autoload.php');

use parcelmonkeygroup\pmuksdk\client;
use parcelmonkeygroup\pmuksdk\HelloWorld;

// Add your credentials (obtain these from your account on parcelmonkey.co.uk)
$UserId   = 'YOURUSERID';
$ApiKey   = 'YOURAPIKEY';
$Version  = 2.1;

// Initialise the client 
$client = new client($UserId,$ApiKey, $Version);

// Create the request passing in the client
$request = new HelloWorld($client);

try {
  
  $response = $request->send();

  echo print_r($response,true);
  
} catch (\Exception $e) {
  
  echo $e->getMessage();
  
}
```

## Support

Support is available at https://www.parcelmonkey.co.uk/help