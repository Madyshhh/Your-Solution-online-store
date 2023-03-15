<?php

include 'header.php';


echo '<title>Your solution | Track order</title>';
echo '<link rel="stylesheet" href="css/trackorder.css">';
?>

<main>
    <!-- Breadcrumb trail -->
    <div class="breadcrumb-trail">
        <p><a href="index.php">Home</a> > <a href="trackorder.php">Track your order</a></p>
    </div>

    <!-- Main heading of the page -->
    <h3 class="main-heading">Track your order</h3>

    <!-- Box containing all details -->
    <div class="content-box">
        <p>Check the progress of your <b>delivery</b>.</p>
        <p>Your tracking number is likely to be 10 digit number, starting with YOS.</p>

        <!-- Order tracking form -->
        <form action="trackorder.php" id="tracking" method="POST">
            <input type="text" id="tracking-number" placeholder="Tracking number" name="tracking-number" required>

            <input type="text" id="postcode" placeholder="Postcode" name="postcode" required>

            <button type="submit" form="tracking" id="track-order" name="track-order" onClick="clearform()">Track your order</button>

        </form><br>

        <?php
        include 'functions.php';
        include 'database.php';

        // if statement checks if user pressed 'track your order' button
        if (isset($_POST['track-order'])) {
            // gets the information from the input fields
            $trackingNumber = mysqli_real_escape_string($conn, $_POST['tracking-number']);
            $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);

            // sends an error message if postcode or tracking number is in wrong format
            if (invalidPostcode($postcode) !== false) {
                echo "<p class=\"errormessage\">Wrong postcode!</p>";
            } else if (invalidTrackNumber($trackingNumber) !== false) {
                echo "<p class=\"errormessage\">Wrong tracking number!</p>";
            } else {
                // selects order number, status and postcode from user order table and user_adress table to validate order number and postcode when tracking
                $sql = "SELECT order_number, status, postcode,o.id, a.user_id  FROM user_order o JOIN user_address a ON o.user_id = a.user_id WHERE order_number LIKE '$trackingNumber' 
                AND postcode LIKE '$postcode';";
                // queries the database
                $result = mysqli_query($conn, $sql);
                $queryResult = mysqli_num_rows($result);

                // if any record received from the query, show the result, if not, show no results 
                if ($queryResult > 0) {
                    // displays all orders that match the search
                    while ($row = mysqli_fetch_assoc($result)) {
                        // prints the details of order in html
                        echo "
                            <div class='show-status'>
                            <p><b>Order number:</b></p><p>&emsp;" . $row['order_number'] . "</p>
                            <p><b>Status of the order:</b></p><p>&emsp;" . $row['status'] . "</p>
                            </div>
                        ";
                    }
                } else {
                    echo "
                            <div class='show-status'>
                            <p><b>There are no results matching your search!</b></p>
                            </div>
                        ";
                }
            }
        }

        ?>


    </div>



    <!-- Footer -->
    <footer>

        <p>All rights reserved "Your solution LTD" 2022</p>

    </footer>
</main>
</body>

</html>