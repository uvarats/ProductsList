<?php

declare(strict_types=1);

namespace App\Persistence;

use mysqli;

class MySQL
{
    private mysqli $connection;

    public function __construct()
    {
        $this->connection = new mysqli(
            env['DB_HOST'],
            env['DB_USER'],
            env['DB_PASSWORD'],
            env['DB_DATABASE']
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
