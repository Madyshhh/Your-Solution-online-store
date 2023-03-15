<?php
// functions for error handling, for user input

// checks if strings not empty
function emptyInputSignup(
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
) {
    $result = false;

    if (
        empty($name) || empty($lname) || empty($email) || empty($phoneNum) ||
        empty($street) || empty($city) || empty($postcode) || empty($country) || empty($password) || empty($passwordRepeat)
    ) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// checks if the name and last name contains only letters
function invalidName($name)
{
    $result = false;


    if (!preg_match("/^[a-zA-Z]*$/", $name)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidLastname($lname)
{
    $result = false;


    if (!preg_match("/^[a-zA-Z]*$/", $lname)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// validates the email
function invalidEmail($email)
{
    $result = false;


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// validates phone number - 11 numbers
function invalidPhone($phoneNum)
{
    $result = false;


    if (!preg_match("/^[0-9]{11}$/", $phoneNum)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// validates street name
function invalidStreet($street)
{
    $result = false;


    if (!preg_match("/^(\d+) ?([A-Za-z](?= ))? (.*?) ([^ ]+?) ?/", $street)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// validates UK postcode
function invalidPostcode($postcode)
{
    $result = false;


    if (!preg_match("/^([A-Z]{2}[0-9]{1,2}) ([0-9]{1}[A-Z]{2})/", $postcode)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// Allows to enter only letters for city
function invalidCity($city)
{
    $result = false;


    if (!preg_match("/^[a-zA-Z]*$/", $city)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// Allows to enter only letters for country
function invalidCountry($country)
{
    $result = false;


    if (!preg_match("/^[a-zA-Z]*/", $country)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// checks if passwords doesn`t match
function passwordMatch($password, $passwordRepeat)
{
    $result = false;


    if ($password !== $passwordRepeat) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// checks if user exists in a safe way
function userExists($conn, $email)
{
    $sql = "SELECT * FROM user WHERE email = ?;";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: userdetails.php?error=statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "s", $email);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);
    if ($row = mysqli_fetch_assoc($resultData)) { //returns user details, to be used later on
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($statement);
}

// checks if the tracking number entered is correct
function invalidTrackNumber($trackingNumber)
{
    $result = false;


    if (!preg_match("/^YOS[0-9]{9,10}$/", $trackingNumber)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// creates a user if user doesn`t exist, in a safe way
function createUser(
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
) {
    // query to insert user data into database
    $sql = "INSERT INTO user (first_name, last_name, email, phone_number, pwd) VALUES (?, ?, ?, ?, ?);";
    $statement = mysqli_stmt_init($conn);

    // shows error if data cannot be inserted
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: userdetails.php?error=cantcreate");
        exit();
    }

    // password hash
    $pwHash = password_hash($password, PASSWORD_BCRYPT);

    // passes in the data
    mysqli_stmt_bind_param($statement, "sssss", $name, $lname, $email, $phoneNum, $pwHash);
    mysqli_stmt_execute($statement);

    // gets the last id (auto incremented primary key row) from the last query to pass in when inserting address
    $lastId = mysqli_insert_id($conn);

    mysqli_stmt_close($statement);

    // query to insert data into database
    $addressSql = "INSERT INTO user_address (user_id, street, city, postcode, country) VALUES (?, ?, ?, ?, ?);";
    $addressStatement = mysqli_stmt_init($conn);

    // shows error if data cannot be inserted
    if (!mysqli_stmt_prepare($addressStatement, $addressSql)) {
        header("location: userdetails.php?error=cantcreatenr2");
        exit();
    }

    // passes in the data 
    mysqli_stmt_bind_param($addressStatement, "issss", $lastId, $street, $city, $postcode, $country);
    mysqli_stmt_execute($addressStatement);

    mysqli_stmt_close($addressStatement);

    // after successful creation of user, takes to next page
    header("location: deliverydate.php");
    $_SESSION['email'] = $email;

    exit();
}

// checks if the fields are not empty when logging in
function emptyInputLogin($email, $password)
{
    $result = false;

    // if one of the fields are empty, show error message
    if (empty($email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// function to log user into the website
function loginUser($conn, $email, $password)
{
    $user = userExists($conn, $email);

    // checks if the email exists
    if ($user == false) {
        header("location: login.php?error=wrongemail");
        exit();
    }

    // gets the hashed password from database
    $passwordHashed = $user['pwd'];

    // compares the password from database to the password entered
    $checkPassword = password_verify($password, $passwordHashed);

    // if password is incorrect, shows an error message
    if ($checkPassword == false) {
        header("location: login.php?error=wrongpassword");
        exit();
    }
    // if password correct, creates a user session
    else if ($checkPassword == true) {
        userSession($user);
    }
}

// function to create a user session when user logs in
function userSession($user)
{
    // creates user session
    ini_set('session.use_strict_mode', 1);
    session_start();

    // allows to use the session data when needed
    $_SESSION['email'] = $user['email'];
    $_SESSION['adminLevel'] = $user['admin_level'];
    $_SESSION['name'] = $user['first_name'];

    header('Location: index.php');
    exit();
}

// funtion to create an array for a basket, to store all the items added to it
function addToBasket($item)
{
    $_SESSION['cart'] = array(); // Declaring session array
    array_push($_SESSION['cart'], $item); // Items added to cart
}


//EOF