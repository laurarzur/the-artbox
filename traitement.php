<?php 

    if(!isset($_POST['name']) || !isset($_POST['artist']) 
    || !isset($_POST['img']) || !isset($_POST['description']) 
    || strlen($_POST['description']) < 3 
    || !filter_var($_POST['img'], FILTER_VALIDATE_URL)) 
    {
        header('Location: ajouter.php');
        
    } else {

        require 'bdd.php'; 
    
        $name = sanitize($_POST['name']); 
        $artist = sanitize($_POST['artist']); 
        $img = sanitize($_POST['img']); 
        $description = sanitize($_POST['description']);
    
        $bdd = connection();
        $sql = "INSERT INTO oeuvres (name, artist, img, description) VALUES (:name, :artist, :img, :description)"; 
    
        $query = $bdd->prepare($sql); 
        $query->bindParam(":name", $name, PDO::PARAM_STR); 
        $query->bindParam(":artist", $artist, PDO::PARAM_STR);
        $query->bindParam(":img", $img, PDO::PARAM_STR);
        $query->bindParam(":description", $description, PDO::PARAM_STR); 
    
        if ($query->execute()) {
            header('Location: oeuvre.php?id=' . $bdd->lastInsertId());
        }
    }


