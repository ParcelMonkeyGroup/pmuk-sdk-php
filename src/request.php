<?PHP

namespace parcelmonkeygroup\pmuksdk;

abstract class request {
  
  var $uri = '';    
  var $headers = array();
  var $method = 'POST';
  var $params = array();
  var $client;
  var $raw_response;
  
  function __construct($client){
    $this->client = $client;
  }
  
  protected function add_header($key,$val) {
    $this->headers[$key] = $val;
  }
  
  protected function set_param($key, $val) {
    $this->params[$key] = $val;
  }
  
  protected function get_param($key) {
    return $this->params[$key];
  }
  
  
  function send_request() {
    return $this->client->send_request($this->uri,$this->method,$this->headers,$this->params);
  }
  
  function get_raw_response() {
    return $this->raw_response;
  }
    
  function send() {
        
    $response = $this->send_request();
    $this->raw_response = $response; // Useful for debugging

    // Handle errors
    if($response->code != 200 || strpos($response->body,'errormessages') !== false) {
      
      // Is it JSON
      if(json_decode($response->body) != '') {
        if(is_array(json_decode($response->body,true)['errormessages']['errormessage'])) {
          foreach(json_decode($response->body,true)['errormessages']['errormessage'] as $k => $v) $error[]=$v;
        } else {
          $error[]=json_decode($response->body,true)['errormessages']['errormessage'];
        }
        $error=implode('|', $error);
      } else {
        $error = $response->body;
        
      }
      
      throw new \Exception('Failed ['.$response->code.'] '.$error);    
    }
    
    // Extract the response body
    $response_body = json_decode($response->body);
    
    // Tidy up the response to get rid of old parameters
    $response_body = $response_body->response;
    unset($response_body->ApiService);
    unset($response_body->Balance);
    unset($response_body->ExecutionTime);
    
    return $response_body;
    
  }
  
}

?>