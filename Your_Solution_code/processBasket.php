<?php

/**
 * Gets the data from adding to the basket button
 * Calls the function to add to basket
 */

// gets the data from add to basket button
if (isset($_POST['add'])) {
    $item = trim($_POST['productCode']);
    $quantity = trim($_POST['qty']);

    // calls a function from functions.php
    addToBasket($item);
}


//  EOF