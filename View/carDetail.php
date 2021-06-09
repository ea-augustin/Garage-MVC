<?php
include 'Components/header.php';

?>

<body id="home" data-spy="scroll" data-target="#main-nav">

<!--Navigation Bar-->
<?php include 'Components/menu.php'; ?>
<!--/Navigation Bar-->

<!-- SHOWCASE -->
<section id="showcase" class="py-5 mt-5">
    <div class="primary-overlay text-white text-center">
        <div class="container">
            <h1> Car Details</h1>
            <span class="btn btn-dark"><a  href="index.php?controller=car&action=list"
                                           class="nav-link text-white">Car List</a> </span>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Action</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>+</td>
                    <td>-</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>+</td>
                    <td>-</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    <td>+</td>
                    <td>-</td>
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

