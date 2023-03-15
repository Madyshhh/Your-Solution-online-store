<?php

include 'header.php';

echo '<title>Your solution | Your details</title>';
echo '<link rel="stylesheet" href="css/userdetails.css">';

?>

<main>
    <!-- Breadcrumb trail -->
    <div class="breadcrumb-trail">
        <p><a href="index.php">Home</a> > <a href="basket.php">Basket</a> > <a href="userdetails.php">Your
                details</a></p>
    </div>

    <h3 class="main-heading">Enter your details</h3>

    <!-- Main box containing form -->
    <div class="content-box">
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyinput") {
                echo "<p class=\"errormessage\">Please fill in all fields!</p>";
            } else if ($_GET['error'] == "invalidname") {
                echo "<p class=\"errormessage\">Please enter a correct name!</p>";
            } else if ($_GET['error'] == "invalidlastname") {
                echo "<p class=\"errormessage\">Please enter a correct last name!</p>";
            } else if ($_GET['error'] == "invalidemail") {
                echo "<p class=\"errormessage\">Please enter a correct email!</p>";
            } else if ($_GET['error'] == "invalidphonenumber") {
                echo "<p class=\"errormessage\">Please enter a correct phone number!</p>";
            } else if ($_GET['error'] == "invalidstreet") {
                echo "<p class=\"errormessage\">Please enter a correct street number and name!</p>";
            } else if ($_GET['error'] == "invalidcity") {
                echo "<p class=\"errormessage\">Please enter a correct city!</p>";
            } else if ($_GET['error'] == "invalidcountry") {
                echo "<p class=\"errormessage\">Please enter a valid country!</p>";
            } else if ($_GET['error'] == "invalidpostcode") {
                echo "<p class=\"errormessage\">Please enter a correct UK postcode!</p>";
            } else if ($_GET['error'] == "passwordnotmatch") {
                echo "<p class=\"errormessage\">Passwords doesn`t match!</p>";
            } else if ($_GET['error'] == "userexists") {
                echo "<p class=\"errormessage\">User with this email address already exists!</p>";
            } else if ($_GET['error'] == "statementfailed") {
                echo "<p class=\"errormessage\">Oops! Something went wrong, try again!</p>";
            } else if ($_GET['error'] == "cantcreate") {
                echo "<p class=\"errormessage\">Oops! Something went wrong, try again!</p>";
            } else if ($_GET['error'] == "cantcreatenr2") {
                echo "<p class=\"errormessage\">Oops! Something went wrong, try again!</p>";
            }
        }
        ?>
        <!-- Form for user details -->
        <form action="processReg.php" class="user-details-form" method="POST">
            <label for="name">Your details</label><br>
            <input type="text" name="name" id="name" placeholder="Name*">
            <input type="text" name="lname" id="lname" placeholder="Surname*">
            <input type="email" name="email" id="email" placeholder="Email*">
            <input type="tel" name="pnumber" id="pnmber" placeholder="Phone number*"><br>
            <label for="street">Your address</label><br>
            <input type="text" name="street" id="street" placeholder="Street name and number*">
            <!-- Wrapper div to position in flex, next to each other -->
            <div class="wrapper">
                <input type="text" name="city" id="city" placeholder="City*">
                <input type="text" name="postcode" id="postcode" placeholder="Postcode*">
            </div>
            <input type="text" name="country" id="country" placeholder="Country*"><br>
            <label for="password">Choose a password</label><br>
            <input type="password" name="password" id="password" placeholder="Password*">
            <input type="password" name="repeat-password" id="repeat-password" placeholder="Repeat password*">

            <p class="terms">By clicking proceed you agree to our <a href="#">Terms and conditions</a></p>

            <!-- Proceed button -->
            <button type="submit" class="proceed-button" action="deliverydate.php" name="proceed">Proceed</button>
        </form>
    </div>


    <?php
    include 'footer.php';
    ?>
</main>
</body>

</html>