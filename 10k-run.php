<?php
$data = $_POST["verify"];

if($data == "contact"){
$name = $_POST['name']; // required
$email = $_POST['email']; // required
$mobile = $_POST['mobile']; // required
$message = $_POST['message']; // not required
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "shiva@tetramind.in,digital@vretailgroup.com";/*samir@tetramind.in,info@vretailgroup.com*/
    $email_from = "no-reply@fashioncentro.com";
    $email_subject = "Celebrating 10k Running - Fashion Centro";
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
 
  if(strlen($error_message) > 0) {
    echo "<div class='alert alert-danger' role='alert'>".$error_message."</div><div class='space30'></div>";
  } else {
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    $email_message = "<div style='padding:20px;background:#f5f5f5;border:1px solid #eee;font-size:1rem;line-height:1.4'>";
    $email_message .= "Name: <strong>".clean_string($name)."</strong>.<br/>";
    $email_message .= "Email: <strong>".clean_string($email)."</strong>.<br/>";
    $email_message .= "Mobile: <strong>".clean_string($mobile)."</strong>.<br/>";
    $email_message .= "Message: <br/><strong>".clean_string($message)."</strong></div>";
 
    // create email headers
    $headers = 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    @mail($email_to, $email_subject, $email_message, $headers);  

    echo "<div class='alert alert-success' role='alert'>Thank you for contacting us.</div><div class='space30'></div>";

    }

}
?>