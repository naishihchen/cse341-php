<?php
session_start();
include 'database_connect.php';

$product = htmlspecialchars($_GET["product"]);
​
if (isset($product)) {
    foreach ($db->query("SELECT purchaseTime, quantity, purchasePrice FROM purchases pu JOIN products pr ON pu.productId = pr.productId WHERE productName = '" . $product . "' AND userid = '" . $_SESSION['userId'] . "';") as $row)
    {
        echo "<p>";
        echo $row['purchaseTime'] . " " . $row['quantity'] .":" . $row['purchasePrice'];
        echo '"</p>';
    }
}
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
            <br>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeFooter.php'; ?>
        </main>
    </body>
</html>