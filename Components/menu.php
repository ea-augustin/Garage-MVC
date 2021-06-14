<?php ?>
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
                    <a href="index.php?controller=ad&action=list" class="nav-link"><i class="fas fa-home"></i></a>
                </li>
                <?php

                if (empty($_SESSION) && !isset($_SESSION['user'])) {
                    echo(' <li class="nav-item">
                    <a href="index.php?controller=security&action=login" class="nav-link"><i class="fas fa-user"></i>Login</a>
                </li>');
                } else {
                    echo('<li class="nav-item">
                    <a href="index.php?controller=security&action=logout"  class="nav-link"><i class="fas fa-sign-out-alt"></i>Logout</a>
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
                    <a href="index.php?controller=admin&action=home" class="nav-link"><i class="fas fa-tools"></i></a>
                </li>
                <li class="nav-item">
                    <a href="index.php?controller=security&action=profiles" class="nav-link"><i class="fas
                    fa-users"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
