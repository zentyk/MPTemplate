<?php

namespace common;

class connectionConfig {
    public $host;
    public $user;
    public $password;
    public $database;

    public function __construct() {
        // 'db is the name of the host in Docker', use other configs in prod.
        $this->host = 'db';
        $this->user = 'user';
        $this->password = 'password';
        $this->database = 'mp_template';
    }
}