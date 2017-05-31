<?PHP

namespace parcelmonkeygroup\pmuksdk;

class CreateShipment extends GetQuote {
  
  var $uri = '/CreateShipment';
  var $method = 'POST';
  
  function setServiceCode($ServiceCode) {
    $this->payload['service'] = $ServiceCode;
  }
  
  function setContentsDescription($ShipmentContents) {
    $this->payload['goods_description'] = $ShipmentContents;
  }
  
  function addCustomsItem($quantity,$description,$value_per_unit) {
    $this->payload['customs']['items'][]=array('quantity'=>$quantity,'description'=>$description,'value_per_unit'=>$value_per_unit);
  }
  
  function setCustomsData(
    
    $doc_type,
    $reason,
    $sender_name,
    $sender_tax_reference,
    $recipient_name,
    $recipient_tax_reference,
    $country_of_manufacture
  
  ) {
    
    $args = func_get_args();
    
    $this->payload['customs']['doc_type'] = func_get_args()[0];
    $this->payload['customs']['reason'] = func_get_args()[1];
    $this->payload['customs']['sender_name'] = func_get_args()[2];
    $this->payload['customs']['sender_tax_reference'] = func_get_args()[3];
    $this->payload['customs']['recipient_name'] = func_get_args()[4];
    $this->payload['customs']['recipient_tax_reference'] = func_get_args()[5];
    $this->payload['customs']['country_of_manufacture'] = func_get_args()[6];
    
  }
  
}

?>