<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['additem'])) {
        if(isset($_SESSION['cart'])){
            $myitems = array_column($_SESSION['cart'], 'itemName');
            if(in_array($_POST['itemName'], $myitems)){
                echo "<script>alert('Item already added to cart')</script>";
                echo "<script>window.location = 'welcome.php'</script>";
            }
            else{
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('itemName' => $_POST['itemName'], 'price' => $_POST['price'], 'quantity' => 1);

                echo "<script>alert('Item added to cart');
                window.location = 'welcome.php';
                </script>";
            }
        }
        else{
            $_SESSION['cart'][0] = array('itemName' => $_POST['itemName'], 'price' => $_POST['price'], 'quantity' => 1);
            print_r($_SESSION['cart']);

            echo "<script>alert('Item added to cart');
            window.location = 'welcome.php';
            </script>";
        }
    }
    if(isset($_POST['removeItem'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['itemName'] == $_POST['itemName']){
                unset($_SESSION['cart'][$key]);

                $_SESSION['cart'] = array_values($_SESSION['cart']);
                
                echo "<script>alert('Item removed from cart');
                window.location = 'cart.php';
                </script>";
            }
        }
    }
}

?>