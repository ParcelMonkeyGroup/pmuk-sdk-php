<?PHP

namespace parcelmonkeygroup\pmuksdk;

class GetTrackingUrl extends request {
  
  var $uri = '/GetTrackingUrl';
  var $method = 'POST';
  
  function setShipmentId($ShipmentId) {
    $this->set_param('ShipmentId', $ShipmentId);
  }
  
  function send() {
    
    $r = parent::send();
    
    if($r->TrackingStatus != 'Not Available')  return 'https://'.html_entity_decode($r->TrackingUrl);
    throw new \Exception('Tracking URL not available at this time');
    
  }
  
}

?>