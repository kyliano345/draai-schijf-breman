<?php 
    require_once ',DevFiles/dataCon.php';

    session_start();

    if (!isset($_SESSION['LIUK'])) {
        if (isset($_SESSION['LIUB'])) {
            header("Location: http://localhost/.projects/Github/draai-schijf-breman/BackOffice.php");
        }
        else {
            header("Location: http://localhost/.projects/Github/draai-schijf-breman/LoginKlant.php");
        }
    }
    else if (isset($_SESSION['LIUK'])) {
        if (isset($_SESSION['LIUB'])) {
            
            header("Location: http://localhost/.projects/Github/draai-schijf-breman/LoginBehandelaar.php");
            unset($_SESSION['LIUK']);
            unset($_SESSION['LIUB']);

        }
    }
    

    if (isset($_POST['logout-button'])) {
        unset($_SESSION['LIUK']);
        unset($_SESSION['LIUB']);
        header("Location: http://localhost/.projects/Github/draai-schijf-breman/LoginKlant.php");
    }
?>

<?php 

    if(isset($_POST["StuurKnop"])) {
        
        $casecolor = $_COOKIE["DS-Color"];
        $casemessage = $_POST["probleeminfo"];
        $LIUK = $_SESSION['LIUK'];
        
        $date = new DateTime("now");
        $dateformat = '%d-%m-%Y';
        $timeformat = '%H:%M:%S';
        $casedate = strftime($dateformat, $date->getTimestamp());
        $casetime = strftime($timeformat, $date->getTimestamp());

        $newcasequery = array("INSERT INTO melding (melding_color, melding_K_id, melding_date, melding_time, melding_message) VALUES ('",
        $casecolor, "','",
        $LIUK, "','",
        $casedate, "','",
        $casetime, "','",
        $casemessage, "'", ");");
        $newcasesql = implode("", $newcasequery);
        // echo $newcasesql;
        mysqli_query($conn, $newcasesql);
    };    

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
                            <?php
                                $LIU = $_SESSION['LIUK'];
                                $accountquery = array("SELECT voornaam FROM klant WHERE klant_id=", $LIU, ";");
                                $accountsql = implode("", $accountquery);
                                $accountresult = mysqli_query($conn, $accountsql);
                                $accountrow = mysqli_fetch_assoc($accountresult);
                            ?>
                            <p id="loggeduser">Welkom&nbsp<u><?php echo $accountrow['voornaam']; ?></u></p> 
                            <form method="post">
                                <input type="submit" id="uitlogknop" name="logout-button" value="Uitloggen"/>
                            </form>
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
                        <form method="POST">
                            <p class="SchijfInfo">
                                Welkom op deze pagina. Hier kunt u uw melding of compliment achterlaten voor Breman. Draai aan de draaischijf om het kritiek aan te geven.<br><br><span style="color:lime;">Groen:</span> <span id="GreenINFOtext" style="color:lime;">Een compliment of opmerking</span>
                                <br><span style="color:gold;">Oranje:</span> <span id="OrangeINFOtext">De situatie vereist behandeling </span><br><span style="color:red;">Rood:</span> <span id="RedINFOtext">De situatie is kritiek
                            </p>
                            <textarea name="probleeminfo" id="probleeminfo" placeholder="Draai aan de draaischijf om uw situatie te selecteren" maxlength="400"></textarea>
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