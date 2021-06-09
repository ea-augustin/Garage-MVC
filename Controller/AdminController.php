<?php


class AdminController
{
    public function adminDashboard() {
        require 'View/adminDashboard.php';

    }

    public function adminManage() {

        require 'View/adminManager.php';
    }
}