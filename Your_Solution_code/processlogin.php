<?php

/**
 * Gets the data entered by user from the log in form
 * Handles an error if the fields are empty and calls a function to log in user
 */

// gets the data from log in form
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    require_once 'database.php';
    require_once 'functions.php';

    // error handling empty fields
    if (emptyInputLogin($email, $password) !== false) {
        header("location: login.php?error=emptyinput");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: login.php?error=invalidemail");
        exit();
    }

    // calls a function from the functions.php
    loginUser($conn, $email, $password);
} else {
    header("location: login.php?error=loginfailed");
    exit();
}


// EOF