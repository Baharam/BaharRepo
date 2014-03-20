<?php
  require_once('recaptchalib.php');
  $privatekey = "6LdeQusSAAAAABVlShXZhu7ArM0e4IlCOlbi7NZq";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    die ("0");
  } else {
    echo "1";
  }
?>