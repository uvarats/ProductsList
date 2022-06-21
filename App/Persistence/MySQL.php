<?php

namespace App\Persistence;

use mysqli;

class MySQL
{
    private mysqli $connection;

    public function __construct()
    {
        /** @var DBCredentials $credentials */
        $credentials = include dirname(__DIR__, 2) . '/config/db.php';
        $this->connection = new mysqli(
            $credentials->getHost(),
            $credentials->getUsername(),
            $credentials->getPassword(),
            $credentials->getDbname()
        );
    }

    /**
     * @return mysqli
     */
    public function getConnection(): mysqli
    {
        return $this->connection;
    }
}
