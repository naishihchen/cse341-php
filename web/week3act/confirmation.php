<?php
session_start();
$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
 switch($action){
    case 'checkout':
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

        var_dump($_SESSION['customers']['street']);

        $customers = $_SESSION['customers'];
        $customerSummary = "<div>
                                <div>";

       //  $customerSummary .= 
       //   "<p>". $customers ."</p>";
       //   }
       // $customerSummary .= "</div></div>";

       // $productSummary = "<div><div><ul>";
       //     $products = $_SESSION['product'];

        // foreach($products as $key=>$product){
        //    $productSummary .= 
        //     "<li>"
        //     . $product ."</li>";
        //     }
        //     $productSummary .= "</ul><ul>";

        //     $productSummary .= "</ul></div></div>";
      break;
      case 'cart':
            echo "Hello";
          header("Location: /week3act/cart.php");

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
            <h2>Confirmation</h2>
            <div id="soaps" class="hello">
                <?php
                        if(isset($customerSummary)){
                            echo $customerSummary;
                        }
                    ?>
            </div>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeFooter.php'; ?>
        </main>
    </body>
</html>