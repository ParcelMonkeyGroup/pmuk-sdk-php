<?PHP

namespace parcelmonkeygroup\pmuksdk;

class client {
  
  var $endpoint = 'https://api.parcelmonkey.co.uk/';
  var $Version;
  var $UserId;
  var $ApiKey;

  public function __construct($UserId, $ApiKey, $Version="2.1") {
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
    
  public function build_request($uri, $method, $headers, $params=array()) {
    
    // Always want JSON
    $params['ResponseFormat'] = 'JSON';
    
    // Authorization
    $params['Version'] = $this->Version;
    $params['ApiKey'] = $this->ApiKey;
    $params['UserId'] = $this->UserId;
    
    $url = rtrim($this->endpoint,'/').'/'.ltrim($uri,'/');
    
    switch(strtolower($method)) {
      case 'get':
      
        // Build URL with parameters
        $url = $url.http_build_query($params);
        $request = \Httpful\Request::get($url);
        
      break;
      case 'post':
      
        $headers['Content-Type'] = 'application/x-www-form-urlencoded';
        $request = \Httpful\Request::post($url)->body(http_build_query($params));
      
      break;
    }
    
    // Headers
    foreach($headers as $key => $value) {
      $request->addHeader($key,$value);
    }
    
    return $request;
  }
  
  public function send_request($uri, $method, $headers, $params) {
    
    $request = $this->build_request($uri,$method,$headers,$params);
    
    $response = $request->send();
    return $response;
    
  }
  
  
}

?>