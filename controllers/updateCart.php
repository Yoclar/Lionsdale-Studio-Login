<?php

session_name("Lion2023-WebApp");
session_start();
try {
    if (isset($_SESSION["cart"][$_POST['productId']])) {
        $_SESSION['cart'][$_POST['productId']['qty']] = $_POST["hiddenqty"];
    }
    else {
        header("Location: ../views/index.php?update=failure");
        throw new Exception("Not existing key!");
    }

    
} catch (\Throwable $th) {
    throw $th;
}


header('Location: ../views/index.php?update=success');