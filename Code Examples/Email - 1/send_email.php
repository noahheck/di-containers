<?php
/**
 * @copyright 	2018 Noah Heck
 * @since 		2018-09-17
 */

$to      = $_POST['to'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$isValidRecipient = preg_match('/^[\w\.\-]+\@[\w\.\-]\.[\w]{2,10}$/', $to);

$isValidSubject = preg_match('/^[\w- ]+$/', $subject);

if (!$isValidRecipient || !$isValidSubject) {
    // Do something to let the user know their message can't be sent

    exit;
}

$formattedMessage = wordwrap($message, 70, "\n");

if (!$formattedMessage) {
    // Can't send an empty message

    exit;
}

$headers = [
    'From'     => 'test@example.com',
    'Reply-To' => 'reply@example.com',
    'CC'       => 'cc@example.com',
];

mail($to, $subject, $message, $headers);

// Notify the user that their email was sent - send HTTP response
