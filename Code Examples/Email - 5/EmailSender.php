<?php
/**
 * @copyright 	2018 Noah Heck
 * @since 		2018-09-17
 */

namespace App;

use EmailClient;

class EmailSender
{
    private $emailClient;

    public function __construct(EmailClient $emailClient)
    {
        $this->emailClient = $emailClient;
    }

    /**
     * Sends an email message
     *
     * @param App\EmailMessage $message
     * @return bool
     * @throws \Exception
     */
    public function sendMessage(EmailMessage $message)
    {
        return $this->emailClient->send($message->recipient, $message->subject, $message->message, $message->headers);
    }
}
