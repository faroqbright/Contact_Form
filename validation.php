<?php

function validateName($name)
{
   $error = "";
   $field = "name";

   if ($name == "") {
      $error = "Name is required";
      return ["error" => $error, "field" => $field];
   }

   if (!preg_match("/^[a-zA-z ]*$/", $name)) {
      $error = "Only Letters and Space allowed in name";
      return ["error" => $error, "field" => $field];
   }


   if (strlen($name) < 3 || strlen($name) > 30) {
      $error = "Name length is invalid (must between 3-30)";
      return ["error" => $error, "field" => $field];
   }

   return;
}


function validateEmail($email)
{
   $error = "";
   $field = "email";

   if ($email == "") {
      $error = "Email is required";
      return ["error" => $error, "field" => $field];
   }

   if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) {
      $error = "Enter valid email";
      return ["error" => $error, "field" => $field];
   }

   return;
}

function validatePhone($phone)
{
   $error = "";
   $field = "phone";

   if ($phone == "") {
      $error = "Phone is required";
      return ["error" => $error, "field" => $field];
   }

   if (!preg_match("/^\+?[0-9\s-]+$/", $phone)) {
      $error = "Enter valid phone number";
      return ["error" => $error, "field" => $field];
   }

   return;
}


function validateSubject($subject)
{
   $error = "";
   $field = "subject";

   if ($subject == "") {
      $error = "Subject is required";
      return ["error" => $error, "field" => $field];
   }


   if (strlen($subject) < 10 || strlen($subject) > 100) {
      $error = "Subject length is invalid (must between 10-100)";
      return ["error" => $error, "field" => $field];
   }

   return;
}

function validateMessage($message)
{
   $error = "";
   $field = "message";

   if ($message == "") {
      $error = "Message is required";
      return ["error" => $error, "field" => $field];
   }


   if (strlen($message) < 10 || strlen($message) > 1000) {
      $error = "Message length is invalid (must between 10-1000)";
      return ["error" => $error, "field" => $field];
   }

   return;
}


function validateRecaptcha($recaptcha)
{
   $error = "";
   $field = "reCAPTCHA";

   if ($recaptcha == "") {
      $error = "Recaptha is invalid";
      return ["error" => $error, "field" => $field];
   }



   return;
}
