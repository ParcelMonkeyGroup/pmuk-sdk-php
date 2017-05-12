<?PHP

namespace parcelmonkeygroup\pmuksdk;

class CreateShipment extends GetQuote {
  
  var $uri = '/CreateShipment';
  var $method = 'POST';
  
  function setServiceCode($ServiceCode) {
    $this->set_param('ServiceCode', $ServiceCode);
  }
  
  function setCollectionDate($datestring) {
    $this->set_param('ShipmentCollectionDate', date('Y-m-d', strtotime($datestring)));
  } 
  
  function setContentsDescription($ShipmentContents) {
    $this->set_param('ShipmentContents', $ShipmentContents);
  }
  
  function send() {
    
    if(empty($this->get_param('ShipmentPalletised'))) $this->set_param('ShipmentPalletised', 0);
    if(empty($this->get_param('ShipmentGoodsValue'))) $this->set_param('ShipmentGoodsValue', 0);
    
    $r = request::send();
    
    return $r->shipment;
    
  }
  
}

?>