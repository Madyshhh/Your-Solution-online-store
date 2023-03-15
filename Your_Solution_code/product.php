<?php
/**
 * contains functions containing HTML for the products to be displayed
 */

// queries the database to get all the information about washing machines
$sql = "SELECT image_link, name, price, w.product_code, previous_price, capacity, size, energy_rate, wash_time, discount, quantity 
FROM washing_machine w LEFT JOIN price_history p ON w.product_code = p.product_code;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

// displays the product boxes for all washing machines in the washingmachine.php page
function washingMachine(
    $productImage,
    $productCode,
    $productName,
    $capacity,
    $size,
    $energyRate,
    $washTime,
    $quantity,
    $price,
    $discount,
    $previousPrice
) {

    echo "<!-- Div containing all information about product -->
   <div class=\"product-box\">
                <img src=\"$productImage\" alt=\"Washing machine image\" class=\"washing-machine-image\">

                <p class=\"product-name\">$productName</p>

                <ul class=\"top-spec\">
                    <li>$capacity</li>
                    <li>$size</li>
                    <li>$energyRate</li>
                    <li>$washTime</li>
                </ul>

                <p class=\"display-stock\">$quantity in stock!</p>

                <div class=\"content-wrapper\">
                    <div class=\"display-price\">";

    if ($discount == 'Y') {
        echo "<p class=\"product-disc-price\">£$previousPrice</p>";
    }
    echo "<p class=\"product-price\">£$price</p>
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
            </div>";
}

// displays the product information in the productpage.php page
function productInfo(
    $productImage,
    $productCode,
    $productName,
    $description,
    $brand,
    $model,
    $review,
    $washProgram,
    $capacity,
    $size,
    $energyRate,
    $washTime,
    $quantity,
    $price,
    $discount
) {
    echo "<!-- Name of the product -->
        <h3 class=\"product-name\">$productName</h3>
        
        <!-- Section containing all the info about product -->
        <div class=\"product-box\">
            <img src=\"$productImage\" alt=\"Product image\" class=\"washing-machine-image\">

            <div class=\"display-price\">
                <p class=\"product-price\">£$price</p>";
    if ($discount == 'Y') {
        echo "<p class=\"product-disc-price\">£200.00</p>";
    };
    echo "</div>

            <!-- Main info to display -->
            <dl class=\"top-info\">
                <dt>Product code</dt>
                <dd>$productCode</dd>
                <dt>Brand</dt>
                <dd>$brand</dd>
                <dt>Model</dt>
                <dd>$model</dd>
            </dl>

            <!-- Link to reviews button -->
            <div class=\"review-div\">
                <a href=\"$review\" target=\"_blank\">
                    <div class=\"reviews\">
                        <p>Reviews</p>
                    </div>
                </a>
            </div>

            <!-- Wrapper to position in grid -->
            <!-- Contains dicount and delivery banner -->
            <div class=\"grid-wrapper\">
                <div class=\"discount-available\">
                    <img src=\"images/discount.png\" alt=\"Vector image of sale ticket\" class=\"discount-icon\">
                    <p>25% off</p>
                </div>
                <div class=\"free-delivery\">
                    <img src=\"images/lorry.png\" alt=\"Vector image of lorry\" class=\"delivery-lorry-icon\">
                    <p>Free delivery available!</p>
                </div>
            </div>

            <!-- Wrapper to position in grid -->
            <div class=\"grid-stock-basket-wrapper\">
                <p class=\"display-stock\">$quantity in stock!</p>

                <div class=\"add-to-basket\">
                    <form action=\"basket.php?product_code=$productCode?qty=1\" id=\"add-basket\" method=\"POST\">
                    <input type=\"hidden\" name=\"productCode\" value=\"$productCode\">
                    <input type=\"hidden\" name=\"qty\" value=\"1\">
                    <button type=\"submit\" class=\"add-button\" name=\"add\">Add to basket</button>
                    </form>
                </div>

            </div>

            <!-- Product description -->
            <div class=\"product-description\">
                <p class=\"heading\"><b>Description</b></p>
                <p class=\"description\">
                    $description
                </p>

            </div>

            <!-- Product specs -->
            <div class=\"product-specification\">
                <table>
                    <p class=\"heading\"><b>Specification</b></p>
                    <tr>
                        <td>Capacity</td>
                        <td>$capacity</td>
                    </tr>

                    <tr>
                        <td>Size</td>
                        <td>$size</td>
                    </tr>

                    <tr>
                        <td>Wash time</td>
                        <td>$washTime</td>
                    </tr>

                    <tr>
                        <td>Energy rating</td>
                        <td>$energyRate</td>
                    </tr>

                    <tr>
                        <td>Washing programmes</td>
                        <td>$washProgram</td>
                    </tr>
                </table>
            </div>
            </div>
            ";
}

// displays the products in the basket, in the basket.php page
function basketElement($productImage, $productName, $price)
{
    echo "
    <div class=\"product\">
                <img src=$productImage
                 alt=\"Washing machine image\" class=\"product-image\">

                <!-- Wrapper to allow positioning in the grid -->
                <div class=\"wrapper-one\">
                    <p class=\"product-name\">$productName</p>

                    <div class=\"add-or-remove-buttons\">
                        <button class=\"remove-button\">-</button>
                        <p>1</p><button class=\"add-button\">+</button>
                    </div>

                    <p class=\"price\">£$price</p>
                </div>
            </div>

            <!-- Creates a line inbetween products -->
            <p class=\"line\"></p>
    ";
}

// EOF