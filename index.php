<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Pay Page</title>
    

</head>
<body>
    <!-- Start main container -->
    <div class="container">
    <h2 class="h2 center" id="ww"> Help W.W [Just 50$] </h2>
        <form action="./charge.php" method="post" id="payment-form">


            <div class="form-row">
                <!-- start full name field -->
                <input type="text" name="full_name" class="StripeElement StripeElement--empty" placeholder="Full Name">
                <!-- End full name field -->

                <!-- Start Email field -->
                <input type="email" name="email" class="StripeElement StripeElement--empty" placeholder="email">
                <!-- End Email field -->
                
                <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display Element errors. -->
                <div id="card-errors" role="alert"></div>
            </div>

            <button class="submit-btn">Submit Payment</button>
        </form>
    </div>
    <!-- End main container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="js/vars.js"></script>
<script src="js/charge.js"></script>
</body>
</html>