<?php
session_start();
include('partials/_dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_SESSION['Email'];
    $address = htmlspecialchars($_POST['address']);
    $state = htmlspecialchars($_POST['state']);
    $city = htmlspecialchars($_POST['city']);
    $pincode = htmlspecialchars($_POST['pincode']);
    $ordered_item = "";

    foreach($_SESSION['cart'] as $key => $value){
        $ordered_item .= $value['itemName'] . " x " . $value['quantity'] . ", ";
    }

    $sql = "INSERT INTO `orders` (`email`, `address`, `state`, `city`, `pincode`, `ordered_item`) VALUES ('$email', '$address', '$state', '$city', '$pincode' , '$ordered_item');";

    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['cart'] = array();
        echo "<script>alert('Order Placed Successfully');
        window.location = 'thank_you.php';
        </script>";
    }
    else{
        echo "<script>alert('Order Placed Failed');
        window.location = 'cart.php';
        </script>";
    }
}

?>