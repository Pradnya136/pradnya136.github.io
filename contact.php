<?php
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $subject = htmlspecialchars($_POST['subject']);
  $message = htmlspecialchars($_POST['message']);

  if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "recruiter@letzstepin.com"; 
      $subject = "Why: $subject";
      $body = "Name: $name\nEmail: $email\nPhone: $phone\nWhy: $subject\n\nMessage:\n$message\n\nRegards,\n$name";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){
         echo "Your message has been sent";
      }else{
         echo "Sorry, failed to send your message!";
      }
    }else{
      echo "Enter a valid email address!";
    }
  }else{
    echo "Email and message field is required!";
  }
?>

<?php  
if(isset($_POST['submit'])){
$name = $_POST['name'];
$emailFrom = $_POST['email'];
$message = $_POST['msg'];
$phoneNumber = $_POST['phone'];
$subject = "A new query submitted by " . $name;

$mailTo = "foodpicassokafe.com";
$headers = "From: " . $emailFrom;

  mail($mailTo, $subject, $phoneNumber, $message, $headers);
  header("Location: section.html?mailsent");

}else{
  echo "Form details could not be submitted.Please check if all details are filled in correctly.";
}




?>