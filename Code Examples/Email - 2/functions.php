<?php
/**
 * @copyright 	2018 Noah Heck
 * @since 		2018-09-17
 */

/**
 * Validates the provided email address
 *
 * @return bool
 */
function isValidEmailAddress($emailAddress) {
    return preg_match('/^[\w\.\-]+\@[\w\.\-]\.[\w]{2,10}$/', $emailAddress);
}

/**
 * Validates the provided subject for an email message
 *
 * @return bool
 */
function isValidSubject($subject) {
    return preg_match('/^[\w- ]+$/', $subject);
}

/**
 * Formats the message body of an email message
 *
 * @return string
 */
function formatMessage($message) {
    return wordwrap($message, 70, "\n");
}
