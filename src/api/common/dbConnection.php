<?php

namespace common;

class dbConnection {
    public $connection;
    public $error;

    /**
     * @return \mysqli
     */
    public function Connect($h,$u, $p,$db): \mysqli {
       $this->connection = mysqli_connect($h, $u, $p, $db);
        if ($this->connection->connect_error) {
            $this->error = $this->connection->connect_error;
        } else {
            $this->error = null;
        }

        return $this->connection;
    }
}