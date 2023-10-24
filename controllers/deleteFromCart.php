<?php

session_name("Lion2023-WebApp");
session_start();

try {
    if (isset($_SESSION["cart"][$_POST["productId"]])) {
        unset($_SESSION['cart'][$_POST['productId']]);

    }
    else { 
        throw new Exception('Nothing to delete');
    }

} catch (\Throwable $th) {
    throw $th;
}


header('Location: ../views/index.php?remove=success');