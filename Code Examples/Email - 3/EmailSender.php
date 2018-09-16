<?php
/**
 * @copyright 	2018 Noah Heck
 * @since 		2018-09-17
 */

namespace App;

class EmailSender
{
    /**
     * Sends an email message
     *
     * @param App\EmailMessage $message
     * @return bool
     * @throws \Exception
     */
    public function sendMessage(EmailMessage $message)
    {
        if (!\mail($message->recipient, $message->subject, $message->message, $message->headers)) {
            throw new \Exception("Couldn't send the email.");
        }

        return true;
    }
}
