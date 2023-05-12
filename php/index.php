<!DOCTYPE html>
<html lang="fr">
    <?php include 'includes/head.inc.html'?>
<body>
    <?php include 'includes/header.inc.html'?>
    <div class="container d-flex flex-column flex-md-row">
        <div class="container d-flex flex-column mt-5">
            <a class="btn border px-5" href="#">Home</a>
            <?php 
                include 'includes/ul.php'
            ?>
        </div>
        <div class="container text-center mt-5">
            <?php
                $showbtn = true;
                
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    $filename = 'includes/' . $page . '.php';
                    $showbtn = false;
                    if(file_exists($filename)){
                        include ($filename);
                    }  
                };
                
                if($showbtn){
                    echo "<a class='btn border px-3 bg-primary text-light' href='?page=form'>Ajouter des données</a>";
                }
                ?>
        </div>
    </div>

    <?php 
        include 'includes/footer.html'
    ?>
</body>
</html>