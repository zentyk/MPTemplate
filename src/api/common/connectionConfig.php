<?php

namespace common;

class connectionConfig {
    public $host;
    public $user;
    public $password;
    public $database;

    public function __construct() {
        $config = parse_ini_file(__DIR__.'../../../config.ini', true);
        $this->host = $config['database']['hostname'];
        $this->user = $config['database']['username'];
        $this->password = $config['database']['password'];
        $this->database = $config['database']['database'];
    }
}