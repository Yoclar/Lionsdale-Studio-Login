<?php
require 'database.php';
/* Elnevezem a böngészőben a sessiont és elindítom */
session_name("Lion2023-WebApp");
session_start();
echo 'Attempting to login';


if (isset($_POST['submit'])) {
    
    //prevent SQL injection
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    echo "<br> - Attempting to log in $username";

    //Felhasználó összes adatának letöltése
    $user_Query = "SELECT * FROM users WHERE UserName ='$username'";
    $result = mysqli_query($connection,$user_Query);

    var_dump($result);
    //Felhasználó ellenörzése
    if (mysqli_num_rows($result) === 1) {

        //A lekért user adatai egy asszociatív tömbbe,
        $user = mysqli_fetch_assoc($result);
        /* user hashelt jelszavának lekérése */
        $hash = $user['UserPassword'];
        $verify = password_verify($password, $hash);

        if($verify==true)
        {
            /* Bejelentkezés a SESSION használatával */
            $_SESSION["user"] = $user['UserName'];
            $_SESSION["email"] = $user['UserEmail'];

            header("Location: ../views/index.php?login=success");
        }
        else
        {
            die("A jelszavak nem egyeznek");
        }
    }
    else if(mysqli_num_rows($result) == 0)
    {
        die('Nincs ilyen felhasználó');
    }
    else {
        die('Critical Failure - Több felhasználó ugyanazon a néven');
    }
  

}
else {

    die('A gomb nem lett megnyomva.');

}


//kérd át a usernevet és a passwordot
//csináld meg az sql kódot a user adatatinak lekérése
//futtasd le az sqlkódot és az eredményt tárold el a$result változóban
//vard_dump($result)
?>