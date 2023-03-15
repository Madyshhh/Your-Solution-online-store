<?php
include 'header.php';
echo '<title>Your solution | FAQ</title>';
echo '<link rel="stylesheet" href="css/faq.css">';
?>

<main>
    <!-- Breadcrumb trail -->
    <div class="breadcrumb-trail">
        <p><a href="index.html">Home</a> > <a href="faq.html">Frequently asked questions</a></p>
    </div>

    <!-- Main heading of the page -->
    <h3 class="main-heading">Frequently asked questions</h3>

    <!-- Accordion to display the questions and answers -->
    <div class="content-box">
        <div class="accordion-box">
            <button class="accordion">What does "Oops! Something went wrong, try again!" mean?</button>
            <div class="panel">
                <p>This error means the information can`t be uploaded to the database. You can refresh the page and try again.
                    If this doesn`t help, you can try waiting for few minutes and then try again, or you can
                    <a href="contact.php"><b>contact us</b></a> and we might be able to help!
                </p>
            </div>

            <button class="accordion">Why can`t I see my order status?</button>
            <div class="panel">
                <p>Please double check your order details and make sure the order is placed. If the problem is still not resolved,
                    please <a href="contact.php"><b>contact us</b></a>.</p>
            </div>

            <button class="accordion">Why there is no products on the website?</button>
            <div class="panel">
                <p>If you can`t see products and see a error message instead, it means our database could be down.
                    Please try to access the products after a while!</p>
            </div>

            <button class="accordion">Why I can`t log in to my account?</button>
            <div class="panel">
                <p>If you are experiencing problems logging in, please check your details, try again later or
                    <a href="contact.php"><b>contact us</b></a> and we might be able to help!
                </p>
            </div>
        </div>
    </div>


    <!-- Script for accordion -->
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>

    <!-- Footer -->
    <?php
    include 'footer.php';
    ?>
</main>
</body>

</html>