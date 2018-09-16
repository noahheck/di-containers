<?php
/**
 * @copyright 	2018 Noah Heck
 * @since 		2018-09-17
 */

namespace App;

class EmailMessage
{
    /**
     * @var string
     */
    private $recipient;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $message;

    /**
     * @var array
     */
    private $headers;

    public function __construct($recipient = '', $subject = '', $message = '', $headers = [])
    {
        if ($recipient) {
            $this->setRecipient($recipient);
        }

        if ($subject) {
            $this->setSubject($subject);
        }

        if ($message) {
            $this->setMessage($message);
        }

        if ($headers) {
            $this->setHeaders($headers);
        }
    }

    /**
     * Gets the provided property
     *
     * @magic
     * @param string $name
     * @return mixed
     * @throws Exception
     */
    public function __get($name)
    {
        if (!in_array($name, ['recipient', 'subject', 'message', 'headers',])) {
            throw new \Exception("Attempting to access non-existent property ({$name}) of EmailMessage");
        }

        return $this->$name;
    }

    /**
     * Sets the recipient for the message
     *
     * @param string $recipient
     * @return EmailMessage
     * @throws Exception
     */
    public function setRecipient($recipient)
    {
        if (!preg_match('/^[\w\.\-]+\@[\w\.\-]\.[\w]{2,10}$/', $recipient)) {
            throw new \Exception("Invalid recipient email address: {$recipient}");
        }

        $this->recipient = $recipient;

        return $this;
    }

    /**
     * Sets the subject for the message
     *
     * @param string $subject
     * @return EmailMessage
     * @throws Exception
     */
    public function setSubject($subject)
    {
        if (!preg_match('/^[\w- ]+$/', $subject)) {
            throw new \Exception("Invalid subject: {$subject}");
        }

        $this->subject = $subject;

        return $this;
    }

    /**
     * Sets the body of the message
     *
     * @param string $message
     * @return EmailMessage
     * @throws Exception
     */
    public function setMessage($message)
    {
        $formattedMessage = wordwrap($message, 70, "\n");

        if (!$formattedMessage) {
            throw new \Exception("Can't send message with empty body");
        }

        $this->message = $message;

        return $this;
    }

    /**
     * Sets the headers for the message
     *
     * @param array $headers
     * @return EmailMessage
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * Adds a header to the message
     *
     * @param string $name
     * @param string $value
     * @return EmailMessage
     */
    public function addHeader($name, $value)
    {
        $this->headers[$name] = $value;

        return $this;
    }
}
