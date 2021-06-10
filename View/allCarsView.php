<?php
include 'Components/header.php';

?>

<body id="home" data-spy="scroll" data-target="#main-nav">

<!--Navigation Bar-->
<?php include 'Components/menu.php'; ?>
<!--/Navigation Bar-->

<!-- SHOWCASE -->
<section  class="py-5 mt-5">

    <div class="primary-overlay ">
        <div class="container">
            <h1> Car View</h1>
            <span class="btn btn-info btn-sm my-3"><a href="index.php?controller=garage&action=list"
                                          class="nav-link text-white">Garages</a> </span>
            <span class="btn btn-info btn-sm"><a href="index.php?controller=car&action=add"
                                          class="nav-link text-white">Add</a> </span>
            <table class="table text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Fuel</th>
                    <th scope="col">HP</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Details</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($vehicles as $vehicle) {
                    echo('
                    <tr>
                    <td>' . $vehicle->getId() . '</td>
                    <td>' . $vehicle->getBrand() . '</td>
                    <td>' . $vehicle->getModel() . '</td>
                    <td>' . $vehicle->getFueltype() . '</td>
                     <td>' .$vehicle->getHorsepower() . '</td>
                    <td>' . $vehicle->getPrice() . '</td>
                    <td>' . $vehicle->getDescription() . '</td>
                    <td>' . $vehicle->getImage() . '</td>
                    <td class=""><a href="index.php?controller=car&action=detail&id='.$vehicle->getId().' "><i class="fas fa-binoculars bg-light"></i></a></td>  
                    <td class=""><a href="index.php?controller=car&action=delete&id='.$vehicle->getId().' "><i class="fas fa-minus"></i></a></td> 
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

