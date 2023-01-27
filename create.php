<?php

// contact maken met de msql server

require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($pdo) {
        echo " Er is een verbinding met de mysql server";
    } else {
        echo "Er is een interne-error, neem contact op met de beheerder";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

//we gaan een insert-query maken voor het wegschrijvne van de formuliergegevens

$sql = "INSERT INTO Persoon (Id 
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
                            ,Landnaam)
        VALUES              (NULL
                            ,:voornaam 
                            ,:tussenvoegsel
                            ,:achternaam
                            ,:haarkleur
                            ,:geboortedatum
                            ,:telefoonnummer
                            ,:straatnaam
                            ,:huisnummer
                            ,:woonplaats
                            ,:postcode
                            ,:landnaam);";


//We bereiden de sql-query voor mert de method prepare 
$statement = $pdo->prepare($sql);

$statement->bindValue(':voornaam', $_POST['firstname'], PDO::PARAM_STR);
$statement->bindValue(':tussenvoegsel', $_POST['infix'], PDO::PARAM_STR);
$statement->bindValue(':achternaam', $_POST['lastname'], PDO::PARAM_STR);
$statement->bindValue(':haarkleur', $_POST['haircolor'], PDO::PARAM_STR);
$statement->bindValue(':geboortedatum', $_POST['dateofbirth'], PDO::PARAM_STR);
$statement->bindValue(':telefoonnummer', $_POST['phonenumber'], PDO::PARAM_STR);
$statement->bindValue(':straatnaam', $_POST['streetname'], PDO::PARAM_STR);
$statement->bindValue(':huisnummer', $_POST['housenumber'], PDO::PARAM_STR);
$statement->bindValue(':woonplaats', $_POST['city'], PDO::PARAM_STR);
$statement->bindValue(':postcode', $_POST['zipcode'], PDO::PARAM_STR);
$statement->bindValue(':landnaam', $_POST['countryname'], PDO::PARAM_STR);





//we vuren de sql-query af op de database
$statement->execute();

if ($result) {
    echo "Er is een nieuw record gemaakt in de database.";
    header('Refresh:2; url=read.php');
} else {
    echo "Er is geen nieuw record gemaakt.";
    header('Refresh:2; url=read.php');
}
