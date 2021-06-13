<?php
include 'Components/header.php';
?>

<body id="home" data-spy="scroll" data-target="#main-nav">

<!--Navigation Bar-->
<?php include 'Components/menu.php'; ?>
<!--/Navigation Bar-->

<!-- SHOWCASE -->
<main class="mt-5">
    <div class="container">
        <h2><a href="index.php?controller=security&action=profiles"> <i class="fa fa-arrow-left"></i></a></h2>
    </div>
    <section>
        <div class="container">
            <div class="jumbotron text-center outline-danger">
                <h1 class="display-4"><?php echo($user->getUsername()) ?></h1>
                <img style="max-width:200px" src="<?php echo('images/profiles/'.$user->getImage()); ?>"
                     alt="User Image <?php echo($user->getImage()); ?>">
                <p class="lead"><?php echo($user->getFirstname()) ?><?php echo($user->getLastname()) ?></p>
                <hr class="my-4">
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                </p>
            </div>
        </div>
    </section>
</main>


<!-- FOOTER -->
<?php include 'Components/footer.php';
include 'Components/global-javascript.php'; ?>
<!-- /FOOTER -->

</body>
</html>


