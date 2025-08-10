<?php

namespace common;

require_once 'connectionConfig.php';

class dbConnection {
    public \mysqli $connection;
    public $error;

    /**
     * @return \mysqli
     */
    public function Connect(): bool {
        $config = new ConnectionConfig();
        $this->connection = mysqli_connect($config->host, $config->user, $config->password, $config->database);
        if ($this->connection->connect_error) {
            $this->error = $this->connection->connect_error;
            return false;
        } else {
            $this->error = null;
            return true;
        }
    }

    public function __destroy(): void {
        $this->connection->close();
    }
}