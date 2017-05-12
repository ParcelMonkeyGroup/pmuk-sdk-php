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
    
    $this->set_param('ShipmentDeliveryAddress1', func_get_args()[0]);
    $this->set_param('ShipmentDeliveryAddress2', func_get_args()[1]);
    $this->set_param('ShipmentDeliveryAddress3', func_get_args()[2]);
    $this->set_param('ShipmentDeliveryTown', func_get_args()[3]);
    $this->set_param('ShipmentDeliveryCounty', func_get_args()[4]);
    $this->set_param('ShipmentDeliveryPostcode', func_get_args()[5]);
    $this->set_param('ShipmentDeliveryCountryCode', func_get_args()[6]);
    $this->set_param('ShipmentDeliveryName', func_get_args()[7]);
    $this->set_param('ShipmentDeliveryMobile', func_get_args()[8]);
    $this->set_param('ShipmentDeliveryEmail', func_get_args()[9]);
    
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
    
    $this->set_param('ShipmentCollectionAddress1', func_get_args()[0]);
    $this->set_param('ShipmentCollectionAddress2', func_get_args()[1]);
    $this->set_param('ShipmentCollectionAddress3', func_get_args()[2]);
    $this->set_param('ShipmentCollectionTown', func_get_args()[3]);
    $this->set_param('ShipmentCollectionCounty', func_get_args()[4]);
    $this->set_param('ShipmentCollectionPostcode', func_get_args()[5]);
    $this->set_param('ShipmentCollectionCountryCode', func_get_args()[6]);
    $this->set_param('ShipmentCollectionName', func_get_args()[7]);
    $this->set_param('ShipmentCollectionMobile', func_get_args()[8]);
    $this->set_param('ShipmentCollectionEmail', func_get_args()[9]);
    
  }
    
  function setDeliveryCountryCode($CountryCode) {
    $this->set_param('ShipmentDeliveryCountryCode', $CountryCode);
  }
  
  function addBox($length,$width,$height,$weight) {
    
    // All dimensions in  CM and KG
    $boxes = $this->get_param('Boxes');
    if(!is_array($boxes)) $boxes = array();
    
    $boxes[]=array(
      'length'=>$length,
      'width'=>$width,
      'height'=>$height,
      'weight'=>$weight
    );
    
    $this->set_param('Boxes', $boxes);
    
  }
  
  function setGoodsValue($ShipmentGoodsValue) {
    $this->set_param('ShipmentGoodsValue', $ShipmentGoodsValue);
  }
  
  function setPalletised($bool) {
    $this->set_param('ShipmentPalletised', $bool ? true : false);
  }
  
  function send() {
    
    if(empty($this->get_param('ShipmentPalletised'))) $this->set_param('ShipmentPalletised', 0);
    if(empty($this->get_param('ShipmentGoodsValue'))) $this->set_param('ShipmentGoodsValue', 0);
    
    $r = parent::send();
    return $r->services->service;
    
  }
  
  
  
}

?>