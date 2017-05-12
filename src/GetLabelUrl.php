<?PHP

namespace parcelmonkeygroup\pmuksdk;

class GetLabelUrl extends request {
  
  var $uri = '/GetLabelUrl';
  var $method = 'POST';
  
  function setShipmentId($ShipmentId) {
    $this->set_param('ShipmentId', $ShipmentId);
  }
  
  function send() {
    
    $r = parent::send();
    return 'https://'.html_entity_decode($r->LabelUrl);
    
  }
  
}

?>