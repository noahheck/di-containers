<?php
/**
 * @copyright 	2018 Noah Heck
 * @since 		2018-09-17
 */

namespace App;

use MailGun\Client;

class MailGunSender
{
    private $mailgunClient;

    public function __construct()
    {
        $this->mailgunClient = new Client('***', '*****');
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
        return $this->mailgunClient->send($message->recipient, $message->subject, $message->message, $message->headers);
    }
}
