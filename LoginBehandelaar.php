<?php 
    require_once ',DevFiles/dataCon.php';

    session_start();

    if(isset($_POST["login-button"])) {
        $naaminput = $_POST['naam'];
        $wachtwoordinput = $_POST['wachtwoord'];

        $behandelaarloginquery = "SELECT behandelaar_id, voornaam, wachtwoord FROM behandelaar;";

        $behandelaarresult = mysqli_query($conn, $behandelaarloginquery);

        $account = mysqli_fetch_assoc($behandelaarresult);

        if ($naaminput == $account['voornaam']) {
            if ($wachtwoordinput  == $account['wachtwoord']) {
                $_SESSION['LIUB'] = $account['behandelaar_id']; // LogInStatus
                header("Location: http://localhost/.projects/Github/draai-schijf-breman/BackOffice.php");
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="login/css/LoginCSS.css">
        <title>Breman - Behandelaar Login</title>
        <link rel="icon" href="login/assets/img/icon.png" type="image/x-icon">
        <script src="login/JS/InlogJS.js"></script>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="headersection">
            <div class="Header">
                <div class="HL1">
                    <div class="HL2">
                        <div class="HB1"></div>
                        <div class="HB2">
                            <img src="login/assets/img/logo.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <br>

        
        <div class="contentmargin"></div>
        <div class="contentsection">
            <div class="registersection">
                <p>Welkom op de login pagina. Login in om naar de BackOffice omgeving te gaan.</p>
                <div class="switchregisterbutton" onclick="goToKLogin();"><p>Klant Login</p></div>
                <form method="post">
                    <input placeholder="Voornaam" type="text" name="naam"/>
                    <input placeholder="Wachtwoord" type="password" name="wachtwoord"/>
                    <input type="submit" name="login-button" value="Inloggen" id="butnhover"/>
                </form>
            </div>
        </div>
    </body>
</html>