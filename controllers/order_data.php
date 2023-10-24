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
                <h4 class="card-title">Address</h4>
                <!-- Form eleje -->
                <form action="#" method="POST" data-parsley-validate id="regForm">
                    

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

                    <div class="form-group">
                        <input type="radio" id="company" name="CompanyOrNot">
                        <label for="company">Company</label>
                    </div>
                    <div class="form-group">
                        <input type="radio" id="Noncompany" name="CompanyOrNot">
                        <label for="Noncompany">Non-Company</label>
                    </div>



                    <hr>
                    <button class="btn btn-warning mt-3" name="submit" type="submit" id="submit">Confirm</button>
                </form>
                <!--  -->
            </div>
        </div>
    </div>
    <div class="col-2"></div>
</div>
<script>
    $('#regForm').parsley();
</script>
<?php require '../layouts/footer.php'; ?>