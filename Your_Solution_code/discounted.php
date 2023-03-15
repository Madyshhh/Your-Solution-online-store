<?php

/**
 * Gets the products with discounts on them, from the database
 * Contains a function which allows to display the washing machines in index.php page
 */


// gets the washing machine information from the database
$sql = "SELECT image_link, name, price, w.product_code, previous_price 
        FROM washing_machine w JOIN price_history p ON w.product_code = p.product_code WHERE discount = 'Y';";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

// function to display HTML code for each washing machine in the index.php page
function discounted($productImage, $productName, $price, $productCode, $previousPrice)
{

    $element = "
    <div class=\"product-box\">
    <img src=\"$productImage\" alt=\"Washing machine image\" class=\"washing-machine-image\">
        <p class=\"product-name\">$productName</p>

        <div class=\"display-price\">
            <p class=\"product-price\">£$price</p>
            <p class=\"product-disc-price\">£$previousPrice</p>
        </div>

        <div class=\"free-delivery\">
            <img src=\"images/lorry.png\" alt=\"Vector image of lorry\" class=\"delivery-lorry-icon\">
            <p>Free delivery available!</p>
        </div>

        <a href=\"productpage.php?product_code=$productCode\">
            <div class=\"view-product\">
                <p>View product</p>
            </div>
        </a>
    </div>
    ";

    echo $element;
}

// EOF
