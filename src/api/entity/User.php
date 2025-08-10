<?php

namespace entity;

class User {
    public string $userName;

    public function __construct($userName) {
        $this->userName = $userName;
    }
}