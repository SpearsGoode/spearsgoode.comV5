<?php
  $errors=[];
  $missing=[];
  if (isset($_POST['send'])) {
    $expected = ['fname', 'lname', 'email', 'msg'];
    $required = ['fname', 'email', 'msg'];
    $to = 'connect@spearsgoode.com';
    $subject = 'Message Recieved From SpearsGoode.com';
    $headers = [];
    $headers[] = 'From: webmaster@spearsgoode.com';
    $headers[] = 'Content-type: text/plain; charset=utf-8';
    $authorized = null;
    require './processMsg.php';
    if ($mailSent) {
      header('Location: ../index.php#success');
      mail("connect@spearsgoode.com", "test mail()", "hope this works :/");
      exit;
    } else {
      header('Location: ../index.php#error');
      exit;
    }
  }
?>
