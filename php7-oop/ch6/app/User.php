<?php

namespace App;

use Eclair\Database\Adaptor;

/* CREATE TABLE users (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `email` VARCHAR(255) UNIQUE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
); */

class User
{
    /**
     * Create a new User
     */
    public function create()
    {
        return Adaptor::exec(
            'INSERT INTO users(`email`, `password`) VALUES(?, ?)',
            [ $this->email, $this->password ]
        );
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return current(explode('@', $this->email));
    }
}
