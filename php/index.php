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
                echo "<p class='text-center bg-success py-3 text-light'>Données sauvegardées</p>";
                $showbtn = false;
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
            elseif (isset($_GET['debugging'])) {
                echo "<h2 class='text-center'>Débogage</h2>";
                echo "<h5 class='mt-5'>===> Lecture du tableau à l'aide de la fonction print_r()</h5>";
                $debugTables = ($_SESSION['table']);
                $showbtn = false;
                echo "<pre>";
                print_r($debugTables);
            }
            elseif (isset($_GET['concatenation'])) {
                echo "<h2 class='text-center'>Concaténation</h2>";
                $debugTables = ($_SESSION['table']);
                $showbtn = false;
                echo "<h5 class='mt-5'>===> Construction d'une phrase avec le contenu du tableau</h5>";
                
                function getGenre($debugTables){
                    global $debugTables;
                        if($debugTables['civility'] == 'homme'){
                            echo "Mr" . " " .  $debugTables['first_name'] . " " . $debugTables['last_name'] . "<br>";
                        }elseif($debugTables['civility'] == 'femme'){
                            echo "Mme" . " " .  $debugTables['first_name'] . " " . $debugTables['last_name'] . "<br>";
                        }
                }
                getGenre($debugTables);
                
                function infosMe(){
                    global $debugTables;
                    echo "J'ai " . $debugTables['age'] . " ans et je mesure " . $debugTables['size'] . "m"; 
                }
                infosMe();
                    
                function getMaj(){
                    global $debugTables;
                    if($debugTables['civility'] == 'homme'){
                        echo "Mr" . " " .  $debugTables['first_name'] . " " . strtoupper($debugTables['last_name']) . "<br>";
                    }elseif($debugTables['civility'] == 'femme'){
                        echo "Mme" . " " .  $debugTables['first_name'] . " " . strtoupper($debugTables['last_name']) . "<br>";
                    }
                }
                echo "<h5 class='mt-5'>===> Construction d'une phrase après MAJ du tableau</h5>";
                getMaj();
                infosMe();
                
                echo "<h5 class='mt-5'>===> Affichage d'une virgule à la place du point pour la taille</h5>";
                getMaj();
                echo "J'ai " . $debugTables['age'] . " ans et je mesure " . str_replace('.', ',', $debugTables['size']) . "m";
            }
            elseif(isset($_GET['loop'])){
                echo "<h2 class='text-center'>Boucle</h2><br><h5 class='mt-4'>===> Construction d'une phrase après MAJ du tableau</h5>";
                $showbtn = false;
                $debugTables = ($_SESSION['table']);
                $keys = array_keys($debugTables);
                $values = array();
                $key = -1;
                foreach($debugTables as $index => $data){
                        $values[] = $data;
                        $key++;
                        echo "à la ligne n°" . $key .' correspond la clé "'. $index  . '" et contient "' . $data . '" <br>';
                }
                    
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