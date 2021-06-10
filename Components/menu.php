<nav class="navbar navbar-expand-md navbar-light fixed-top py-4" id="main-nav">
    <div class="container">
        <a href="index.php?controller=ad&action=list" class="navbar-brand">
            <i class="fas fa-car"></i>
            <h3 class="d-inline align-middle">Garage-Mvc</h3>
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="index.php?controller=ad&action=list" class="nav-link"><i class="fas fa-home"></i>Home</a>
                </li>
                <?php

                if (!isset($_SESSION) && !isset($_SESSION['login'])) {
                    echo(' <li class="nav-item">
                    <a href="index.php?controller=security&action=login" class="nav-link"><i class="fas fa-user"></i>Login</a>
                </li>');
                }else {
                    echo('<li class="nav-item">
                    <a href="index.php?controller=security&action=logout"  class="nav-link"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </li>');
                }
                ?>
                <?php
                //hide details button when session
                if (isset($_SESSION) && isset($_SESSION['login'])) {
                    echo(' <li class="nav-item">
                    <a href="ShowAllUsers.php" class="nav-link"><i class="fas fa-table fa-x2"></i>User Admin</a>
                </li>');
                    echo(' <li class="nav-item">
                    <a href="ShowAllArticles.php" class="nav-link"><i class="fas fa-table fa-x2"></i>Article Admin</a>
                </li>');
                }
                ?>
                <li class="nav-item">
                    <a href="index.php?controller=security&action=register" class="nav-link">Register</a>
                </li>
                <li class="nav-item">

                    <a href="index.php?controller=car&action=list" class="nav-link"><i class="fas fa-car-side"></i></a>
                </li>
                <li class="nav-item">
                    <a href="index.php?controller=car&action=detail" class="nav-link">Details</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?controller=ad&action=list" class="nav-link"><i class="far fa-newspaper"></i></a>
                </li>
                <li class="nav-item">
                    <a href="index.php?controller=admin&action=home" class="nav-link"><i class="fas fa-tools"></i></a>
                </li>
                <li class="nav-item">
                    <a href="index.php?controller=user&action=profile" class="nav-link"><i class="fas fa-users"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
