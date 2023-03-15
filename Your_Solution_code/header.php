<?php

ini_set('session.use_strict_mode', 1);
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Favicon for browser tab -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Style sheets -->
    <link rel="stylesheet" href="css/main.css">

    <!-- Font import -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Passion+One&family=Poppins:wght@100;200;400&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <!-- Company logo -->
        <img src="images/logoblue.png" alt="Your solution logo" id="top-logo">

        <div class="flex-wrapper">
            <!-- Search form -->
            <form action="searchresult.php" class="search-form" method="POST">
                <input id="search-field" type="search" placeholder="Search.." name="search">
                <button type="submit" id="search-button" name="submit-search"><img src="images/magnifyingglass.png" alt="Magnifying glass icon" id="search-icon"></button>
            </form>

            <!-- Buttons for mobile screens, part of the navigation menu -->
            <!-- Not visible on large screens -->
            <ul class="mobile-buttons-top">
                <li style="align-self:center" id="mobile-basket-icon"><a href="basket.php"><img src="images/basket.png" alt="Shopping basket" width="30px"></a></li>
                <li style="align-self:center" id="mobile-menu-icon"><a href="#"><img src="images/mobilemenu.png" href="javascript:void(0);" onclick="myFunction()" alt="Mobile menu icon" width="30px"></a></li>
            </ul>
        </div>
        <nav>
            <!-- Desktop navigation -->
            <!-- Not visible on mobile screens -->
            <ul class="nav-list">
                <!-- PHP for class = active, sets the colour on the active page in the menu -->
                <li style="align-self:center" <?php if (basename($_SERVER['PHP_SELF']) == "index.php") {
                                                    echo "class=\"active\"";
                                                } ?>><a href="index.php">Home</a></li>
                <li style="align-self:center" <?php if (basename($_SERVER['PHP_SELF']) == "washingmachines.php") {
                                                    echo "class=\"active\"";
                                                } ?>><a href="washingmachines.php">Washing machines</a></li>
                <li style="align-self:center" <?php if (basename($_SERVER['PHP_SELF']) == "trackorder.php") {
                                                    echo "class=\"active\"";
                                                } ?>><a href="trackorder.php">Track your order</a></li>
                <li style="align-self:center" <?php if (basename($_SERVER['PHP_SELF']) == "contact.php") {
                                                    echo "class=\"active\"";
                                                } ?>><a href="contact.php">Contact us</a></li>
                <li style="align-self:center" <?php if (basename($_SERVER['PHP_SELF']) == "faq.php") {
                                                    echo "class=\"active\"";
                                                } ?>><a href="faq.php">FAQ</a></li>
                <?php
                if (isset($_SESSION['adminLevel'])) {
                    if ($_SESSION['adminLevel'] > 0) {
                        echo "<li style=\"align-self:center\"";
                        if (basename($_SERVER['PHP_SELF']) == "reports.php") {
                            echo "class=\"active\"";
                        }
                        echo "><a href=\"reports.php\">Reports</a></li>";
                    }
                }
                ?>
                <li style="align-self:center" <?php if (basename($_SERVER['PHP_SELF']) == "basket.php") {
                                                    echo "class=\"active\"";
                                                } ?>><a href="basket.php"><img src="images/basket.png" alt="Shopping basket" id="basket-icon"></a></li>

                <?php
                if (isset($_SESSION['email'])) {
                    echo "<li style=\"align-self:center\" class=\"nav-login-button\"><a href=\"processlogout.php\">Log out</a></li>";
                } else {
                    echo "<li style=\"align-self:center\" class=\"nav-login-button\"><a href=\"login.php\">Log in</a></li>";
                }

                ?>
            </ul>
        </nav>

        <!-- Mobile navigation for small screens -->
        <!-- Not visible on large screens -->
        <div class="mobile-navigation">
            <nav id="mobile-nav">
                <ul class="nav-list-mobile">
                    <li style="align-self:center" class="mobile-nav-login-button"><a href="login.php">Log in</a></li>
                    <li style="align-self:center"><a href="index.php">Home</a></li>
                    <li style="align-self:center"><a href="washingmachines.php">Washing machines</a></li>
                    <li style="align-self:center"><a href="trackorder.php">Track your order</a></li>
                    <li style="align-self:center"><a href="contact.php">Contact us</a></li>
                    <li style="align-self:center"><a href="faq.php">FAQ</a></li>
                </ul>
            </nav>
        </div>
        
        <!-- Script for hamburger menu, allows to hide and show navigation in mobile screens -->
        <script>
            function myFunction() {
                var x = document.getElementById("mobile-nav");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>
    </header>