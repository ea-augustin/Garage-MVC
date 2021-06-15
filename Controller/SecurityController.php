<?php


class SecurityController
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

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
                $loggedUser = $this->userManager->login($_POST['username'],$_POST['password']);
                if ($loggedUser) {
                    $_SESSION['user'] = serialize($loggedUser);
                    header('Location: index.php?controller=car&action=list');
                } else {
                    $errors[] = 'This user does not exist';
                }
            }

        }
        require 'View/loginPage.php';
    }


    public function checkErrors()
    {

        $errors = [];
        $lastentered = [];

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
        } elseif (strlen($_POST['password']) < 8) {
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
        return $errors;

    }


    public function registerPage()

    {
        $errors = [];
        $lastentered = [];


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = $this->checkErrors();


            if ($_FILES['profileImg']) {
                //image prerequisites
                $extension_upload = $_FILES['profileImg']['type'];
                $authorizedExtentions = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png');
                $filename = "";

                if (($_FILES['profileImg']['size'] > 600000)) {
                    $errors[] = 'The selected image it too large , please choose a smaller image';
                } else {
                    if (in_array($extension_upload, $authorizedExtentions))
                        $filename = uniqid() . '_' . basename($_FILES['profileImg']['name']);
                    $imageUrl = move_uploaded_file($_FILES['profileImg']['tmp_name'], 'images/profiles/' . $filename);
                }
            }

            if (count($errors) == 0) {

                $testUsername = $this->userManager->testExist($_POST['username']);
                $testEmail = $this->userManager->emailExist($_POST['email']);

                if ($testUsername) {
                    $errors[] = 'Sorry user already exists';
                    unset($lastentered['username']);
                }
                if ($testEmail) {
                    $errors[] = 'Sorry email already exists';
                    unset($lastentered['email']);
                }
                if (count($errors) == 0) {
                    $role = 'client';

                    if ($_POST['isAdmin'] == 'on') {
                        $role = "administrator";
                    }
                    $register = new User($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['email']
                        , $_POST['address'], $_POST['password'], $filename, $role);
                    $this->userManager->registerUser($register);
                    header('Location: index.php?controller=security&action=login');
                    exit();
                }

            }


        }
        require 'View/registerPage.php';

    }

    public function log_out()
    {   //Destroy and unset active session
        session_destroy();

        header('Location: index.php?controller=car&action=list');


    }

    public function getAllUserProfiles()
    {
        $users = $this->userManager->getAllUsers();

        require 'View/userProfile.php';
    }


    public function userDetails($id)
    {
        $user = $this->userManager->getOneUser($id);
        $errors = [];
        if ($user) {
            require 'View/userDetails.php';
        } else {
            $errors[] = 'Sorry no user found';
        }

    }

    public function userDelete($id)
    {
        $errors = [];
        $user = $this->userManager->getOneUser($id);

        if ($user != null) {
            $this->userManager->deleteUser($user);
            header('Location: index.php?controller=security&action=profiles');
        } else {
            $errors[] = 'Sorry no user found to be deleted';
            header('Location: index.php?controller=security&action=profiles');
        }

    }


    public function userEdit($id)
    {
        $errors = [];
        $user = $this->userManager->getOneUser($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = $this->checkErrors();

            if (count($errors) == 0) {
                $user = new User($_POST['username'], $_POST['firstname'], $_POST['lastname']
                    , $_POST['email'], $_POST['address'], $_POST['password'], $_POST['image'], $_POST['role'], $user->getId
                    ());
                $this->userManager->updateUser($user);
                header('Location: index.php?controller=security&action=profiles');
                exit();
            }
        }
        require 'View/editProfile.php';

    }

}