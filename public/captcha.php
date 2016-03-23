<?php
if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
  # secret key from googl recaptcha
  $secret = "6Lcm_RoTAAAAACmSbMWYaaxFtZPDrRHOKyd_0ZL9";
  $ip = $_SERVER('REMOTE_ADDR');
  $captcha = $_POST['g-recaptcha-response'];
  $rsp =file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
  $arr = json_decode($rsp, TRUE);
  if($arr['success']) {
    echo "Done";
  }else{
    echo "Spam";
  }
var_dump($rsp);
}
