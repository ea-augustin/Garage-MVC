<?php


class UserManager extends DatabaseConnection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        $query = $this->database->prepare('SELECT * FROM users 
                                       WHERE password = :password 
                                       AND username = :username');
        $query->execute([
            'username' => $username,
            'password' => $password
        ]);

        $result = $query->fetch();

        if ($result) {
            $user = new User($result['username'], $result['firstname'],
                             $result['lastname'], $result['email'],
                             $result['address'], $result['password']);
        }

        return $user;
    }
}