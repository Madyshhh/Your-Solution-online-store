<?php
include 'database.php';
include 'header.php';
include 'product.php';

echo '<link rel="stylesheet" href="css/searchresult.css">';
?>

<main>
    <!-- Breadcrumb trail -->
    <div class="breadcrumb-trail">
        <p><a href="index.php">Home</a> > <a href="searchresults.php">Search results</a></p>
    </div>

    <!-- Main heading of the page -->
    <h2>Search results</h2>

    <!-- Div containing all product divs -->
    <div class="products">

        <?php

        if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT image_link, name, price, w.product_code, previous_price, capacity, size, energy_rate, wash_time, discount, quantity FROM washing_machine w LEFT JOIN price_history p ON w.product_code = p.product_code WHERE name LIKE '%$search%' OR w.product_code LIKE '%$search%';";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            if ($queryResult > 0) {
                // displays all products that match the search
                while ($row = mysqli_fetch_assoc($result)) {
                    // prints the html in the function with the fields from db
                    echo washingMachine($row['image_link'], $row['product_code'], $row['name'], $row['capacity'], $row['size'], $row['energy_rate'], $row['wash_time'], $row['quantity'], $row['price'], $row['discount'], $row['previous_price']);
                }
            } else {
                echo "There are no results matching your search!";
            }
        }
        ?>

    </div>
    <?php
    // footer
    include 'footer.php';
    ?>

</main>
</body>

</html>