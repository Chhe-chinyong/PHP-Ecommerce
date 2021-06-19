<?php
    include_once "db.php";
    include_once "config.php";
    session_start();
function process_transaction()
{
    if (isset($_GET['amt'],  $_GET['cc'], $_GET['tx'], $_GET['st'])) {
        $amountn = $_GET['amt'];
        $transaction = $_GET['tx'];
        $status = $_GET['st'];
        $total = 0;
        $qty = 0;
        
        if(isset($_SESSION["shopping_cart"]))
        {
                           
            // $last_id = last_id();
            $data = ['order_amount' => $amountn , 'order_transaction' => $transaction, 'order_status' => $status];
            $id = dbInsert1('orders', $data);
           
         
            // confirm_query($order_query);
  
        }
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                $product_name = $values['item_name'];
                $product_quantity = $values['item_quantity'];
                $product_price = $values['item_price'];
                $product_image = $values['item_image'];
                $data = ['product_name' => $product_name , 'product_quantity' => $product_quantity, 'product_price' => $product_price,'product_image' => $product_image, 'order_id' =>$id ];

                dbInsert('tb_report', $data);
            }
            
        }
        // session_destroy();
    } 


process_transaction();

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" type="image/png" href="img/nav-brand-tran.png" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/thankyou.css">
    <title>Thank You</title>
</head>

<body>
    <div class="jumbotron text-center  vertical-center">
        <div class="container">
            <h1 class="display-1">Thank You!</h1>

            <p class="lead">
                <strong class="text-primary">You have successfully purchased</strong>
            </p>
            <hr />
            <p class="text-success">You have charged <strong>
                    <?php
                    if (isset($_SESSION['price_total'])) {
                        echo "&#36;" . ($_SESSION['price_total']);
                    }
                    ?></strong>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-md" role="button"  href="../index.php?page=home">Back to homepage</a>
            </p>
        </div>
    </div>
</body>
<script src="./js/script.js"></script>

</html>