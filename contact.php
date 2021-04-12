<?php
    $serveur = "localhost";
    $dbname = "cours";
    $user = "root";
    $pass = "root";
    
    $sexe = $_POST["q1"];
    $age = $_POST["q2"];
    $profession = $_POST["q3"];
    $decouvert = $_POST["q4"];
    $pourquoi = $_POST["q5"];
    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Création Base de Donnée
        $sql = "CREATE DATABASE pdodb";
        $dbco->exec($sql);
                    
        echo 'Base de données créée bien créée !';
        //On insère les données reçues
        $sth = $dbco->prepare("
            INSERT INTO form(sexe, age, profession, decouvert, pourquoi)
            VALUES(:sexe, :age, :profession, :decouvert, :pourquoi)");
        $sth->bindParam(':sexe',$sexe);
        $sth->bindParam(':age',$age);
        $sth->bindParam(':profession',$profession);
        $sth->bindParam(':decouvert',$decouvert);
        $sth->bindParam(':pourquoi',$pourquoi);
        $sth->execute();
        
        //On renvoie l'utilisateur vers la page de remerciement
        header("Location:index.html");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>