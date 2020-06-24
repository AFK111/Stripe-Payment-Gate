<?php

if( !empty($_GET['tid']) && !empty($_GET['product']) ){
   $GET = filter_var_array($_GET , FILTER_SANITIZE_STRING);
    $tid = $GET['tid'];
    $product = $GET['product'];
}else{
    header("Location: index.php");
}
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Thank You</title>
</head>
<body>

    <div class="container">
        <h2>Thank you for <?php echo $product; ?> </h2>
        <hr>
        <p>Your transaction ID is <b><?php echo $tid;?></b></p>
        <p>Check your email for more info</p>
        <p><a href="index.php" class="a"> Go Back</a></p>
    </div>

</body>
</html>