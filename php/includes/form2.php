<form action="index.php" method="POST" class="position-relative pb-5" enctype="multipart/form-data">
    <div class="row">

        <div class="card col-md-7 mx-2 my-1 py-3">
            
            <div class="mb-3">
                <input type="text" class="form-control py-3" id="fname" name="fname" aria-describedby="emailHelp" placeholder="Prénom" value="<?php echo !empty($_SESSION) ? $_SESSION['table']['first_name'] : '' ?>">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control py-3" id="lname" name="lname" placeholder="Nom" value="<?php echo !empty($_SESSION) ? $_SESSION['table']['last_name'] : '' ?>">
            </div>
            
            <div class="text-start mb-3">
            <label for="age">Age (18 à 70 ans)</label>
            <input class ="form-control " type="number" placeholder="Renseignez votre âge" id="age" min="18" max="70" name="age" value="<?php echo !empty($_SESSION) ? $_SESSION['table']['age'] : '' ?>">
            </div>
            
            
            <div class="input-group mb-3">
                <span class="input-group-text">Taille(1.26m à 3m)</span>
                <input type="number" class="form-control" min="1.26" max="3" step="0.01" id="size" name="size" value="<?php echo !empty($_SESSION) ? $_SESSION['table']['size'] : '' ?>">
                <span class="input-group-text">m</span>
            </div>
            
            <div class="d-flex">
                <div class="form-check d-flex">
                    <input class="form-check-input me-3" type="radio" name="civility" value="femme" <?php echo !empty($_SESSION['table']['civility']) && $_SESSION['table']['civility'] == 'femme' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Femme
                    </label>
                </div>
                <div class="form-check d-flex">
                    <input class="form-check-input mx-3" type="radio" name="civility" value="homme" <?php echo !empty($_SESSION['table']['civility']) && $_SESSION['table']['civility'] == 'homme' ? 'checked' : '' ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Homme
                    </label>
                </div>
            </div>
        </div>
        
        <div class="card col-md-4 mx-2 my-1 py-3">
            <p class="ps-3">Connaissances</p>
            <label for="html"><input type="checkbox" class="mx-1" name="html" value="HTML5" <?php echo !empty($_SESSION['table']['html']) ? 'checked' : '' ?>>HTML5</label>
            <label for="css"><input type="checkbox" class="mx-1" name="css" value="CSS3" <?php echo !empty($_SESSION['table']['css']) ? 'checked' : '' ?>>CSS3</label>
            <label class="m-0 p-0"><input type="checkbox" class="mx-1" value="Javascript" name="javascript" <?php echo !empty($_SESSION['table']['javascript']) ? 'checked' : '' ?>>JavaScript</label>
            <label><input type="checkbox" class="mx-1" name="php" value="PHP" <?php echo !empty($_SESSION['table']['php']) ? 'checked' : '' ?>>PHP</label>
            <label><input type="checkbox" class="mx-1" name="mysql" value="MYSQL" <?php echo !empty($_SESSION['table']['mysql']) ? 'checked' : '' ?>>MySQL</label>
            <label><input type="checkbox" class="mx-1" name="bootstrap" value="Bootstrap" <?php echo !empty($_SESSION['table']['bootstrap']) ? 'checked' : '' ?>>Bootstrap</label>
            <label><input type="checkbox" class="mx-1" name="symfony" value="Symfony" <?php echo !empty($_SESSION['table']['symfony']) ? 'checked' : '' ?>>Symfony</label>
            <label><input type="checkbox" class="mx-1" name="react" value="React" <?php echo !empty($_SESSION['table']['react']) ? 'checked' : '' ?>>React</label>
            
            
            <label for="color">Couleur préferée</label>
            <input type="color" class="m-0 p-0 border border-3 border-secondary" id="color" name="color" value="<?php echo !empty($_SESSION['table']['color']) ? $_SESSION['table']['color'] : '' ?>">
            <label for="date">Date de naissance</label>
            <input type="date" name="date" id="date" class="border border-secondary mb-1 w-50" value="<?php echo !empty($_SESSION['table']['date']) ? $_SESSION['table']['date'] : '' ?>">
        </div>
        <div class="card col-11 mx-3 my-3">
            <label for="">Joindre une image (jpg ou png)</label>
            <input type="file" class="mb-2" accept="image/*" name="fileImg">
        </div>
    </div>
        <button type="submit" class="btn btn-primary mt-3 position-absolute end-0 bottom-0" name="postform">Enregistrer les données</button>
    </form>
