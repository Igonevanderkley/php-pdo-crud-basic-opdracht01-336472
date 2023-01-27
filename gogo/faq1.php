<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=faq", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    $sql = 'SELECT * from faq';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="CSS/faq.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <!-- <link rel="stylesheet" href="CSS/homepage.css"> -->
    <script src="../igone/header.js"></script>
</head>

<body>
    <div id="parent">
        <div class="header">
            <div class="logo">
                <a href="homepage.html"><img src="IMG/LOGO.png" alt=""></a>
            </div>

            <ul class="menu">
                <a href="media.html">
                    <li>Media</li>
                </a>
                <a href="faq.html">
                    <li>FAQ</li>
                </a>
                <a href="support.html">
                    <li>Characters</li>
                </a>
                <a href="preorder.html">
                    <li class="last">Pre-Order</li>
                </a>
            </ul>


            <ul class="socialMedia">
                <a href="https://www.facebook.com/HogwartsLegacy">
                    <li><img src="IMG/facebook.png"></li>
                </a>
                <a href="https://twitter.com/HogwartsLegacy">
                    <li><img src="IMG/twitter.png"></li>
                </a>
                <a href="https://www.instagram.com/hogwartslegacy/">
                    <li><img src="IMG/instagram.png"></li>
                </a>
                <a href="https://www.tiktok.com/@warnerbrosgames">
                    <li><img src="IMG/tiktok.png"></li>
                </a>
                <a href="https://discord.com/invite/HogwartsLegacy">
                    <li><img src="IMG/discord.png"></li>
                </a>
                <a href="https://www.youtube.com/c/HogwartsLegacy">
                    <li><img src="IMG/youtube.png">
                </a></li>
            </ul>

            <div id="countDownClock"></div>
        </div>
    </div>
    <div class="titlefaq">
        <img class="decoration" src="./IMG/title-decoration.webp" alt="0">
        <h1>FAQ</h1>
        <img class="decoration" src="./IMG/title1-decoration.webp" alt="0">
        <?php while ($line = $q->fetch()) :
            echo "<details>";
            echo "<summary>" . $line['Question'] . "</summary>";
            echo  "<p>" . $line['Answer'] . "</p>";
            echo "</details>";
        endwhile;

        ?>
    </div>






    <!-- <footer>
        <div class="social-links">
            <a href="https://discord.gg/HogwartsLegacy"><img src="IMG/discord.png" alt=""></a>
            <a href="https://www.youtube.com/HogwartsLegacy"><img src="IMG/youtube.png" alt=""></a>
            <a href="https://www.facebook.com/HogwartsLegacy"><img src="IMG/facebook.png" alt=""></a>
            <a href="https://twitter.com/HogwartsLegacy"><img src="IMG/twitter.png" alt=""></a>
            <a href="https://www.instagram.com/HogwartsLegacy"><img src="IMG/instagram.png" alt=""></a>
            <a href="https://www.tiktok.com/@warnerbrosgames"><img src="IMG/tiktok.png" alt=""></a>
        </div>
        <div class="consoles">
            <img src="img/ps5_tm.svg" alt="">
            <img src="img/nintendo-switch.svg" alt="">
            <img src="img/ps4_tm.svg" alt="">
            <img src="img/pc-digital-download-logo.svg" alt="">
            <img src="img/xbox-one.svg" alt="">
        </div>

    </footer> -->
</body>

</html>