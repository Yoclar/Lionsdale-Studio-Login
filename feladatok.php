<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Bootsrap\css\bootstrap.min.css">
    <script src="Bootsrap\js\bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Feladatok</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page">Home <span
                                class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Action 1</a>
                            <a class="dropdown-item" href="#">Action 2</a>
                        </div>
                    </li>
                </ul>
                <form class="d-flex my-2 my-lg-0">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
<!--     <div class="container">
        <!-- Sor 1. -->
        <div class="row mt-3 text-center">
            <div class="col">
                <h1>Feladat: 2.3</h1>
                <hr>
            </div>
        </div>
        <!-- Sor 2. -->

        <!-- Form - kártyával -->

        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="card">
                    <h5 class="m-2">Adatbekérő form:</h5>
                    <div class="card-body">
                        <h4 class="card-title">Adatok</h4>
                        <form class="text-center" action="" method="GET">
                            <input class="form-control" type="number" name="szam_1" id="szam_1">
                            <button class="btn btn-outline-primary mt-2 mb-2" name="submit">Küldés</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col"></div>
        </div>

        <?php

        if (isset($_GET['submit'])) {
            if (isset($_GET['szam_1']) && is_numeric($_GET['szam_1'])) {
                $atkertSzam = $_GET['szam_1'];
            }

        }
        $x = $atkertSzam;
        if ($x % 3 == 0) {
            # code.
            echo "$x" . " osztható 3-mal";
        } else {
            echo "$x" . " nem osztható 3-mal";
        }
        echo "<br>";
        if ($x % 4 == 0) {
            # code.
            echo "$x" . " osztható 4-gyel";

        } else {
            echo "$x" . " nem osztható 4-gyel";
        }
        echo "<br>";
        if ($x % 9 == 0) {
            # code.
            echo "$x" . " osztható 9-cel";
        } else {
            echo "$x" . " nem osztható 9-cel";
        }
        echo "<br>";


        ?>
        <p>
            Az átkért szám:
            <?php echo isset($atkertSzam) ? $atkertSzam : ""; ?>
        </p>
        <div class="container">
            <!-- Sor 2. -->
            <div class="row mt-3 text-center">
                <div class="col">
                    <h1>Feladat: 2.4</h1>
                    <hr>
                </div>
            </div>
            <!-- Sor 2. -->
            <div class="row">
                <div class="col"></div>
                <div class="col-6">
                    <div class="card">
                        <h5 class="m-2">Adatbekérő form:</h5>
                        <div class="card-body">
                            <h4 class="card-title">Temperature converter</h4>
                            <form class="text-center" action="" method="GET" name="form2">
                                <input class="form-control" type="number" name="szam_1" id="szam_1">

                                <p>Please select:</p>
                                <select class="form-select" name="muvelet" id="muvelet" required>
                                    <option value="" disabled selected>Kérlek válassz...</option>
                                    <option value="fehrenheitbe">Fahreinheit</option>
                                    <option value="celsiusba">Celsius</option>
                                </select>
                                <br><br>
                                <button type="submit" class="btn btn-outline-primary mt-2 mb-2"
                                    name="submit">Küldés</button>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col"></div>
            </div>
            <?php
            if (isset($_GET['submit'])) {
                if (isset($_GET['szam_1']) && is_numeric($_GET['szam_1'])) {
                    $temp = $_GET['szam_1'];
                }

            }


            ?>


            <div class="row mt-3 text-center">
                <div class="col">
                    <h1>Feladat: 2.3</h1>
                    <hr>
                </div>
            </div>
            <!-- Sor 2. -->

            <!-- Form - kártyával -->

            <div class="row">
                <div class="col"></div>
                <div class="col-6">
                    <div class="card">
                        <h5 class="m-2">Adatbekérő form:</h5>
                        <div class="card-body">
                            <h4 class="card-title">BMI</h4>
                            <form class="text-center" action="" method="GET">
                                <input class="form-control" type="number" name="magassag" id="magassag" step="0.01"
                                    placeholder="Magasság">
                                <input class="form-control" type="number" name="testtömeg" id="testtömeg" step="0.01"
                                    placeholder="Testsúly">
                                <button class="btn btn-outline-primary mt-2 mb-2" name="submit">Küldés</button>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col"></div>
            </div>
            <?php
            if (isset($_GET['submit'])) {
                if (isset($_GET['magassag']) && isset($_GET['testtömeg'])) {
                    if (is_numeric($_GET['magassag']) && is_numeric(($_GET['testtomeg']))) {
                        $magassag = $_GET['magassag'] / 100;
                        $testtomeg = $_GET['testtömeg'];
                        $BMI = $testtomeg / (pow($magassag, 2));
                    }

                }
            }
            switch ($BMI) {
                case $BMI < 18.5:
                    # code...
                    echo "Sovány";
                    break;
                case $BMI >= 18.5 && $BMI <= 24.99:
                    echo "Normális";
                    break;
                case $BMI > 24.99:
                    echo "Túlsúlyos";
                    break;
            }

            echo "A BMI:" . "$BMI";
            //
            ?>
        </div>

        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="card">
                    <h5 class="m-2">Adatbekérő form:</h5>
                    <div class="card-body">
                        <h4 class="card-title">Vízhőmérséklete</h4>
                        <form class="text-center" action="" method="GET">
                            <input class="form-control" type="number" name="temperature" id="temperature" step="0.01"
                                placeholder="Hőmérséklet">
                            <button class="btn btn-outline-primary mt-2 mb-2" name="submit">Küldés</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col"></div>
        </div>
        <?php
        if (isset($_GET['submit'])) {
            if (isset($_GET['temperature']) && is_numeric($_GET['temperature'])) {
                $temperature = $_GET['temperature'];
            }
            switch ($temperature) {
                case $temperature < 0:
                    $allapot = "Jég";
                    break;
                case $temperature > 0 && $temperature <= 100:
                    $allapot = "Víz";
                    break;
                case $temperature > 100:
                    $allapot = "Gőz";
                    break;

                default:
                    echo "hiba";
                    break;
            }

        }


        ?>
        <?php

        echo isset($allapot) ? $allapot : "";


        ?>

        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="card">
                    <h5 class="m-2">Adatbekérő form:</h5>
                    <div class="card-body">
                        <h4 class="card-title">Vízhőmérséklete</h4>
                        <form class="text-center" action="" method="GET">
                            <input class="form-control" type="number" name="x1" id="x1" placeholder="X1" required>
                            <input class="form-control" type="number" name="x2" id="x2" placeholder="X2" required>
                            <input class="form-control" type="number" name="y1" id="y1" placeholder="Y2" required>
                            <input class="form-control" type="number" name="y2" id="y2" placeholder="Y2" required>
                            <button class="btn btn-outline-primary mt-2 mb-2" name="submit">Küldés</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col"></div>
        </div>
        <?php
        if (isset($_GET['submit'])) {
            if (isset($_GET['x1']) && isset($_GET['x2']) && isset($_GET['y1']) && isset($_GET['y2'])) {
                if (is_numeric($_GET['x1']) && is_numeric($_GET['x2']) && is_numeric($_GET['y1']) && is_numeric($_GET['y2'])) {
                    //echo "cica";
                    $x1 = $_GET['x1'];
                    $x2 = $_GET['x2'];
                    $y1 = $_GET['y1'];
                    $y2 = $_GET['y2'];
                    $distance = sqrt(($x1 - $x2) * ($x1 - $x2) + ($y2 - $y1) * ($y2 - $y1));

                }
            }
        }



        ?>
        <p>A két pont távolsága:
            <?php
            echo isset($distance) ? $distance : "";
            ?>
        </p>


        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="card">
                    <h5 class="m-2">Adatbekérő form:</h5>
                    <div class="card-body">
                        <h4 class="card-title">Ponthatár</h4>
                        <form class="text-center" action="" method="GET" name="points">
                            <input class="form-control" type="number" name="points" id="points" placeholder="points" required>
                            <button class="btn btn-outline-primary mt-2 mb-2" name="submit2">Küldés</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col"></div>
        </div> 

        <?php
        if (isset($_GET['submit2'])) {
           if (isset($_GET['points'])) {
                if (is_numeric($_GET['points'])) {
                    $variable = $_GET['points'];
                    switch ($variable) {
                        case $variable<50:
                            echo "1-es";
                            break;
                        case $variable>=50 && $variable<65:
                            echo "2-es";
                            break;
                        case $variable>=65 && $variable<80:
                            echo "3-as";
                            break;
                        case $variable>=80 && $variable<90:
                            echo "4-es";
                            break;
                        case $variable>=90 && $variable<100:
                            echo "5-ös";
                        default:
                            echo "Hibás az adat";
                            break;
                    }
                }
           }
        }
        ?>
            <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="card">
                    <h5 class="m-2">Adatbekérő form:</h5>
                    <div class="card-body">
                        <h4 class="card-title">Elvetett búza mennyisége</h4>
                        <form class="text-center" action="" method="GET" name="points">
                            <input class="form-control" type="number" name="buza" id="buza" placeholder="buza" required>
                            <button class="btn btn-outline-primary mt-2 mb-2" name="submit2">Küldés</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col"></div>
        </div> 
        <?php
        if (isset($_GET['submit2'])) {
            if (isset($_GET['buza'])) {
                 if (is_numeric($_GET['buza'])) 
                 {
                    $buza = $_GET['buza'];
                    $random = rand(5,15);
                    switch ($random) {
                        case $random<9:
                            echo "Átlag alatti év várható";
                            break;
                        case $random>=9 && $random<13:
                            echo "Átlagos év várható";
                            break;
                        case $random>=13:
                            echo "Átlag feletti év várható";
                        
                        default:
                            echo "valami nem jó";
                            break;
                        
                    }
                    echo "<br>" . $buza * $random ."tonna búza várható";

                 }
            
                }
            }

        ?>
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="card">
                    <h5 class="m-2">Adatbekérő form:</h5>
                    <div class="card-body">
                        <h4 class="card-title">Oxigén</h4>
                        <form class="text-center" action="" method="GET" name="points">
                            <input class="form-control" type="number" name="oxigen" id="oxigen" placeholder="oxigen" required>
                            <input class="form-control" type="number" name="co2" id="co2" placeholder="co2" required>
                            <button class="btn btn-outline-primary mt-2 mb-2" name="submit2">Küldés</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col"></div>
        </div> 

        <?php
        if (isset($_GET['submit2'])) {
            if (isset($_GET['oxigen']) && isset($_GET['co2'])) {
                 if (is_numeric($_GET['oxigen'] && is_numeric('co2'))) 
                 {
                    $oxigen = $_GET['oxigen'];
                    $co2 = $_GET['co2'];
                    $RQ = $co2 / $oxigen;
                    switch ($RQ) {
                        case $RQ == "0,8":
                            echo "Megfelelő";
                            break;
                        case $RQ<"0,8":
                            echo "Zsírok"; 
                            break;
                        case $RQ>"0,8":
                            echo "Szénhidrátok";
                        default:

                            # code...
                            break;
                    }
                 }
            }
        }

        ?>









</body>

</html>
<!-- <?php









?> -->