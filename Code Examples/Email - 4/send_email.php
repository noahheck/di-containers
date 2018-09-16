<?php
/**
 * @copyright 	2018 Noah Heck
 * @since 		2018-09-17
 */

require_once 'EmailMessage.php';
require_once 'EmailSender.php';

$to      = $_POST['to'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$headers = [
    'From'     => 'test@example.com',
    'Reply-To' => 'reply@example.com',
    'CC'       => 'cc@example.com',
];

$sender = new App\MailGunSender();

try {
    $email = new App\EmailMessage($to, $subject, $message, $headers);

    $sender->sendMessage($email);

} catch (\Exception $e) {
    // Notify the user their message couldn't be sent
}

// Success! Let the user know their message was sent
