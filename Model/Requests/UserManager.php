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
                $result['address'], $result['password'], $result['image']);
        }

        return $user;
    }


    public function registerUser(User $user)
    {
        $query = $this->database->prepare('INSERT INTO users (image,username,firstname,lastname,email,address,password) 
                                       VALUES (:image,:username,:firstname,:lastname,:email,:address,:password)');

        $query->execute([
            'image' => $user->getImage(),
            'username' => $user->getUsername(),
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
            'email' => $user->getEmail(),
            'address' => $user->getAddress(),
            'password' => $user->getPassword(),

        ]);
    }


    public function getAllUsers()
    {
        $userTable = [];

        $query = $this->database->prepare('SELECT * FROM users');
        $query->execute();
        $results = $query->fetchAll();

        foreach ($results as $result) {
            $userTable[] = new User($result['username'], $result['firstname'], $result['lastname'], $result['email'],
                $result['address'], $result['password'], $result['image'],$result['id']);
        }

        return $userTable;

    }

}