<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .text1, .text2, .text3, .text4, .text5 {
            text-decoration: none;
        }
        .odkaz1{
            position: relative;
            top: 20px;
        }

        .odkaz2{
            position: relative;
            top: 40px;
        }

        .odkaz3{
            position: relative;
            top: 60px;
        }

        .odkaz4{
            position: relative;
            top: 80px;
        }

        .odkaz5{
            position: relative;
            top: 100px;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="../css/main.css">

</head>
<body>
    <audio id="hudba">
        <source src="../hudba/liqwyd-weekend.mp3" type="audio/mpeg">
        Pravdepodobne tvoj browser nepodporuje audio
    </audio>

    <div class ="panelLeft">
        <div class ="nazov">
            <p class ="textGalaxcia"> Galaxie</p>
        </div>
        <div class="informacie">
            <ul>
                <li class="odkaz1"><a href="stars.html" class="text1"> Hviezdy</a> </li>
                <li class="odkaz2"><a href="stars.html" class="text2"> Planety</a> </li>
                <li class="odkaz3"><a href="stars.html" class="text3"> Galaxie</a> </li>
                <li class="odkaz4"><a href="stars.html" class="text4"> čierne diery</a> </li>
                <li class="odkaz5"><a href="abous_us.html" class="text5"> O nas</a> </li>
            </ul>
        </div>
    </div>

    <div class="panelRight">
        <div class ="nazov">
            <p class ="textGalaxcia"> Galaxie</p>
        </div>
        <div>
            <ul>
                <?php
                session_start();
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                    echo '<li><a href="change.php"> zmenit Udaje </a> </li>';
                    echo '<li><a href="delete.php"> Vymazat Ucet </a> </li>';
                    echo '<li><a href="loginOut.php"> Odhlasit sa </a> </li>';
                } else {
                    echo '<li><a href="login.html"> Prihlasenie</a> </li>';
                    echo '<li><a href="registration.html"> Registracia</a> </li>';
                }
                ?>
            </ul>
        </div>

        <div class="hudba">
            <p>Zmenit hlasitost hudby.</p>
            <input type="range" id="hlasitost" min="0" max="1" step="0.1" value="1" />

            <button id="pause/contiue" class="pause">
                <i id="icon" class="fas fa-pause"></i>
            </button>
        </div>
    </div>

    <script src="../javascript/main.js"> </script>
</body>
</html>
