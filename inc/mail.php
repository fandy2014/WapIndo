<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$formcontent=" From: $name \n Email : $email \n No. Telp : $phone \n Message : $message ";
$recipient = "hostid.us@gmail.com";
$subject = "Kontak form WapIndo";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
header('Location: index.php?notif=Suksess Brad!!');
?>
