<?PHP

namespace parcelmonkeygroup\pmuksdk;

class GetShipmentDetails extends request {
  
  var $uri = '/GetShipmentDetails';
  var $method = 'POST';
  
  function setShipmentId($ShipmentId) {
    $this->set_param('ShipmentId', $ShipmentId);
  }
  
  function send() {
    
    $r = parent::send();
    return $r->Shipment;
    
  }

  
}

?>