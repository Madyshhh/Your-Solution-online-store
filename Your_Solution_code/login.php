<?php
    require 'header.php';
    
    echo '<title>Your solution | Log in</title>';
    echo '<link rel="stylesheet" href="css/login.css">';
    
?>
<main>
    <!-- Breadcrumb trail -->
    <div class="breadcrumb-trail">
        <p><a href="index.php">Home</a> > <a href="login.php">Log in</a></p>
    </div>

    <h3 class="main-heading">Enter your details to log in</h3>

    <div class="login-form">
        <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == "emptyinput"){
                echo "<p class=\"errormessage\">Please fill in all fields!</p>";
            }
            else if($_GET['error'] == "wrongemail"){
                echo "<p class=\"errormessage\">No user with this email registered!</p>";
            }
            else if($_GET['error'] == "wrongpassword"){
                echo "<p class=\"errormessage\">Wrong password entered!</p>";
            }
        }
        ?>
        <form action="processlogin.php" id="user-login" method="POST">
            <input type="text" name="email" id="email" placeholder="Email">
            <input type="password" name="password" id="password" placeholder="Password">

            <p class="forgot-password"> <a href="">Forgot your password?</a></p>

            <button type="submit" class="login-button" name="login">Log in</button>
        </form>

    </div>
    <!-- Footer -->
    <?php
            include 'footer.php';
        ?>
</main>
</body>

</html>