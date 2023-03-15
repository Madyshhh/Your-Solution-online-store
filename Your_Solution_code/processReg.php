<?php

/**
 * processes user registration
 */

// if there is an existing session user, remove it
if (isset($_SESSION['email'])) {
    unset($_SESSION['email']);
}


// gets the values from userdetails form 
if (isset($_POST['proceed'])) { //this if checks if page accessed by pressing proceed button
    $name = trim($_POST['name']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $phoneNum = trim($_POST['pnumber']);
    $street = trim($_POST['street']);
    $city = trim($_POST['city']);
    $postcode = trim($_POST['postcode']);
    $country = trim($_POST['country']);
    $password = trim($_POST['password']);
    $passwordRepeat = trim($_POST['repeat-password']);

    require_once 'database.php';
    require_once 'functions.php';

    // error handling empty fields
    if (emptyInputSignup(
        $name,
        $lname,
        $email,
        $phoneNum,
        $street,
        $city,
        $postcode,
        $country,
        $password,
        $passwordRepeat
    ) !== false) {
        header("location: userdetails.php?error=emptyinput");
        exit();
    }
    // error handling for wrongly entered name, last name, email, phone number, street and postcode
    if (invalidName($name) !== false) {
        header("location: userdetails.php?error=invalidname");
        exit();
    }
    if (invalidLastname($lname) !== false) {
        header("location: userdetails.php?error=invalidlastname");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: userdetails.php?error=invalidemail");
        exit();
    }
    if (invalidPhone($phoneNum) !== false) {
        header("location: userdetails.php?error=invalidphonenumber");
        exit();
    }
    if (invalidStreet($street) !== false) {
        header("location: userdetails.php?error=invalidstreet");
        exit();
    }
    if (invalidPostcode($postcode) !== false) {
        header("location: userdetails.php?error=invalidpostcode");
        exit();
    }
    if (invalidCity($city) !== false) {
        header("location: userdetails.php?error=invalidcity");
        exit();
    }
    if (invalidCountry($country) !== false) {
        header("location: userdetails.php?error=invalidcountry");
        exit();
    }

    // checking if password matches in both fields
    if (passwordMatch($password, $passwordRepeat) !== false) {
        header("location: userdetails.php?error=passwordnotmatch");
        exit();
    }

    // error if user already exists
    if (userExists($conn, $email) !== false) {
        header("location: userdetails.php?error=userexists");
        exit();
    }

    // if no errors, create a new user
    createUser(
        $conn,
        $name,
        $lname,
        $email,
        $phoneNum,
        $street,
        $city,
        $postcode,
        $country,
        $password
    );

    $_SESSION['email'] = $email;
}
// if page not accessed correct way, take user back to userdetails.php
else {
    header("location: userdetails.php");
    exit();
}

// EOF