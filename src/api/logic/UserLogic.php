<?php

namespace logic;

use data\UserData;
use entity\User;

require_once 'data/UserData.php';
require_once 'entity/User.php';

class UserLogic {
    private UserData $userData;
    public function __construct() {
        $this->userData = new UserData();
    }

    public function CreateUser($userName): bool {
        $entity = new User($userName);
        $done = $this->userData->CreateUser($entity);

        if($done) {
            return true;
        } else {
            return false;
        }
    }
}