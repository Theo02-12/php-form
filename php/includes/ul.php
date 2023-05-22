
<div class="card sm-mt-3">
    <div class="card-body d-flex flex-column">
        <div class="list-group">
            <a href="index.php?debugging" class="list-group-item list-group-item-action <?php echo isset($_GET['debugging']) ? 'active' : ''; ?>">Débogage</a>
            <a href="index.php?concatenation" class="list-group-item list-group-item-action <?php echo isset($_GET['concatenation']) ? 'active' : ''; ?>">Concaténation</a>
            <a href="index.php?loop" class="list-group-item list-group-item-action <?php echo isset($_GET['loop']) ? 'active' : ''; ?>">Boucle</a>
            <a href="index.php?function" class="list-group-item list-group-item-action <?php echo isset($_GET['function']) ? 'active' : ''; ?>">Fonction</a>
            <a href="index.php?del" class="list-group-item list-group-item-action <?php echo isset($_GET['del']) ? 'active' : ''; ?>">Supprimer</a>
     
          </div>
    </div>
</div>