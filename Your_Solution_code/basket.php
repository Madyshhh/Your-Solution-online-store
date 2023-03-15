<?php
include 'header.php';
require 'database.php';

echo '<title>Your solution | Shopping basket</title>';
echo '<link rel="stylesheet" href="css/basket.css">';


?>
<!-- Section containing all the content of the page -->
<main>

    <!-- Breadcrumb trail -->
    <div class="breadcrumb-trail">
        <p><a href="index.php">Home</a> > <a href="basket.php">Shopping basket</a></p>
    </div>

    <h3 class="main-heading">Your shopping basket</h3>

    <div class="display-products-box">

        <?php
        include 'product.php';
        include 'functions.php';
        include 'processBasket.php';

        // displays information for each item in the basket
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $sql = "SELECT image_link, name, price FROM washing_machine WHERE product_code = '$item';";
                $product = mysqli_query($conn, $sql); //performs query

                $row = $product->fetch_array(MYSQLI_ASSOC); //creates an array of rows returned from the query

                // displays the function with the fields for the row
                echo basketElement($row['image_link'], $row['name'], $row['price']);
            }
        } else {
            echo "<p>No items in the basket</p>";
        }

        ?>

        <!-- Wrapper nr.2 to allow positioning in the grid -->
        <div class="wrapper-two">
            <div class="free-delivery">
                <img src="images/lorry.png" alt="Vector image of lorry" class="delivery-lorry-icon">
                <p>Free delivery available!</p>
            </div>

            <div class="display-total">
                <p id="total">Total price:</p>
                <?php
                if (isset($_SESSION['cart'])) {
                    echo "<p id='total-price'> £" . $row['price'] . "</p>";
                } else {
                    echo "<p id='total-price'> £0.00</p>";
                }

                ?>
            </div>

            <form action="userdetails.php" id="proceed-basket">
                <button type="menu" class="proceed-button">Proceed</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php

    include 'footer.php';

    ?>
</main>
</body>

</html>