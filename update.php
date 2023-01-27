<?php

//echo $_GET['Id'];
// Voeg de verbindingsgegevens toe in config.php
require('config.php');

// maak de data sourcename string
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "Er is een verbinding met de database";
    } else {
        echo "Interne server-error";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    var_dump($_POST);
    //maak sql query

    try {
        $sql = "UPDATE Persoon
        SET     Voornaam = :firstname
                ,Achternaam = :lastname
                ,Tussenvoegsel = :infix
                ,Achternaam = :lastname
                ,haarkleur = :haircolor
                ,geboortedatum = :dateofbirth
                ,Telefoonnummer = :phonenumber
                ,Straatnaam = :streetname
                ,Huisnummer = :housenumber
                ,woonplaats = :city
                ,Postcode = :zipcode
                ,Landnaam = :countryname
            Where Id = :id";

        //voorbereiden
        $statement = $pdo->prepare($sql);

        $statement->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
        $statement->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
        $statement->bindValue(':infix', $_POST['infix'], PDO::PARAM_STR);
        $statement->bindValue(':haircolor', $_POST['haircolor'], PDO::PARAM_STR);
        $statement->bindValue(':dateofbirth', $_POST['dateofbirth'], PDO::PARAM_STR);
        $statement->bindValue(':phonenumber', $_POST['phonenumber'], PDO::PARAM_STR);
        $statement->bindValue(':streetname', $_POST['streetname'], PDO::PARAM_STR);
        $statement->bindValue(':housenumber', $_POST['housenumber'], PDO::PARAM_STR);
        $statement->bindValue(':city', $_POST['city'], PDO::PARAM_STR);
        $statement->bindValue(':zipcode', $_POST['zipcode'], PDO::PARAM_STR);
        $statement->bindValue(':countryname', $_POST['countryname'], PDO::PARAM_STR);
        $statement->bindValue(':id', $_POST['id'], PDO::PARAM_STR);
        
        $statement->execute();

        //stuur gebruiker door naar read.php met een header(Refresh) functie;
        echo 'update voltooid';
        header('Refresh:3; url=read.php');
    } catch (PDOException $e) {
        echo 'Update niet voltooid';
        header('Refresh:3; url=read.php');
        echo $e->getMessage();
    }

    exit();
}


//maak een sql-query

$sql = "SELECT Id 
        ,Voornaam
        ,Tussenvoegsel
        ,Achternaam
        ,haarkleur
        ,geboortedatum
        ,Telefoonnummer
        ,Straatnaam
        ,Huisnummer
        ,Woonplaats
        ,Postcode
        ,Landnaam
            FROM Persoon
            WHERE Id = :Id";
// maak de sql query klaar om de $_GET id waarde te koppelen
$statement = $pdo->prepare($sql);

// kopper de waarde $_GET['Id] waarde koopelen aan de placeholder :Id
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);

// voer de query uit
$statement->execute();

$result = $statement->fetch(PDO::FETCH_OBJ);

var_dump($result);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="shortcut icon" href="/IMG/favicon.ico" type="image/x-icon">
    <title>PHP PDO CRUD</title>
</head>

<body>
    <h1>PHP PDO CRUD</h1>

    <form action="update.php" method="post">

        <label for="firstname">Voornaam:</label><br>
        <input type="text" name="firstname" id="firstname" value="<?= $result->Voornaam; ?>"><br>

        <label for="infix">Infix:</label><br>
        <input type="text" name="infix" id="infix" value="<?= $result->Tussenvoegsel; ?>"><br>

        <label for="lastname">Achternaam:</label><br>
        <input type="text" name="lastname" id="lastname" value="<?= $result->Achternaam; ?>"><br>

        <label for="haircolor">Haarkleur:</label><br>
        <input type="text" name="haircolor" id="haircolor" value="<?= $result->haarkleur; ?>"><br>

        <label for="dateofbirth">Geboortedatum:</label><br>
        <input type="date" name="dateofbirth" id="dateofbirth" value="<?= $result->geboortedatum; ?>"><br>

        <label for="phonenumber">Telefoonnummer:</label><br>
        <input type="number" name="phonenumber" id="phonenumber" value="<?= $result->Telefoonnummer; ?>"><br>

        <label for="streetname">Straatnaam:</label><br>
        <input type="text" name="streetname" id="streetname" value="<?= $result->Straatnaam; ?>"><br>

        <label for="housenumber">Huisnummer:</label><br>
        <input type="text" name="housenumber" id="housenumber" value="<?= $result->Huisnummer; ?>"><br>

        <label for="city">Woonplaats:</label><br>
        <input type="text" name="city" id="city" value="<?= $result->Woonplaats; ?>"><br><br>

        <label for="zipcode">Postcode:</label><br>
        <input type="text" name="zipcode" id="zipcode" value="<?= $result->Postcode; ?>"><br>

        <label for="country">Landnaam:</label><br>
        <input type="text" name="countryname" id="countryname" value="<?= $result->Landnaam; ?>"><br>


        <input type="hidden" name="id" value="<?= $result->Id; ?>">

        <input type="submit" value="Send!">
    </form>

    <a href="read.php">read</a>



</body>

</html>