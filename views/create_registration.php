<!-- Header  fájl-->
<?php require '../layouts/header.php'; ?>
<!-- Adatbázis fájl -->
<?php require '../controllers/database.php';

/*Countries query*/
$sql_query = "SELECT * FROM `countries`";
$result = mysqli_query($connection, $sql_query);

/*States query*/

$sql_query2 = "SELECT * FROM `states` WHERE country_code = 'HU'";
$result2 = mysqli_query($connection, $sql_query2);



    ?>



<div class="row mt-4 mb-2">
    <div class="col-2"></div>
    <div class="col-8">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title">Registration form</h4>
                <!-- Form eleje -->
                <form action="../controllers/register.php" method="POST" data-parsley-validate id="regForm">
                    <!--  -->
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com"
                            data-parsley-type="email" required>
                        <label for="eamil">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="name@example.com" data-parsley-minlength="3" require>
                        <label for="username">Username</label>
                    </div>
                    <div class="pwd mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                            required data-parsley-minlength="8"
                            data-parsley-pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[?_\-!#\@.$ß]).*">
                        <span class="passwordIconHolder">
                            <i  id="passwordIcon" onclick="showPassword();" 
                                    class="passwordIcon fa-solid fa-eye"></i>
                        </span>

                    </div>
                    <div class="pwd mb-3">
                        <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm"
                            placeholder="Password Confirm" required data-parsley-equalto="#password">
                        <span class="passwordIconHolder">
                            <i  id="passwordIcon" onclick="showPasswordConfirm();"
                                    class="passwordIcon fa-solid fa-eye"></i>
                        </span>

                    </div>

                    <select class="form-select mb-3" name="country" id="country" required>
                        <option value="" disabled selected>Please choose a country...</option>

                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo ' <option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }



                        ?>


                    </select>

                    <select class="form-select mb-3" name="state" id="state" required>
                        <option value="" disabled selected>Please choose a state...</option>

                        <?php
                        while ($row = mysqli_fetch_assoc($result2)) {
                            echo '<option value="' . $row['id'] . '">' . $row['state_name'] . '</option>';
                        }



                        ?>


                    </select>


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="postal" id="postal" data-parsley-minlength="3"
                            required data-parsley-type="number">
                        <label for="postal">Postalcode</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="street" id="street" required>
                        <label for="street">Street</label>
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" placeholder="" data-mask="(99) 999-9999" class="form-control"
                            data-parsley-type="number" required>
                        <span class="font-13 text-muted">(999) 999-9999</span>
                    </div>

                    <hr>
                    <button class="btn btn-warning mt-3" name="submit" type="submit" id="submit">Register</button>
                </form>
                <!--  -->
            </div>
        </div>
    </div>
    <div class="col-2"></div>
</div>


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
<!-- Parsley -->
<script>
    $('#regForm').parsley();
</script>



<!-- Page content END -->
<?php require '../layouts/footer.php'; ?>