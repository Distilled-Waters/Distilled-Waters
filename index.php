<?php
  define('OAUTH2_CLIENT_ID', '8312261593cf6823a3ee');
  define('OAUTH2_CLIENT_SECRET', '34c91808357c36cc3238d75a9fc2b46caafb0444');
  
  $authorizeURL = 'https://github.com/login/oauth/authorize';
  $tokenURL = 'https://github.com/login/oauth/access_token';
  $apiURLBase = 'https://api.github.com/';
  
  session_start();
  
  if (get('action') == 'login') {
    $_SESSION['state'] = hash('sha256', microtime(TRUE).rand().$_SERVER['REMOTE_ADDR']);
    unset($_SESSION['access_token']);
    
    $params = array(
      'client_id' => OAUTH2_CLIENT_ID,
      'redirect_uri' => 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'],
      'scope' => 'user',
      'state' => $_SESSION['state']
                           );
    
    header('Location: ' . $authorizeURL . '?' . http_build_query($params));
    die();
  }
  
  if (get('action') == 'exit') {
    unset($_SESSION['state']);
    unset($_SESSION['access_token']);
    session_destroy();
    exit();
  }
  
  if (get('code')) {
    if(!get('state') || $_SESSION['state'] != get('state')) {
      header('Location: ' . $_SERVER['PHP_SELF']);
      die();
    }
    
    $token = apiRequest($tokenURL, array(
      'client_id' => OAUTH2_CLIENT_ID,
      'client_secret' => OAUTH2_CLIENT_SECRET,
      'redirect_uri' => 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'],
      'state' => $_SESSION['state'],
      'code' => get('code')
    ));
    $_SESSION['access_token'] = $token->access_token;
    
    header('Location: ' . $_SERVER['PHP_SELF']);
  }
  
  if (session('access_token')) {
    $user = apiRequest($apiURLBase.'user');
    
    if(isset($_GET["codespace"])){
      include("CodeSpace.php");
    } else {
      if(isset($_GET["inbox"])){
        include("Inbox.php");
      } else {
        include("LoggedIn.php");
      }
    }
    
  } else {
    echo '<h3>Not logged in</h3>';
    echo '<p><a href="?action=login">Log In</a></p>';
  }
  
  function apiRequest($url, $post=FALSE, $headers=array()) {
    $ch = curl_init($url);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Linux useragent');
    
    if($post)
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    
    $headers[] = 'Accept: application/json';
    
    if(session('access_token'))
      $headers[] = 'Authorization: Bearer ' . session('access_token');
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $response = curl_exec($ch);
    return json_decode($response);
  }
  
  function get($key, $default=NULL) {
    return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
  }
  
  function session($key, $default=NULL) {
    return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
  }
  ?>
