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
                <h2>Login</h2>
                <form method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="username" name="username"
                               aria-describedby="usernameHelp"
                               placeholder="Username" value="<?php echo ((isset($lastentered['username'])) ?
                            $lastentered['username'] : '')
                        ?>">
                        <div id="login" class="form-text">We'll never share your details with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <a class="text-white" href="index.php?controller=security&action=register"><label
                                    class="register"
                                    for="register">Register</label></a>
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

