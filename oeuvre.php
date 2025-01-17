<?php
    require 'header.php';
    require 'bdd.php'; 
    
    $bdd = connection(); 

    if(empty($_GET['id'])) {
        header('Location: index.php');
    }
    
    $sql = 'SELECT * FROM oeuvres WHERE id = :id';
    $query = $bdd->prepare($sql); 
    $query->bindParam(":id", $_GET['id'], PDO::PARAM_INT);
    $query->setFetchMode(PDO::FETCH_ASSOC); 
    $query->execute(); 
    $oeuvre = $query->fetch();

    if(!$oeuvre) {
        header('Location: index.php');
    }
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['img'] ?>" alt="<?= $oeuvre['name'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['name'] ?></h1>
        <p class="description"><?= $oeuvre['artist'] ?></p>
        <p class="description-complete">
             <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>
