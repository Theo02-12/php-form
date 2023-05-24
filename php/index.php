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
            }
            $showbtn = true;

            ?>
        </div>
        <div class="container mt-5 w-md-50 w-sm-75">
            <?php

            if (isset($_GET['add'])) {
                echo '<h3 class="text-center">Ajouter des données</h3>';
                $showbtn = false;
                include 'includes/form.html';
            } elseif (isset($_GET['addmore'])) {
                echo '<h3 class="text-center">Ajouter plus de données</h3>';
                $showbtn = false;
                include 'includes/form2.php';
            } elseif (isset($_POST['submit']) || isset($_POST['postform'])) {
                echo "<p class='text-center alert-success py-3'>Données sauvegardées</p>";
                $showbtn = false;
                $nom = $_POST['fname'];
                $lname = $_POST['lname'];
                $age = $_POST['age'];
                $size = $_POST['size'];
                $genre = $_POST['civility'];

                if (isset($_POST['postform'])) {
                    $filepath = 'uploaded/' . basename($_FILES['fileImg']['name']);

                    if (move_uploaded_file($_FILES['fileImg']['tmp_name'], $filepath)) {
                        echo "<div class='alert alert-success text-center' role='alert'>
                        Image sauvegadée!
                      </div>";
                    }elseif ($_FILES['fileImg']['size'] >= 200000) {
                        echo "<div class='alert alert-danger text-center' role='alert'>
                        La taille de l'image est trop grande!
                        </div>";
                    } 
                    else {
                        echo "<div class='alert alert-danger text-center' role='alert'>
                        Aucune image sauvegadée!
                        </div>";
                    }

                    $extension = pathinfo($filepath, PATHINFO_EXTENSION);
                    $weight = filesize($filepath);
                    $name = pathinfo($filepath, PATHINFO_FILENAME);
                    $tmpname = $_FILES['fileImg']['tmp_name'];
                    $ingor = $_FILES['fileImg']['error'];

                }
                    $table = array(
                        "first_name" => $nom,
                        "last_name" => $lname,
                        "age" => $age,
                        "size" => $size,
                        "civility" => $genre,
                        "html" => !empty($_POST['html']) ? $_POST['html'] : null,
                        "css" => !empty($_POST['css']) ? $_POST['css'] : null,
                        "javascript" => !empty($_POST['javascript']) ? $_POST['javascript'] : null,
                        "php" => !empty($_POST['php']) ? $_POST['php'] : null,
                        "mysql" => !empty($_POST['mysql']) ? $_POST['mysql'] : null,
                        "bootstrap" => !empty($_POST['bootstrap']) ? $_POST['bootstrap'] : null,
                        "symfony" => !empty($_POST['symfony']) ? $_POST['symfony'] : null,
                        "react" => !empty($_POST['react']) ? $_POST['react'] : null,
                        "color" => !empty($_POST['color']) ? $_POST['color'] : null,
                        "dob" => !empty($_POST['date']) ? $_POST['date'] : null,
                        "img" => isset($_POST['postform']) ? array(
                            "name" => $name,
                            "type" => $extension,
                            "tmp_name" => $tmpname,
                            "error" => $ingor,
                            "size" => $weight,
                            )
                            
                            : null
                        );
                        
                        
                        $_SESSION['table'] = $table;
                        
                    }
                     elseif (isset($_GET['debugging'])) {
                echo "<h2 class='text-center'>Débogage</h2>";
                echo "<h5 class='mt-5'>===> Lecture du tableau à l'aide de la fonction print_r()</h5>";
                $debugTables = ($_SESSION['table']);
                $filterArray = array_filter($debugTables);
                $showbtn = false;
                echo "<pre>";
                print_r($filterArray);
            } elseif (isset($_GET['concatenation'])) {
                echo "<h2 class='text-center'>Concaténation</h2>";
                $debugTables = ($_SESSION['table']);
                $showbtn = false;

                function title($myTitle){
                    echo "<h5 class='mt-3'>===> {$myTitle} </h3>";
                }
                title("Construction d'une phrase avec le contenu du tableau");
                
                if ($debugTables['civility'] == 'homme') {
                    echo "<p>Mr" . " " .  $debugTables['first_name'] . " " . $debugTables['last_name'] . "</p>";
                } elseif ($debugTables['civility'] == 'femme') {
                    echo "<p>Mme" . " " .  $debugTables['first_name'] . " " . $debugTables['last_name'] . "</p>";
                }
                
                function infosMe()
                {
                    global $debugTables;
                    echo "<p>J'ai " . $debugTables['age'] . " ans et je mesure " . $debugTables['size'] . "m</p>";
                }
                infosMe();

                function getMaj()
                {
                    global $debugTables;
                    if ($debugTables['civility'] == 'homme') {
                        echo "<p>Mr" . " " .  ucfirst($debugTables['first_name']) . " " . strtoupper($debugTables['last_name']) . "</p>";
                    } elseif ($debugTables['civility'] == 'femme') {
                        echo "<p>Mme" . " " .  ucfirst($debugTables['first_name']) . " " . strtoupper($debugTables['last_name']) . "</p>";
                    }
                }
                title("Construction d'une phrase après MAJ du tableau");
                getMaj();
                infosMe();

                title("Affichage d'une virgule à la place du point pour la taille");
                getMaj();
                echo "<p>J'ai " . $debugTables['age'] . " ans et je mesure " . str_replace('.', ',', $debugTables['size']) . "m</p>";
            }
            function readTable()
            {
                $debugTables = ($_SESSION['table']);
                $debugFilter = array_filter($debugTables);
                $key = -1;
                foreach ($debugFilter as $index => $data) {
                    $key++;
                    if ($index !== 'img') {
                        echo "<p>à la ligne n°" . $key . ' correspond la clé "' . $index . '" et contient "' . $data . '"</p>';
                    } else {
                        echo "<p>à la ligne n°" . $key . ' correspond la clé "' . 'img'  . '" et contient</p>';
                        echo "<img src='uploaded/" . $data['name'] . "." . $data['type'] . "' class='mw-100'>";
                    }
                }
            }
            if (isset($_GET['loop'])) {
                echo "<h2 class='text-center'>Boucle</h2><h5 class='mt-4'>===> Construction d'une phrase après MAJ du tableau</h5>";
                $showbtn = false;
                readTable();
            } elseif (isset($_GET['function'])) {
                echo "<h2 class='text-center'>Fonction</h2><h5 class='mt-4'>===> J'utilise ma fonction readTable()</h5>";
                $showbtn = false;
                readTable();
            } elseif (isset($_GET['del'])) {
                echo "<p class='text-center alert-success py-3'>Données supprimées</p>";
                $showbtn = false;
                session_destroy();
            }
            if ($showbtn) {
                echo "<a class='btn border px-3 bg-primary text-light' href='?add' name='data'>Ajouter des données</a>";
                echo "<a class='btn border px-3 bg-secondary text-light' href='?addmore' name='data'>Ajouter plus de données</a>";
            }

            ?>
        </div>
    </div>

    <?php
    include 'includes/footer.html'
    ?>
</body>

</html>