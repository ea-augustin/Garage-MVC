<?php


class UserManager extends DatabaseConnection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($username,$password)
    {

        $userClient= null;

        $user= $this->findByUsername($username);

        if ($user) {
            if(password_verify($password,$user->getPassword())){
                $userClient = $user;
            }
        }

        return $userClient;
    }


    public function registerUser(User $user)
    {
        $user->setPassword(password_hash($user->getPassword(),PASSWORD_DEFAULT));
        $query = $this->database->prepare('INSERT INTO users (image,username,firstname,lastname,email,address,password,role) 
                                       VALUES (:image,:username,:firstname,:lastname,:email,:address,:password,:role)');

        $query->execute([
            'image' => $user->getImage(),
            'username' => $user->getUsername(),
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
            'email' => $user->getEmail(),
            'address' => $user->getAddress(),
            'password' => $user->getPassword(),
            'role' => $user->getRole()

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
                $result['address'], $result['password'], $result['image'], $result['role'], $result['id']);
        }

        return $userTable;

    }

    public function getOneUser($id)
    {
        $user = null;
        $query = $this->database->prepare('SELECT * FROM users WHERE id= :id');
        $query->execute(['id' => $id]);
        $results = $query->fetch();

        if ($results) {
            $user = new User($results['username'], $results['firstname'], $results['lastname'], $results['email'],
                $results['address'], $results['password'], $results['image'], $results['role'], $results['id']);
        }
        return $user;
    }

    public function deleteUser(User $user)
    {
        $query = $this->database->prepare('DELETE FROM users WHERE id= :id');
        $query->execute([
            'id' => $user->getId()
        ]);
    }

    public function updateUser(User $user)
    {

        $query = $this->database->prepare("UPDATE users SET username = :username, firstname = :firstname, 
                 lastname= :lastname, email = :email,address = :address, password = :password, image = :image WHERE id = :id");

        $query->execute([
            'username' => $user->getUsername(),
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
            'email' => $user->getEmail(),
            'address' => $user->getAddress(),
            'password' => $user->getPassword(),
            'image' => $user->getImage(),
            'id' => $user->getId()


        ]);
    }

    public function findByUsername($username)
    {
        $user = null;
        $query = $this->database->prepare("SELECT * FROM users WHERE username = :username");
        $query->execute([
            'username' => $username
        ]);
        $userFromDatabase = $query->fetch();
        if ($userFromDatabase) {
            $user = new User($userFromDatabase['username'], $userFromDatabase['firstname'], $userFromDatabase['lastname'],
                $userFromDatabase['email'], $userFromDatabase['address'], $userFromDatabase['password'], $userFromDatabase['image'], $userFromDatabase['role'], $userFromDatabase['id']);
        }

        return $user;

    }

    public function testExist($username)
    {
        $user = $this->findByUsername($username);
        if ($user) {
            return true;
        } else {
            return false;
        }
    }


    public function findUserByEmail($email)
    {
        $user = null;
        $query = $this->database->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute([
            'email' => $email
        ]);
        $userFromDatabase = $query->fetch();
        if ($userFromDatabase) {
            $user = new User($userFromDatabase['username'], $userFromDatabase['firstname'], $userFromDatabase['lastname'],
                $userFromDatabase['email'], $userFromDatabase['address'], $userFromDatabase['password'], $userFromDatabase['image'], $userFromDatabase['role'], $userFromDatabase['id']);
        }

        return $user;

    }

    public function emailExist($email)
    {
        $user = $this->findUserByEmail($email);
        if ($user) {
            return true;
        } else {
            return false;
        }
    }

}