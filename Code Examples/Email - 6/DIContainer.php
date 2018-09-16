<?php
/**
 * @copyright 	2018 Noah Heck
 * @since 		2018-09-17
 */

namespace App;

class DIContainer
{
    /**
     * @var array
     */
    private $definitions;

    /**
     * @var array
     */
    private $services;

    /**
     * @param string $identifier
     * @param callable $callback
     * @return DIContainer
     */
    public function addDefinition($identifier, $callback)
    {
        $this->definitions[$identifier] = $callback;

        return $this;
    }

    /**
     * @param string $identifier
     * @return object
     * @throws \Exception
     */
    public function getService($identifier)
    {
        if (!$this->definitions[$identifier]) {
            throw new \Exception("Unknown service {$identifier}");
        }

        if (!$this->services[$identifier]) {
            $this->services[$identifier] = $this->definitions[$identifier]();
        }

        return $this->services[$identifier];
    }
}
