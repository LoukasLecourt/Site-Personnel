<?php
    $serveur = "mysql-loukaslecourt.alwaysdata.net";
    $dbname = "loukaslecourt_formulaire";
    $user = "229803";
    $pass = "Loukas.19";
    
    if (isset($_POST['q1'])) {
        $sexe = $_POST['q1'];
    }
    if (isset($_POST['q2'])) {
        $age = $_POST['q2'];
    }
    if (isset($_POST['q3'])) {
        $profession = $_POST['q3'];
    }
    if (isset($_POST['q4'])) {
        $decouvert = $_POST['q4'];
    }
    if (isset($_POST['q5'])) {
        $pourquoi = $_POST['q5'];
    }
    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Création Base de Donnée
        //$sql = "CREATE DATABASE cour";
        //$dbco->exec($sql);

        //On crée une table form
        $form = "CREATE TABLE formulaire(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            sexualite TEXT,
            age TEXT,
            profession TEXT,
            decouvert TEXT,
            pourquoi TEXT)";
        $dbco->exec($form);
                    
        echo 'Base de données créée bien créée !';

        //On insère les données reçues
        $sth = $dbco->prepare("
            INSERT INTO formulaire(sexualite, age, profession, decouvert, pourquoi)
            VALUES(:sexe, :age, :profession, :decouvert, :pourquoi)");
        $sth->bindParam(':sexe',$sexe);
        $sth->bindParam(':age',$age);
        $sth->bindParam(':profession',$profession);
        $sth->bindParam(':decouvert',$decouvert);
        $sth->bindParam(':pourquoi',$pourquoi);
        $sth->execute();

        //On renvoie l'utilisateur vers la page de remerciement
        header("Location:contact.html");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>