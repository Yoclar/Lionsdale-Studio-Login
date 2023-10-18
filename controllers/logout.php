<?php
session_name("Lion2023-WebApp");
session_start();
session_unset();
session_destroy();


header("Location: ../views/index.php?logout=success");
?>