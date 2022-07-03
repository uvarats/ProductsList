<?php

declare(strict_types=1);

namespace App\Persistence;

use mysqli;
use mysqli_result;

class MySQL
{
    private mysqli $db;

    public function __construct()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->db = new mysqli(
            $_ENV['DB_HOST'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD'],
            $_ENV['DB_DATABASE']
        );
        $this->db->set_charset('utf8mb4');
        $this->db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
    }

    /**
     * @return mysqli
     */
    public function getDb(): mysqli
    {
        return $this->db;
    }

    private function getParamTypes(array $params): string
    {
        $types = "";
        if ($params) {
            foreach ($params as $param) {
                $typeSymbol = gettype($param)[0];
                if (in_array($typeSymbol, ['i', 'd', 's'])) {
                    $types .= $typeSymbol;
                    continue;
                }
                $types .= 's';
            }
        }
        return $types;
    }
    public function preparedQuery(string $query, array $params = []): false|mysqli_result
    {
        $db = $this->getDb();
        $stmt = $db->prepare($query);
        $types = $this->getParamTypes($params);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        return $stmt->get_result();
    }
    public function query(string $query): mysqli_result|bool
    {
        return $this->db->query($query);
    }
}
