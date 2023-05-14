<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<?php

use function PHPSTORM_META\map;

include 'includes/head.inc.html';
?>

<body>
    <?php include 'includes/header.inc.html' ?>
    <div class="container d-flex flex-column flex-md-row">
        <div class="col col-xl-3 d-flex flex-column mt-5">
            <a class="btn border px-5" href="index.php">Home</a>
            <?php

            if (!empty($_SESSION)) {
                include 'includes/ul.php';
                $table = $_SESSION['table'];
            }
            $showbtn = true;

            ?>
        </div>
        <div class="container mt-5 w-md-50 w-sm-75">
            <?php

            if (isset($_GET['add'])) {
                $showbtn = false;
                include 'includes/form.html';
            }
            elseif (isset($_POST['submit'])) {
                $nom = $_POST['fname'];
                $lname = $_POST['lname'];
                $age = $_POST['age'];
                $size = $_POST['size'];
                $genre = $_POST['civility'];
                
                $table = array(
                    "first_name" => $nom,
                    "last_name" => $lname,
                    "age" => $age,
                    "size" => $size,
                    "civility" => $genre,
                );
                $_SESSION['table'] = $table;
            }

            if (isset($_GET['debugging'])) {
                echo "<h2 class='text-center'>Débogage</h2>";
                $debugTables = ($_SESSION['table']);
                $showbtn = false;
                echo "<pre>";
                print_r($debugTables);
            }

            if ($showbtn) {
                echo "<a class='btn border px-3 bg-primary text-light' href='?add' name='data'>Ajouter des données</a>";
            }


            ?>
        </div>
    </div>

    <?php
    include 'includes/footer.html'
    ?>
</body>

</html>