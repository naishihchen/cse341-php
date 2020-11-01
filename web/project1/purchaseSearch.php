<?php
session_start();
include 'database_connect.php';

$product = htmlspecialchars($_GET["product"]);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Soap Store</title>
        <link rel="stylesheet" type="text/css" href="/styles/storeStyles.css">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeHeader.php'; ?>
        <main>
            <h1>Receipt Search</h1>
            <p>Please enter the name of the product you wish to search for, with each first letter capitalized.</p>
            <form action="purchaseSearch.php">
                <input type="text" name="product">
                <input type="submit">
            </form>
            <div id="purchase-log">
                <?php
                    if (isset($product)) {
                        foreach ($db->query("SELECT purchasetime, quantity, purchaseprice FROM purchases pu JOIN products pr ON pu.productId = pr.productId WHERE productName = '" . $product . "' AND userid = '" . $_SESSION['clientData']['userid'] . "';") as $row)
                        {
                            echo "<div id='purchase-record'>";
                            echo "<p>Product: " . $product . "</p><br>";
                            echo "<p> Time of Purchase: " . $row['purchasetime'] . "</p><br>";
                            echo "<p>Quantity:  " . $row['quantity'] . "</p><br>";
                            echo "<p>Price: " . $row['purchaseprice'] . "</p>";
                            echo '</div>';
                        }
                    }
                ?>
            </div>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeFooter.php'; ?>
        </main>
    </body>
</html>