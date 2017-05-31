<?PHP

namespace parcelmonkeygroup\pmuksdk;

class GetQuote extends request {
  
  var $uri = '/GetQuote';
  var $method = 'POST';
  
  function setDeliveryAddress(
    
    $Address1,
    $Address2,
    $Address3,
    $Town,
    $County,
    $Postcode,
    $CountryCode,
    $Name,
    $Phone,
    $Email
  
  ) {
    
    $args = func_get_args();
    
    $this->payload['recipient']['address1'] = func_get_args()[0];
    $this->payload['recipient']['address2'] = func_get_args()[1];
    $this->payload['recipient']['address3'] = func_get_args()[2];
    $this->payload['recipient']['town'] = func_get_args()[3];
    $this->payload['recipient']['county'] = func_get_args()[4];
    $this->payload['recipient']['postcode'] = func_get_args()[5];
    $this->payload['destination'] = func_get_args()[6];
    $this->payload['recipient']['name'] = func_get_args()[7];
    $this->payload['recipient']['phone'] = func_get_args()[8];
    $this->payload['recipient']['email'] = func_get_args()[9];
    
  }
  
  function setCollectionAddress(
    
    $Address1,
    $Address2,
    $Address3,
    $Town,
    $County,
    $Postcode,
    $CountryCode,
    $Name,
    $Phone,
    $Email
  
  ) {
    
    $args = func_get_args();
    
    $this->payload['sender']['address1'] = func_get_args()[0];
    $this->payload['sender']['address2'] = func_get_args()[1];
    $this->payload['sender']['address3'] = func_get_args()[2];
    $this->payload['sender']['town'] = func_get_args()[3];
    $this->payload['sender']['county'] = func_get_args()[4];
    $this->payload['sender']['postcode'] = func_get_args()[5];
    $this->payload['origin'] = func_get_args()[6];
    $this->payload['sender']['name'] = func_get_args()[7];
    $this->payload['sender']['phone'] = func_get_args()[8];
    $this->payload['sender']['email'] = func_get_args()[9];
    
  }
    
  
  function addBox($length,$width,$height,$weight) {
    
    // All dimensions in  CM and KG
    $this->payload['boxes'][]=array(
      'length'=>$length,
      'width'=>$width,
      'height'=>$height,
      'weight'=>$weight
    );
    
  }
  
  function setGoodsValue($ShipmentGoodsValue) {
    $this->payload['goods_value'] = $ShipmentGoodsValue;
  }
  
  function setPalletised($bool) {
    $this->payload['is_palletised'] = $bool;
  }
  
  function setCollectionDate($date) {
    $this->payload['collection_date'] = date('Y-m-d', strtotime($date));
  }
  
}

?>