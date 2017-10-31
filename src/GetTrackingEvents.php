<?PHP

namespace parcelmonkeygroup\pmuksdk;

class GetTrackingEvents extends GetQuote {
  
  var $uri = '/GetTrackingEvents';
  var $method = 'POST';
  
  function setShipmentId($ShipmentId) {
    $this->payload['ShipmentId'] = $ShipmentId;
  }
  
}

?>