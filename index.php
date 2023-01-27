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

    <form action="create.php" method="post">

        <label for="firstname">Voornaam:</label><br>
        <input type="text" name="firstname" id="firstname"><br>

        <label for="infix">Infix:</label><br>
        <input type="text" name="infix" id="infix"><br>

        <label for="lastname">Achternaam:</label><br>
        <input type="text" name="lastname" id="lastname"><br>

        <label for="haircolor">Haarkleur:</label><br>
        <input type="text" name="haircolor" id="haircolor"><br>

        <label for="dateofbirth">Geboortedatum:</label><br>
        <input type="date" name="dateofbirth" id="dateofbirth"><br>

        <label for="phonenumber">Telefoonnummer:</label><br>
        <input type="text" name="phonenumber" id="phonenumber"><br>

        <label for="streetname">Straatnaam:</label><br>
        <input type="text" name="streetname" id="streetname"><br>

        <label for="housenumber">Huisnummer:</label><br>
        <input type="number" name="housenumber" id="housenumber"><br>

        <label for="city">Woonplaats:</label><br>
        <input type="text" name="city" id="city"><br>

        <label for="zipcode">postcode:</label><br>
        <input type="text" name="zipcode" id="zipcode"><br>

        <label for="countryname">Landnaam:</label><br>
        <input type="text" name="countryname" id="countryname"><br><br>

        <input type="submit" value="Send!">

    </form>

</body>
</html>