<?php
// maak een verbidning met de mysql-server en database

require('config.php');

//maak een data sourcename string
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";


try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "De verbinding is gelukt";

    } else {
        echo "er is een interne server-error";
    }
} catch (PDOException $e) {
    echo $e->$getMessage();
}

// maak een select query die alle record uit de tabel Persoon haalt

$sql = "SELECT * FROM Persoon";


// maak de sql-query gereed om te worden uitgevoerd op de database
$statement = $pdo->prepare($sql);

//voer de sql-query uit op de database
$statement->execute();


// zet het  resultaat in een array met daarin de obecjten (records uit de table persoon)
$result = $statement->fetchAll(PDO::FETCH_OBJ);


// check wat we terug krijgen
//var_dump($result);

// echo $result[0]->Achternaam;


$rows = "";
foreach ($result as $info) {
    $rows .= "<tr>
                    <td>$info->Id</td>
                    <td>$info->Voornaam</td>
                    <td>$info->Tussenvoegsel</td>
                    <td>$info->Achternaam</td>
                    <td>$info->haarkleur</td>
                    <td>$info->geboortedatum</td>
                    <td>$info->Telefoonnummer</td>
                    <td>$info->Straatnaam</td>
                    <td>$info->Huisnummer</td>
                    <td>$info->Woonplaats</td>
                    <td>$info->Postcode</td>
                    <td>$info->Landnaam</td>
                    <td>
                    <a href='delete.php?Id=$info->Id'>
                        <img src='img/b_drop.png' alt='kruis'>
                    </a>
                </td>
                <td>
                <a href='update.php?Id=$info->Id'>
                    <img src='img/b_edit.png' alt='potlood'>
                </a>
                    </td>
                    <tr>      
         ";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h3>Persoonsgegevens</h3>

    <a href="index.php">
        <input type="button" value="Nieuw record">
    </a>
    <br>
    <br>
    <table border='1'>
        <thead>
            <th>Id</th>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>haarkleur</th>
            <th>geboortedatum</th>
            <th>telefoonnummer</th>
            <th>straatnaam</th>
            <th>huisnummer</th>
            <th>woonplaats</th>
            <th>postcode</th>
            <th>landnaam</th>
            <th></th>
            <th></th>
            <t /head>
        <tbody>
            <?= $rows ?>
        </tbody>
    </table>
</body>

</html>