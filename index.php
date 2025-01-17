<?php
    require 'header.php';
    require 'bdd.php'; 

    $bdd = connection(); 
    $oeuvres = $bdd->query('SELECT * FROM oeuvres');
?>
<div id="liste-oeuvres">
    <?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['img'] ?>" alt="<?= $oeuvre['name'] ?>">
                <h2><?= $oeuvre['name'] ?></h2>
                <p class="description"><?= $oeuvre['artist'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>
