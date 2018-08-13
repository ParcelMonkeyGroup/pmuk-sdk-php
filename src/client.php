<?PHP

namespace parcelmonkeygroup\pmuksdk;

class client {
  
  var $endpoint = 'https://api.parcelmonkey.co.uk/';
  var $Version;
  var $UserId;
  var $ApiKey;
  var $debug_payload;

  public function __construct($UserId, $ApiKey, $Version="3.0") {
    $this->set_credentials($UserId, $ApiKey);
    $this->set_version($Version);
  }
  
  private function set_credentials($UserId, $ApiKey) {
    $this->UserId = $UserId;
    $this->ApiKey = $ApiKey;
  }
  
  private function set_version($Version) {
    $this->Version = $Version;
  }
    
  public function build_request($uri, $method, $headers, $payload) {
    
    if($this->debug_payload) {
      print_r($payload);exit;
    }    
    
    if(!is_string($payload)) $payload=json_encode($payload);
    
    // Authorization
    $headers['apiversion'] = $this->Version;
    $headers['token'] = $this->ApiKey;
    $headers['UserId'] = $this->UserId;
    
    $url = rtrim($this->endpoint,'/').'/'.ltrim($uri,'/');
    
    switch(strtolower($method)) {
      case 'post':
      
        $headers['Content-Type'] = 'application/json';
        $request = \Httpful\Request::post($url)->body($payload);
      
      break;
    }
    
    // Headers
    foreach($headers as $key => $value) {
      $request->addHeader($key,$value);
    }
    
    return $request;
  }
  
  public function send_request($uri, $method, $headers, $payload) {
    
    $request = $this->build_request($uri,$method,$headers,$payload);
    
    $response = $request->send();
    return $response;
    
  }
  
  
}

?>
