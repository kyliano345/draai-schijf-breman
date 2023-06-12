<?php 
    //require_once('PHP/??.php');

    // HIER DATABASE OPHALEN

    // HIER DATABASE FUNCTIONS MAKEN ZODRA ER OP DE KNOP (met id: StuurKnop) WORDT GEKLIKT



    // =======================
    // Zoiets:
    // $textvariable; // = $_POST["probleeminfo"];



    // INSERT INTO meldingen (user_id, notificationtext)
    // VALUES ($_SESSION["loggedInUserId"], $textvariable);
    // =======================
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="frontoffice/CSS/FrontOfficeCSS.css">
        <title>Breman - Draaischijf</title>
        <link rel="icon" href="frontoffice/assets/icon.png" type="image/x-icon">
        <script src="frontoffice/JS/FrontOfficeJS.js"></script>
        <meta charset="UTF-8">
    </head>
    <body loading="lazy">
        <div class="HeaderSection">
            <div class="HL1">
                <div class="HL2">
                    <div class="HB1"></div>
                    <div class="HB2">
                        <img src="frontoffice/assets/logo.png" loading="lazy">
                        <div id="loginincontent">
                            <p id="loggeduser">Welkom <u>Erik</u></p> 
                            <!-- SELECT gebruikersnaam FROM gebruikers WHERE user_id == $_SESSION["loggedInUserId"] -->
                            <div id="uitlogknop"><p>Uitloggen</p></div>
                        </div>
                    </div>
                    <div class="HB3"></div>
                </div>
            </div>
        </div>
        <div class="ContentSection">
            <div class="MaxContentArea">

                <div class="BeautyBox">
                        <div class= "DraaiGebied">
                        <img id="Schijf" src="frontoffice/assets/draaischijf.png" onclick="draaiDeSchijf()" loading="lazy">
                        <img id="Hoes" src="frontoffice/assets/Schijfhoes.png" onclick="draaiDeSchijf()" loading="lazy">
                    </div>
                    <div class="Data">
                        <form>
                            <p class="SchijfInfo">
                                Welkom op deze pagina. Hier kunt u uw melding of compliment achterlaten voor Breman. Draai aan de draaischijf om het kritiek aan te geven.<br><br><span style="color:lime;">Groen:</span> <span id="GreenINFOtext" style="color:lime;">Een compliment of opmerking</span>
                                <br><span style="color:gold;">Oranje:</span> <span id="OrangeINFOtext">De situatie vereist spoedig behandeling </span><br><span style="color:red;">Rood:</span> <span id="RedINFOtext">De situatie is kritiek
                            </p>
                            <textarea name="probleeminfo" id="probleeminfo" placeholder="Draai aan de draaischijf om uw situatie te selecteren"></textarea>
                            <input type="submit" id="StuurKnop" name="StuurKnop" value="Stuur" class="StuurKnop" onclick="return confirm('Weet je zeker dat je dit bericht wilt versturen?');">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="FooterSection">
            <div class="FL1">
                <div class="FL2">
                    <p id="footertext">© Copyright - Team OEKD - 2023 ©</p>
                </div>
            </div>
    </body>
</html>