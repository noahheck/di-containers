<?php
/**
 * @copyright   2018 Noah Heck
 * @since       2018-09-17
 */

$di->addDefinition('email.sender', function() use ($di) {
    return new App\EmailSender(new App\LocalClient());
});
