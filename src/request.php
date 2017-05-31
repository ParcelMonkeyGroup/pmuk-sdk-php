<?PHP

namespace parcelmonkeygroup\pmuksdk;

abstract class request {
  
  var $uri = '';    
  var $headers = array();
  var $method = 'POST';
  var $payload;
  var $client;
  var $raw_response;
  
  function __construct($client){
    $this->client = $client;
  }
  
  protected function add_header($key,$val) {
    $this->headers[$key] = $val;
  }
    
  function send_request() {
    return $this->client->send_request($this->uri,$this->method,$this->headers,$this->payload);
  }
  
  function get_raw_response() {
    return $this->raw_response;
  }
    
  function send() {
        
    $response = $this->send_request();
    
    if($response->code != 200) {
      
      throw new \Exception('Error ['.$response->code.'] '.$response->body->error);
      
    }
    
    return $response->body;
    
  }
  
}

?>