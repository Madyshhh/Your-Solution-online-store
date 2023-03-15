<?php


include 'header.php';
require 'database.php';

echo '<title>Your solution | Reports</title>';
echo '<link rel="stylesheet" href="css/reports.css">';

?>

<main>
    <!-- Breadcrumb trail -->
    <div class="breadcrumb-trail">
        <p><a href="index.php">Home</a> > <a href="reports.php">Reports</a></p>
    </div>

    <h3 class="main-heading">Download reports</h3>


    <!-- Div containing all the buttons for reports -->
    <div class="content-box">
        <!-- Active for active buttons -->
        <a href="#" class="report-button active">
            <p>Daily report</p>
        </a>
        <!-- Disabled for disabled buttons which will be added in the next version -->
        <a class="report-button disabled">
            <p>Report</p>
        </a>
        <a class="report-button disabled">
            <p>Report</p>
        </a>
        <a href="#" class="report-button active">
            <p>Weekly report</p>
        </a>
        <a class="report-button disabled">
            <p>Report</p>
        </a>
        <a class="report-button disabled">
            <p>Report</p>
        </a>
        <a href="#" class="report-button active">
            <p>Monthly report</p>
        </a>
        <a class="report-button disabled">
            <p>Report</p>
        </a>
        <a class="report-button disabled">
            <p>Report</p>
        </a>
    </div>

    <!-- Footer -->
    <footer>

        <p>All rights reserved "Your solution LTD" 2022</p>

    </footer>
</main>
</body>

</html>