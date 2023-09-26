<?php require 'controllers/database.php';

/*Countries query*/
$sql_query = "SELECT * FROM `countries`";
$result = mysqli_query($connection, $sql_query);

/*States query*/
/* TODO: Country code based on chosen country */
$sql_query2 = "SELECT * FROM `states` WHERE country_code = 'HU'";
$result2 = mysqli_query($connection, $sql_query2)



    ?>


<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentikációs rendszer alapjai</title>
    <link rel="stylesheet" href="Bootsrap\css\bootstrap.min.css">
    <script src="Bootsrap\js\bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="style.css">

    <script src="scripts/jquery_3_7.js"></script>
    <script src="scripts/input-mask.js"></script>
</head>

<body>

    <div class="contain">
        <div class="row mt-4 mb-2">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="card-title">Registration form</h4>
                        <!-- Form eleje -->
                        <form action="controllers/register.php" method="POST">
                            <!--  -->
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="name@example.com">
                                <label for="eamil">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="username" id="username"
                                    placeholder="name@example.com">
                                <label for="username">Username</label>
                            </div>
                            <div class="pwd mb-3">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password">
                                <span class="passwordIconHolder">
                                    <i class="passwordIcon" id="passwordIcon" onclick="showPassword()">X</i>
                                </span>

                            </div>
                            <div class="pwd mb-3">
                                <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm"
                                    placeholder="Password Confirm">
                                <span class="passwordIconHolder">
                                    <i class="passwordIcon" id="passwordIcon" onclick="showPasswordConfirm()">X</i>
                                </span>

                            </div>

                            <select class="form-select mb-3" name="country" id="country">
                                <option value="" disabled selected>Please choose a country...</option>

                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo ' <option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                }



                                ?>


                            </select>

                            <select class="form-select mb-3" name="state" id="state">
                                <option value="" disabled selected>Please choose a state...</option>

                                <?php
                                while ($row = mysqli_fetch_assoc($result2)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['state_name'] . '</option>';
                                }



                                ?>


                            </select>
                           
                            
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="postal" id="postal">
                                <label for="postal">Postalcode</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="street" id="street">
                                <label for="street">Street</label>
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" placeholder="" data-mask="(99) 999-9999" class="form-control">
                                <span class="font-13 text-muted">(999) 999-9999</span>
                            </div>

                            <hr>
                            <button class="btn btn-warning mt-3" name="submit" type="submit"
                                id="submit">Register</button>
                        </form>
                        <!--  -->
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>


</body>
<script>
    let pwdInput = document.getElementById("password");
    let passwordSeen = false;
    function showPassword() {
        if (passwordSeen == false) {
            pwdInput.setAttribute("type", "text");
            passwordSeen = true;
        }
        else {
            pwdInput.setAttribute("type", "password");
            passwordSeen = false;
        }
    }


    let pwdConfirmInput = document.getElementById("passwordConfirm");
    let passwordConfirmSeen = false;
    function showPasswordConfirm() {
        if (passwordConfirmSeen == false) {
            pwdConfirmInput.setAttribute("type", "text");
            passwordConfirmSeen = true;
        }
        else {
            pwdConfirmInput.setAttribute("type", "password");
            passwordConfirmSeen = false;
        }
    }
</script>

</html>