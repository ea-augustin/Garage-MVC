<?php
include 'Components/header.php';


?>
<html lang="en">
<body id="home" data-spy="scroll" data-target="#main-nav">

<!--Navigation Bar-->
<?php include 'Components/menu.php'; ?>
<!--/Navigation Bar-->

<!-- SHOWCASE -->
<section id="showcase" class="py-5">
    <div class="primary-overlay text-white">
        <div class="container">
            <div class="col-lg-6 mt-5 pt-5">
                <h2>Add Car</h2>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="brand" name="brand"
                               aria-describedby="brandHelp"
                               placeholder="Brand" value="<?php echo ((isset($lastentered['brand'])) ?  $lastentered['brand'] : '')
                        ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="model" name="model"
                               aria-describedby="modelHelp"
                               placeholder="Model" value="<?php echo ((isset($lastentered['model'])) ?  $lastentered['model'] : '')
                        ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="fuelType" name="fueltype"
                               aria-describedby="fuelTypeHelp"
                               placeholder="FuelType" value="<?php echo ((isset($lastentered['fueltype'])) ?
                            $lastentered['fueltype'] : '')
                        ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="horsepower" name="horsepower"
                               aria-describedby="horsepowerHelp"
                               placeholder="Horsepower" value="<?php echo ((isset($lastentered['horsepower'])) ?
                            $lastentered['horsepower'] : '')
                        ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="price" name="price"
                               aria-describedby="priceHelp"
                               placeholder="Price" value="<?php echo ((isset($lastentered['price'])) ?  $lastentered['price'] : '')
                        ?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="description" name="description"
                               aria-describedby="descriptionHelp"
                               placeholder="Description" value="<?php echo ((isset($lastentered['description'])) ?
                            $lastentered['description'] : '')
                        ?>">
                    </div>
                    <div class="form-group">
                        <label for="carImg" class="text-white">Image</label><br>
                        Profile Image: <input type="file" name="carImg"> <br>
                        <span>jpg,jpeg,gif and png files only</span>
                    </div>
                    <?php
                    require 'Components/error.php';

                    ?>

                    <button type="submit" class="btn btn-dark">Submit</button>

                </form>


            </div>
        </div>
    </div>


</section>


<!-- FOOTER -->
<?php include 'Components/footer.php';
include 'Components/global-javascript.php'; ?>
<!-- /FOOTER -->

</body>
</html>

