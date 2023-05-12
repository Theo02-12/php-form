<!DOCTYPE html>
<html lang="fr">
    <?php

use function PHPSTORM_META\map;

 include 'includes/head.inc.html'?>
<body>
    <?php include 'includes/header.inc.html'?>
    <div class="container d-flex flex-column flex-md-row">
        <div class="container d-flex flex-column mt-5 md-w-25">
            <a class="btn border px-5" href="?page=ul">Home</a>
            <?php 
             
             $showbtn = true;
             $page = isset($_GET['page']) ? $_GET['page'] : '';
             
              if($page == 'ul')
              require 'includes/ul.php';
             ?>
        </div>
        <div class="container mt-5 w-50">
            <?php  
                if($page == 'form'){
                    $filename = 'includes/' . $page . '.html';
                    $showbtn = false;
                    if(file_exists($filename)){
                        include ($filename);
                    }              
                };
                if($showbtn){
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