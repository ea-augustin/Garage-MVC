<?php
include 'Components/header.php';

?>

<body id="home" data-spy="scroll" data-target="#main-nav">

<!--Navigation Bar-->
<?php include 'Components/menu.php'; ?>
<!--/Navigation Bar-->

<!-- SHOWCASE -->
<section id="showcase" class="py-5 mt-5">

    <div class="primary-overlay text-white">
        <div class="container">
            <h1>Admin Management</h1>
            <span class="btn btn-dark"><a  href="index.php?controller=user&action=profile"
                                           class="nav-link text-white">User Profile</a> </span>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
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


