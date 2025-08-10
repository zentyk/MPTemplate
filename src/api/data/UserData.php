<?php

namespace data;

use common\dbConnection;

require_once 'common/dbConnection.php';

class UserData {
    private dbConnection $connection;
    public function __construct() {
        $this->connection = new DbConnection();
    }

    public function CreateUser($userentity): bool {
        try {
            $this->connection->Connect();
        } catch(Exception $e) {
            return false;
        }

        $stmt = mysqli_prepare(
            $this->connection->connection,
            "INSERT INTO users (name) VALUES (?)"
        );
        mysqli_stmt_bind_param($stmt, "s", $userentity->userName);

        try {
            mysqli_stmt_execute($stmt);
        } catch (Exception $e){
            return false;
        }

        return true;
    }
}