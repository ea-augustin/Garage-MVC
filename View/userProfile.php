<?php

include 'Components/header.php';

?>

<body id="home" data-spy="scroll" data-target="#main-nav">

<!--Navigation Bar-->
<?php include 'Components/menu.php'; ?>
<!--/Navigation Bar-->

<!-- SHOWCASE -->
<section  class="py-5 mt-5 ">
    <div class="primary-overlay">
        <div class="container">
            <h1> User Profiles</h1>
            <span class="btn btn-dark my-2"><a  href="index.php?controller=admin&action=manage"
                                           class="nav-link text-white ">Account Management</a> </span>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Role</th>
                    <th scope="col">Image</th>
                    <th scope="col">Details</th>
                    <th scope="col">Add</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($users as $user) {

                    echo('
                    <tr>
                    <td>' . $user->getId() . '</td>
                    <td>' . $user->getUsername() . '</td>
                    <td>' . $user->getFirstname() . '</td>
                    <td>' . $user->getLastname() . '</td>
                     <td>' . $user->getEmail() . '</td>
                    <td>' . $user->getAddress() . '</td>
                    <td>' . $user->getRole() . '</td>
                    <td><img src="images/profiles/' . $user->getimage() . ' " style="height:200px; width:300px;" alt=' .
                        $user->getUsername() . '></td>
                    <td class=""><a href="index.php?controller=security&action=details&id=' . $user->getId() . ' "><i class="fas fa-binoculars bg-light"></i></a></td>  
                    <td class=""><a href= "index.php?controller=security&action=register"><i class="fas fa-plus bg-light"></i></a></td>  
                       <td class=""><a href= "index.php?controller=security&action=edit&id=' . $user->getId() . ' "><i class="fas fa-user-edit"></i></a></td>  
                    <td class=""><a href="index.php?controller=security&action=delete&id=' . $user->getId() . ' "><i class="fas fa-minus"></i></a></td> 
                </tr>
                    ');
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>


</section>


<!-- FOOTER -->
<?php include 'Components/footer.php';
include 'Components/global-javascript.php'; ?>
<!-- /FOOTER -->

</body>
</html>


