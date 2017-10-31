<?PHP

namespace parcelmonkeygroup\pmuksdk;

class CancelShipment extends GetQuote {
  
  var $uri = '/CancelShipment';
  var $method = 'POST';
  
  function setShipmentId($ShipmentId) {
    $this->payload['ShipmentId'] = $ShipmentId;
  }
  
}

?>