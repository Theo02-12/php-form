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
            <a class="btn border px-5" href="index.php?page=ul">Home</a>
            <?php

            $_SESSION["showbtn"] = true;

            $page = isset($_GET['page']) ? $_GET['page'] : '';
            
            ?>
        </div>
        <div class="container mt-5 w-md-50 w-sm-75">
            <?php


            if ($page == 'form') {
                $filename = 'includes/' . $page . '.html';
                $_SESSION["showbtn"] = false;
                if (file_exists($filename)) {
                    include($filename);
                }
            };

            if ($_SESSION["showbtn"]) {
                echo "<a class='btn border px-3 bg-primary text-light' href='?page=form' name='data'>Ajouter des données</a>";
            }


            ?>
        </div>
    </div>

    <?php
    include 'includes/footer.html'
    ?>
</body>

</html>