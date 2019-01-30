<?php


session_start();
require_once 'vendor/autoload.php';
require_once 'app/FacebookAuth.php';

$fb = new Facebook\Facebook([
    'app_id' => '304223086891251',
    'app_secret' => '88f4bba851cf6156d5f370c861804994',
    'default_graph_version' => 'v2.10',
    //'default_access_token' => '{access-token}', // optional
  ]);


  $fbAuth = new FacebookAuth($fb);

?>