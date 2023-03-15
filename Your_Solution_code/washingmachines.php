<?php

require 'header.php';
include_once 'database.php';
include 'product.php';
echo '<title>Your solution | Washing machines</title>';
echo '<link rel="stylesheet" href="css/washingmachines.css">';

?>

<main>
    <!-- Breadcrumb trail -->
    <div class="breadcrumb-trail">
        <p><a href="index.php">Home</a> > <a href="washingmachines.php">Washing machines</a></p>
    </div>

    <!-- Main heading of the page -->
    <h2>WASHING MACHINES</h2>

    <!-- Div containing all product divs -->
    <div class="products">
        <?php
        // checks if there is any products returned from the query
        if ($resultCheck > 0) {
            // displays all products
            while ($row = mysqli_fetch_assoc($result)) {
                // prints the html in the function from products.php, with the fields from db
                echo washingMachine(
                    $row['image_link'],
                    $row['product_code'],
                    $row['name'],
                    $row['capacity'],
                    $row['size'],
                    $row['energy_rate'],
                    $row['wash_time'],
                    $row['quantity'],
                    $row['price'],
                    $row['discount'],
                    $row['previous_price']
                );
            }
        }
        // no results returned from database
        else {
            echo "No products to show!";
        }

        ?>

    </div>

    <!-- Footer -->
    <?php
    require 'footer.php'
    ?>
</main>
</body>

</html>