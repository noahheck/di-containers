<?php
/**
 * @copyright   2018 Noah Heck
 * @since       2018-09-17
 */

$di->addDefinition('email.mailgun_client', function() use ($di, $config) {
    return new MailGun\Client($config['mailgun']['username'], $config['mailgun']['password']);
});

$di->addDefinition('email.sender', function() use ($di) {
    $client = $di->getService('email.mailgun_client');

    return new App\EmailSender($client);
});
