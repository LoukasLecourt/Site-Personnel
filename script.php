

<?php
    $serveur = "localhost";
    $dbname = "cours";
    $user = "root";
    $pass = "";

    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //On crée une table form
        $form = "CREATE TABLE form(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            sexualite TEXT,
            age TEXT,
            profession INT,
            decouvert TEXT,
            pourquoi TEXT)";
        $dbco->exec($form);
    }
    catch(PDOException $e){
        echo 'Erreur : '.$e->getMessage();
    }
?>