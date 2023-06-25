<?php 
    require_once ',DevFiles/dataCon.php';

    session_start();

    if(isset($_POST["login-button"])) {
        $naaminput = $_POST['naam'];
        $wachtwoordinput = $_POST['wachtwoord'];

        $klantloginquery = array("SELECT klant_id, voornaam, wachtwoord FROM klant WHERE voornaam='", $naaminput, "';");

        $klantloginsql = implode("", $klantloginquery);

        $klantresult = mysqli_query($conn, $klantloginsql);

        if ($klantresult <= 0) {

            echo "No Users Found!";
            return;
        }

        $account = mysqli_fetch_assoc($klantresult);

        if ($naaminput == $account['voornaam']) {
            if ($wachtwoordinput  == $account['wachtwoord']) {
                $_SESSION['LIUK'] = $account['klant_id']; // LogInStatus
                header("Location: http://localhost/.projects/Github/draai-schijf-breman/FrontOffice.php");
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="login/css/LoginCSS.css">
        <title>Breman - Klant Login</title>
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
                <p>Welkom op de login pagina. Login in om naar de draaischijf te gaan.</p>
                <div class="switchregisterbutton" onclick="goToBLogin();"><p>Behandelaar Login</p></div>
                <form method="post">
                    <input placeholder="Voornaam" type="text" name="naam"/>
                    <input placeholder="Wachtwoord" type="password" name="wachtwoord"/>
                    <input type="submit" name="login-button" value="Inloggen" id="butnhover"/>
                </form>
            </div>
        </div>
    </body>
</html>