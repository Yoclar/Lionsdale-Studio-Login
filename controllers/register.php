<?php 
echo 'Elkezdtem regisztrálni';

if (isset($_POST['submit'])) {
    /* Adatbázis linkelése */
    require 'database.php';
    /* SQL INJECTION ELLENI VÉDELEM */
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $passwordConfirm =mysqli_real_escape_string($connection, $_POST['passwordConfirm']); 
    $country = mysqli_real_escape_string($connection, $_POST['country']);
    $state = mysqli_real_escape_string($connection, $_POST['state']);
    $postal = mysqli_real_escape_string($connection, $_POST['postal']);
    $street = mysqli_real_escape_string($connection, $_POST['street']);
    $phone = "0630..";
    $address_id = 0;

    /* Email cím és username ellenőrzése */
    $email_Query = "SELECT * FROM users WHERE UserEmail ='$email'";
    $emailResult = mysqli_query($connection, $email_Query);
    if (mysqli_num_rows($emailResult)) 
    {
        header("Location: ../index.php?error=emailTaken");
        exit();
    }
    $user_Query = "SELECT * FROM users WHERE UserName ='$username'";
    $userResult = mysqli_query($connection, $user_Query);
    if (mysqli_num_rows($userResult)) 
    {
        
        header("Location: ../index.php?error=usernameTaken");
        exit();
    }

    /* VALIDÁLÁS */
    /* Jelszó erőssége */
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number  = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    /* Miket hagyott üresen a user */
    $errors = array();
   foreach ($_POST as $key => $value) {
        if ($value == "") {
            if ($key != "submit") {
                array_push($errors, $key);  
            }
          
        }
   }

   if (count($errors) !=0) {
        echo "Valamit üresen hagyott a user";
        foreach ($errors as $key => $value) {
            echo $value . "<br>";
        }
   }

   elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
    echo 'Email jaj';
   }
   else if(!$uppercase ||
   !$lowercase ||
   !$number ||
   !$specialChars ||
   strlen($password) < 8 ||$password !== $passwordConfirm)
   {
    date_default_timezone_set('Europe/Budapest');
    $date = date("Y-m-d h:i:s");
    echo $date;

    /* Address validation */
    $addressValidateQuery = "SELECT * FROM addresses WHERE street = '$street'";
    $result = mysqli_query($connection, $addressValidateQuery);
    $addressExists = false;//létezik-e az adatbázisban a felhasználó címe
    if (mysqli_num_rows($result) !=0) { //Van eredmény
        $adatok = mysqli_fetch_row($result);//akkor lemented
        if ($adatok[2] == $postal && $adatok[1] == $country) { //irsz és ország egyezik-e
            $address_id = $adatok[0];
            $addressExists = true;
        }
    }

    if (!$addressExists) {
        $address_Query = "INSERT INTO `addresses`( `CountryId`, `Postal`, `Street`, `Created_at`) VALUES (?,?,?,?)";
        $addressStatement = mysqli_stmt_init($connection);
        if (mysqli_stmt_prepare($addressStatement, $address_Query)) {
            mysqli_stmt_bind_param($addressStatement, 'isss', $country,$postal,$street,$date);
            mysqli_stmt_execute($addressStatement);
        }
        else {
            echo 'address_stmt_error';
        }
        /* Az imént feltöltött address ID-jének lekérése következik */
        $idQuery = "SELECT MAX(id) FROM addresses";
        $result = mysqli_query($connection,$idQuery);
        $address_id = mysqli_fetch_row($result)[0];
        # code...
    }
    /* if () {
        $idQuery = "SELECT MAX(id) FROM addresses";
        $result = mysqli_query($connection,$idQuery);
        $address_id = mysqli_fetch_row($result)[0];
    }
    else {
      
    } */

    /* Address upload */

    echo $address_id;

    /* User regisztrálható */
    /*Password hashelni  */
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);


    $sql_query =  "INSERT INTO `users`(`UserName`, `UserPassword`, `UserEmail`, `UserPhoneNumber`, `AddressID`, `Created_at`) VALUES (?,?,?,?,?,?)";
    $statement = mysqli_stmt_init($connection);
    if (mysqli_stmt_prepare($statement,$sql_query)) {
        mysqli_stmt_bind_param($statement, 'ssssis', $username, $hashedpassword, $email, $phone, $address_id, $date);
        /* 5.Futtatjuk a szerveren */
        mysqli_stmt_execute($statement);
    }
    else {
        echo 'Prepare statement error.';
    }
   }

}

else{
    echo "Nem lett megnyomva a gomb";
}