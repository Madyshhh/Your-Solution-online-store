<?php

include 'header.php';
echo '<title>Your solution | Delivery date</title>';
echo '<link rel="stylesheet" href="css/deliverydate.css">';
?>

<main>
    <!-- Breadcrumb trail -->
    <div class="breadcrumb-trail">
        <p><a href="index.html">Home</a> > <a href="basket.html">Basket</a> > <a href="deliverydate.html">Delivery
                date</a></p>
    </div>

    <!-- Main heading of the page -->
    <h3 class="main-heading">Choose a delivery date</h3>

    <div class="content-box">

        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "statementfailed") {
                echo "<p class=\"errormessage\">Oops! Something went wrong, try again!</p>";
            } else if ($_GET['error'] == "cantcreate") {
                echo "<p class=\"errormessage\">Oops! Something went wrong, try again!</p>";
            } else if ($_GET['error'] == "cantcreatenr2") {
                echo "<p class=\"errormessage\">Oops! Something went wrong, try again!</p>";
            }
        }
        ?>

        <form action="" id="delivery-form">
            <!-- Contains boxes for each delivery date -->
            <div class="delivery-dates">
                <div class="date">
                    <p>1st of May</p>
                </div>
                <div class="date">
                    <p>1st of May</p>
                </div>
                <div class="date">
                    <p>1st of May</p>
                </div>
                <div class="date">
                    <p>1st of May</p>
                </div>
                <div class="date">
                    <p>1st of May</p>
                </div>
                <div class="date">
                    <p>1st of May</p>
                </div>
                <div class="date">
                    <p>1st of May</p>
                </div>
                <div class="date">
                    <p>1st of May</p>
                </div>
                <div class="date">
                    <p>1st of May</p>
                </div>
            </div>

            <button type="submit" disabled id="proceed">Proceed</button>
        </form>
    </div>


    <!-- Footer -->
    <footer>

        <p>All rights reserved "Your solution LTD" 2022</p>

    </footer>
</main>
</body>

</html>