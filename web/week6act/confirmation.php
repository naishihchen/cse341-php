<?php
session_start();


include 'database_connect.php';

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
 switch($action){
    case 'checkout':

        if (isset($_SESSION['clientData'])) {
            foreach($_SESSION['cart'] as $product){
                if ($product != "") {
                    $queryString = "INSERT INTO purchases (userid, productid, quantity, purchaseprice) VALUES (?, ?, ?, ?)"; 
                    $sql->bindParam("ssss", $_SESSION['clientData']['userid'], $product['productId'], $product['quantity'], $product['purchasePrice']);
                    $sql = $db->prepare($queryString);
                    $sql->execute();
                }    
            }
        }


        $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
        $unit = filter_input(INPUT_POST, 'unit', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
        $zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_NUMBER_INT);

        $_SESSION['customers']['street'] = 'Street: '.$street;
        $_SESSION['customers']['unit'] = 'Unit: '.$unit;
        $_SESSION['customers']['city'] = 'City: '.$city;
        $_SESSION['customers']['state'] = 'State: '.$state;
        $_SESSION['customers']['zip'] = 'Zip Code: '.$zip;

        $customers = "<div id='customer-summary'>";
        $customers .= "<h2>Customer Info</h2>";
        $customers .= "<div class='info-item'><p>".$_SESSION['customers']['street']."</p></div> <br>";
        $customers .= "<div class='info-item'><p>".$_SESSION['customers']['unit']."</p></div> <br>";
        $customers .= "<div class='info-item'><p>".$_SESSION['customers']['city']."</p></div> <br>";
        $customers .= "<div class='info-item'><p>".$_SESSION['customers']['state']."</p></div> <br>";
        $customers .= "<div class='info-item'><p>".$_SESSION['customers']['zip']."</p></div> <br>";
        $customers .= "<h2>Customer Order</h2>";
        if (isset($_SESSION['cart'])) {    
            foreach($_SESSION['cart'] as $product){
                if ($product != "") {
                    $customers .= "<div class='cart-item'><p>" . $product['productName'] . "</p></div> <br>";
                }
            }
        } 
        $customers .= "</div>";

      break;
      default:
    break;
 }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Soap Store</title>
        <link rel="stylesheet" type="text/css" href="/styles/storeStyles.css">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeHeader.php'; ?>
        <main>
            <h2 id="confirmation">Confirmation</h2>
            <div id="soaps" class="hello">
                <?php
                        if(isset($customers)){
                            echo $customers;
                        }
                    ?>
            </div>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeFooter.php'; ?>
        </main>
    </body>
</html>