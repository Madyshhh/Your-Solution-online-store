<?php

require 'header.php';
require 'database.php';
include_once 'discounted.php';


echo '<title>Your solution</title>';
echo '<link rel="stylesheet" href="css/indexpage.css">';

?>

<main>
    <!-- Main heading above content -->
    <h1>SALE IS NOW ON!</h1>

    <!-- Sales banner -->
    <!-- Can be displayed or hidden -->
    <div class="sale-banner">
        <img src="images/eastersale.jpg" alt="Easter sale banner">
    </div>

    <!-- Main area for products to be displayed  -->
    <div class="products">
        
        <!-- Product boxes displaying info about prodcuct -->
        <?php

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // calls the method from discounted.php to display each product
                echo discounted(
                    $row['image_link'],
                    $row['name'],
                    $row['price'],
                    $row['product_code'],
                    $row['previous_price']
                );
            }
        } else {
            echo "No products to show!";
        }

        ?>

    </div>

    <?php
    include_once 'footer.php';
    ?>