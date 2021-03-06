<?php

require_once("config/db.php");
require_once("lib/pdo_db.php");
require_once("models/transaction.php");


//Instantiate Transaction
$transaction = new Transaction();

//Get transaction
$transactions = $transaction->getTransactions();

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
        <h2 class="h2 h2-table center">Transactions</h2>
            <thead>
            <tr>
                <th>Transaction ID</th>
                <th>Customer ID</th>
                <th>Product</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>     
           </thead>

             <tbody>
                <?php foreach($transactions as $t){?>
                    <tr>
                        <td><?php echo $t['id']; ?></td>
                        <td><?php echo $t['customer_id']; ?></td>
                        <td><?php echo $t['product']; ?></td>
                        <td><?php echo sprintf('%.2f',$t['amount']/100) . " " . strtoupper($t['currency']);  ?></td>
                        <td><?php echo $t['created_at']; ?></td>
                    </tr>
                <?php } ?>    
            </tbody>

        </table>

        <a href="index.php" class="a">Pay Page</a>
        <a href="customers.php" class="a">Customers</a>
    </div>

</body>
</html>