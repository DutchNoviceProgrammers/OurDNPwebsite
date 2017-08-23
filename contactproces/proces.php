<?php 

// define variables and set to empty values
$name_error = $email_error = $phone_error = $url_error = "";
$name = $email = $phone = $message = $url = $success = "";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $name_error = "Vul een naam in";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $name_error = "Alleen letters en spaties toegestaan"; 
    }
  }

  if (empty($_POST["email"])) {
    $email_error = "Vul een email in";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Dit is geen geldig e-mailadres"; 
    }
  }
  
  if (empty($_POST["phone"])) {
    $phone_error = "Vul een telefoonnummer in";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if e-mail address is well-formed
    if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone)) {
      $phone_error = "Dit telefoonnummer is niet geldig"; 
    }
  }

  if (empty($_POST["url"])) {
    $url_error = "";
  } else {
    $url = test_input($_POST["url"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
      $url_error = "Foutieve URL"; 
    }
  }

  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }
  
  if ($name_error == '' and $email_error == '' and $phone_error == '' and $url_error == '' ){
      $message_body = '';
      unset($_POST['submit']);
      foreach ($_POST as $key => $value){
          $message_body .=  "$key: $value\n";
      }
		  
      }
  
  if($name_error == '' and $email_error == '' and $phone_error == '' and $url_error == ''){
	  $message_body = '';
	  unset($_POST['submit']);
	  foreach($_POST as $key => $value){
		  $message_body .= "$key: $value\n";
	  }
	  
		$to = 'dutchprogrammers@gmail.com';
		$subject = 'Contactformulier ingevuld';
		$headers = "From: $email" . "\r\n";

		if(mail($to, $subject, $message, $headers)){
			$success = "Bericht verzonden, bedankt voor uw bericht!";
			$name = $email = $phone = $message = $url = ''; 
		  }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}