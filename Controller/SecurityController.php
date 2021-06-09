<?php


class SecurityController
{
    public function loginPage()
    {
        $errors = [];
        $lastentered = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['username'])) {
                $errors[] = 'Please enter a username';
            } else {
                $lastentered['username'] = $_POST['username'];
            }


            if (empty($_POST['password'])) {
                $errors[] = 'Please enter a password';
            }

            if (count($errors) == 0) {
                $user = new User($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['email'],
                    $_POST['address'], $_POST['password']);

                header('Location: index.php?controller=user&action=login');
                exit();
            }
        }

        require 'View/loginPage.php';

    }

    public function registerPage()

    {
        $errors = [];
        $lastentered = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (empty($_POST['username'])) {
                $errors[] = 'Please enter a username';
            } else {
                $lastentered['username'] = $_POST['username'];
            }


            if (empty($_POST['firstname'])) {
                $errors[] = 'Please enter a firstname';
            } else {
                $lastentered['firstname'] = $_POST['firstname'];
            }

            if (empty($_POST['lastname'])) {
                $errors[] = 'Please enter a lastname';
            } else {
                $lastentered['lastname'] = $_POST['lastname'];
            }


            if (empty($_POST['email'])) {
                $errors[] = 'Please enter an email';
            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Please enter a valid email";
            } else {
                $lastentered['email'] = $_POST['email'];
            }


            if (empty($_POST['address'])) {
                $errors[] = 'Please enter an address';
            } else {
                $lastentered['address'] = $_POST['address'];
            }

            $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
            $password = $_POST['password'];

            if (empty($_POST['password'])) {
                $errors[] = 'Please enter a password';
            }
            elseif (strlen($_POST['password']) < 8) {
                $errors[] = 'Please enter a password with at least 8 characters';
            }
//            elseif (password_verify($password, $hash)) {
//                $errors[] = 'Please enter a valid password';
//            }


            if (empty($_POST['confirmpassword'])) {
                $errors[] = 'Please enter the same password as before for confirmation';
            }
            if ($_POST['password'] != $_POST['confirmpassword']) {
                $errors[] = 'Passwords did not match please try again';
            }

            if (count($errors) == 0) {
                $register = new User($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['email']
                    , $_POST['address'], $_POST['password']);
                header('Location: index.php?controller=security&action=login');
                exit();
            }


        }
        require 'View/registerPage.php';

    }

}