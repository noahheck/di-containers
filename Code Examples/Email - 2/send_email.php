<?php
/**
 * @copyright 	2018 Noah Heck
 * @since 		2018-09-17
 */

require_once 'functions.php';

$to      = $_POST['to'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$isValidRecipient = isValidEmailAddress($to);

$isValidSubject = isValidSubject($subject);

if (!$isValidRecipient || !$isValidSubject) {
    // Do something to let the user know their message can't be sent

    exit;
}

$formattedMessage = formatMessage($message);

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
