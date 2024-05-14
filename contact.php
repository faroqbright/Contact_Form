<?php
require 'validation.php';
require 'db.php';

if (isset($_POST)) {
   $errors = [];
   if (isset($_POST['name'])) {
      $errors[] = validateName($_POST['name']);
   }
   if (isset($_POST['email'])) {
      $errors[] = validateEmail($_POST['email']);
   }
   if (isset($_POST['phone'])) {
      $errors[] = validatePhone($_POST['phone']);
   }
   if (isset($_POST['subject'])) {
      $errors[] = validateSubject($_POST['subject']);
   }
   if (isset($_POST['message'])) {
      $errors[] = validateMessage($_POST['message']);
   }


   if (isset($_POST['g-recaptcha-response'])) {
      $errors[] = validateRecaptcha($_POST['g-recaptcha-response']);
   }

   $errors = array_filter($errors, function ($value) {
      return !is_null($value);
   });

   if (count($errors) > 0) {
      echo json_encode(['code' => 400, 'errors' => array_values($errors)]);
      die;
   }

   $ip = $_SERVER['REMOTE_ADDR'];
   $created_at = date('y-m-d H:i:s');

   $sql = "INSERT INTO `contact`(`name`, `email`, `phone`, `subject`, `message`, `ip`, `created_at`) VALUES ('{$_POST['name']}','{$_POST['email']}','{$_POST['phone']}','{$_POST['subject']}','{$_POST['message']}','{$ip}','{$created_at}')";

   if (mysqli_query($conn, $sql)) {

      $to = 'faroqbright@gmail.com';
      $subject = $_POST['subject'];
      $message = '
      <html>
      <head>
      <title>' . $subject . '</title>
      <body>
      <h1> Thanks for contacting us</h1>
      <p>' . $_POST['name'] . '</p>
      <p>' . $_POST['email'] . '</p>
      <p>' . $_POST['phone'] . '</p>
      <p>' . $_POST['message'] . '</p>
      </body>
      </head>
      </html>
      ';

      $headers[] = 'MIME-Version: 1.0';
      $headers[] = 'Content-type: text/html; charset=iso-8859-1';
      $headers[] = 'From: test@example.com';

      // mail($to, $subject, $message, implode("\r\n", $headers));

      echo json_encode(['code' => 200, 'success' => 'Success']);
   }
}
