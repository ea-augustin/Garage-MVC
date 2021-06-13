<?php
include 'components/header.php';
?>
<html lang="">
<body id="home" data-spy="scroll" data-target="#main-nav">

<!--Navigation Bar-->
<?php include 'components/menu.php'; ?>
<!--/Navigation Bar-->

<!-- SHOWCASE -->
<section id="showcase" class="">
    <div class="primary-overlay text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mt-5 pt-5">
                    <h2>Register</h2>
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="username" name="username"
                                   aria-describedby="usernameHelp"
                                   placeholder="Username" value="<?php echo ((isset($lastentered['username'])) ?
                                $lastentered['username'] : '')
                            ?>">
                            <div id="login" class="form-text">We'll never share your details with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                   aria-describedby="firstnameHelp"
                                   placeholder="Firstname" value="<?php echo ((isset($lastentered['firstname'])) ?
                                $lastentered['firstname'] : '')
                            ?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                   aria-describedby="lastnameHelp"
                                   placeholder="Lastname" value="<?php echo ((isset($lastentered['lastname'])) ?
                                $lastentered['lastname'] : '')
                            ?>">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email"
                                   aria-describedby="emailHelp"
                                   placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="address" name="address"
                                   aria-describedby="addressHelp"
                                   placeholder="Address" value="<?php echo ((isset($lastentered['address'])) ?
                                $lastentered['address'] : '')
                            ?>">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword"
                                   placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                            <label for="profileImg" class="text-white">Image</label><br>
                            Profile Image: <input type="file" name="profileImg"> <br>
                            <span>jpg,jpeg,gif and png files only</span>
                        </div>

                        <button type="submit" class="btn btn-dark">Submit</button>
                    </form>
                    <?php
                      require 'Components/error.php';
                    ?>

                </div>

            </div>
        </div>
    </div>
</section>


<!-- FOOTER -->
<?php include 'components/footer.php';
include 'components/global-javascript.php'; ?>
<!-- /FOOTER -->

</body>
</html>


