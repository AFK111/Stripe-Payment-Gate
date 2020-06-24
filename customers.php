<?php

require_once("config/db.php");
require_once("lib/pdo_db.php");
require_once("models/customer.php");


//Instantiate Customer
$customer = new Customer();

//Get Customer
$customers = $customer->getCustomers();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Customers</title>
</head>
<body>

    <div class="container">
        
        <table class="table table-striped">
        <h2 class="h2 h2-table center">Customers</h2>
            <thead>
            <tr>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
            </tr>     
           </thead>

             <tbody>
                <?php foreach($customers as $c){?>
                    <tr>
                        <td><?php echo $c['id']; ?></td>
                        <td><?php echo $c['full_name']; ?></td>
                        <td><?php echo $c['email']; ?></td>
                        <td><?php echo $c['created_at']; ?></td>

                    </tr>
                <?php } ?>    
            </tbody>

        </table>

        <a href="index.php" class="a">Pay Page</a>
        <a href="transactions.php" class="a">Transactions</a>
    </div>

</body>
</html>