<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

  $mailSent = false;
  $suspect = false;
  $pattern = '/Content-type:|Bcc:|Cc:/i';

  function isSuspect($value, $pattern, &$suspect) {
    if (is_array($value)) {
      foreach ($value as $item) {
        isSuspect($item, $pattern, $suspect);
      }
    } else {
      if (preg_match($pattern, $value)) {
        $suspect = true;
      }
    }
  }

  isSuspect($_POST, $pattern, $suspect);

  if (!$suspect) :
    foreach ($_POST as $key => $value) {
      $value = is_array($value) ? $value : trim($value);
      if (empty($value) && in_array($key, $required)) {
        $missing[] = $key;
        $$key = '';
      } elseif (in_array($key, $expected)) {
        $$key = $value;
      }
    }
    if (!$missing && !empty($email)) :
      $validemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
      if ($validemail) {
        $headers[] = "Reply-to: $validemail";
      } else {
        $errors['email'] = true;
      }
    endif;
    if (!$errors && !$missing) :
      $headers = implode("\r\n", $headers);
      $mailcon = '';
      foreach ($expected as $field) :
        if (isset($$field) && !empty($$field)) {
          $val = $$field;
        } else {
          $val = 'Not selected';
        }
        if (is_array($val)) {
          $val = implode(', ', $val);
        }
        $field = str_replace('_', ' ', $field);
        $mailcon .= ucfirst($field) . ": " . $val . "<br>";
      endforeach;
      $mailcon = wordwrap($mailcon, 70);
      $mailSent = mail($to, $subject, $mailcon, $headers, $authorized);
      if (!$mailSent) {
        $errors['mailfail'] = true;
      } else {
        mail($to, $subject, $mailcon, $headers, $authorized);
        $mail = new PHPMailer(true);
        try{
          //$mail->SMTPDebug = 2;    // TEST Enable verbose debug output
          $mail->isSMTP();
          $mail->addAddress('connect@spearsgoode.com', 'connect@spearsgoode.com');
          $mail->addReplyTo($validemail, 'Information');
          $mail->isHTML(true);
          $mail->Subject = $subject;
          $mail->Body    = $mailcon;
          $mail->send();
        } catch (Exception $e) {
          echo 'Sorry, your message could not be sent.';
          echo 'PHPMailer Error: ' . $mail->ErrorInfo;
        }
      }
    endif;
  endif;
?>
