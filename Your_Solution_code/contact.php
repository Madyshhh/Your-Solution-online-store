<?php
    include 'header.php';
    echo '<title>Your solution | Contact us</title>';
    echo '<link rel="stylesheet" href="css/contact.css">';
?>
    <main>

        <!-- Breadcrumb trail -->
        <div class="breadcrumb-trail">
            <p><a href="index.php">Home</a> > <a href="contact.php">Contact us</a></p>
        </div>

        <!-- Main heading of the page -->
        <h3 class="main-heading">Contact us</h3>

        <!-- box containing all the contact details -->
        <div class="content-box">
            <p>If you need to speak to someone, you can call us on <b>0000 000 0000</b></p>
            <p> <b>Opening hours:</b></p>
            <table>
                <tr>
                    <td>Monday - Friday:</td>
                    <td>8am to 8pm</td>
                </tr>
                <tr>
                    <td>Saturday:</td>
                    <td>8am to 6pm</td>
                </tr>
                <tr>
                    <td>Sunday:</td>
                    <td>9am to 6pm</td>
                </tr>
            </table>

            <p><b>Due to the impact of Coronavirus, waiting times may be longer than usual.</b></p>
            <br>
            <p><b>Or send us an email:</b></p>
            <p id="email">help@yoursolution.co.uk</p>
            <br>
            <p><b>If you like, you can also write to us:</b></p>
            <p id="address">25 This street,<br>
                Livingston,<br>
                EH55 8BB
            </p>
        </div>

        <!-- Footer -->
        <?php
            include 'footer.php';
        ?>
    </main>
</body>

</html>