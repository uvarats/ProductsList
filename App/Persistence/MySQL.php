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
            $_ENV('DB_HOST'),
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD'],
            $_ENV['DB_DATABASE']
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
