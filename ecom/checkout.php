<?php
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
    header('Location: login.php');
    exit();
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/checkout.css?v=<?php echo time(); ?>"> 
</head>
  <body>
  <?php require 'partials/_nav.php'?>
  <br><br>
    <div class='card-container d-flex flex-row justify-content-around'>
        <div class="container1">
            <form action="welcome.php">
                <div class="row">
                    <div class="col mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="Name" required>
                    </div>
                    <div class="col mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" required>
                    </div>
                </div>
                <div class="col mb-3">
                    <label for="exampleInputEmail1" class="form-label">Address Line 1 (Name of building, flat number, etc.)</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="col mb-3">
                    <label for="exampleInputEmail1" class="form-label">Address Line 2 (Name of the area, street, landmarks, etc.)</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="col mb-3">
                    <label for="exampleInputEmail1" class="form-label">Address Line 3 (Name of city and zip code)</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" required>
                </div>
                <br>
                <div class="d-flex flex-row justify-content-between">
                    <div class="payment-select-container">
                    <select class="form-select payment-select" aria-label="Default select example" required>
                        <option value="" selected disabled>Select Payment method</option>
                        <option value="1">Cash on Delivery (CoD)</option>
                        <option value="2">Net Banking</option>
                        <option value="3">UPI/QR Payment</option>
                        <option value="4">Credit/Debit Card Payment</option>
                    </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Place Order">
                    <?php 
                        if(isset($_SESSION['cart']))
                        {
                            $cartItems = $_SESSION['cart'];
                            $jsonData = array();

                            // Read existing data from cart_data.json
                            $jsonFilePath = 'cart_data.json';
                            if(file_exists($jsonFilePath)) {
                                $existingData = file_get_contents($jsonFilePath);
                                $jsonData = json_decode($existingData, true);
                            }

                            foreach ($cartItems as $item) {
                                $itemData = array(
                                    'item_name' => $item['item_name'],
                                    'item_price' => $item['item_price'],
                                    'item_pic' => $item['item_pic'],
                                    'item_quantity' => $item['item_quantity']
                                );

                                // Append new data to existing data
                                $jsonData[] = $itemData;
                            }

                            // Write the merged data back to cart_data.json
                            file_put_contents($jsonFilePath, json_encode($jsonData));
                            unset($_SESSION['count']);
                            unset($_SESSION['cart']);
                        }
                        $_SESSION['order_placed'] = true;
                    ?>
                </div>
                <br>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <div class="d-flex flex-column justify-content-end">
        <?php require 'partials/_footer.php'; ?>
    </div>
  </body>
</html>
