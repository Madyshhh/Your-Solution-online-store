<?php
include 'header.php';
include_once 'database.php';
include_once 'product.php';

echo "<title>Your solution | Washing machine</title>";
echo '<link rel="stylesheet" href="css/product.css">';
?>
<main>
    <!-- Breadcrumb trail -->
    <div class="breadcrumb-trail">
        <p><a href="index.php">Home</a> > <a href="washingmachines.php">Washing machines</a></p>
    </div>

    <?php

    if ($resultCheck > 0) {
        // gets product code from link when clicked view product
        $productcode = $_GET['product_code'];

        // selects the product with the product code from database
        $sql = "SELECT * FROM washing_machine WHERE product_code = '$productcode';";
        $product = mysqli_query($conn, $sql); //performs query

        //creates an array of rows returned from the query
        $row = $product->fetch_array(MYSQLI_ASSOC);

        // displays the function from products.php with the fields for the row
        echo productInfo(
            $row['image_link'],
            $row['product_code'],
            $row['name'],
            $row['description'],
            $row['brand'],
            $row['model'],
            $row['review'],
            $row['wash_prog'],
            $row['capacity'],
            $row['size'],
            $row['energy_rate'],
            $row['wash_time'],
            $row['quantity'],
            $row['price'],
            $row['discount']
        );
    } else {
        echo "No products to display!";
    }


    ?>

    <!-- Footer -->
    <?php
    require 'footer.php';
    ?>
</main>
</body>

</html>