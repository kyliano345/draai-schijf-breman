<?php 
    require_once ',DevFiles/dataCon.php';

    session_start();

    if(isset($_POST["registeren"])) {
        $voornaaminput = $_POST['voornaam'];
        $achternaaminput = $_POST['achternaam'];
        $emailadresinput = $_POST['emailadres']; //array('"', $_POST['emailadres'], '"'); //EmailAdressInputField
        // $emailadresinput = implode("", $eaif);
        $wachtwoordinput = $_POST['password'];
        $behandelaarscode = $_POST['behandelaarscode'];


        $checkusernamequery = "SELECT voornaam, emailadres FROM behandelaar";
        $usernameresult = mysqli_query($conn, $checkusernamequery);
        while ($usernamedata = mysqli_fetch_assoc($usernameresult)) {
            if ($usernamedata["voornaam"] == $voornaaminput) {
                $unvalidregister = true;
                echo "ERROR. Voornaam al ingebruik";
                break;
            }
            else if ($usernamedata["emailadres"] == $emailadresinput) {
                $unvalidregister = true;
                echo "ERROR. Emailadres al ingebruik";
                break;
            }
        }

        if (!isset($unvalidregister)) {

            $newemployeequery = array("INSERT INTO behandelaar (voornaam, achternaam, emailadres, wachtwoord)
            VALUES ('", $voornaaminput, "',",
            "'", $achternaaminput, "',",
            "'", $emailadresinput, "',",
            "'", $wachtwoordinput, "'", ");");
            $newemployeesql = implode("", $newemployeequery);
            // echo $newemployeesql;
            mysqli_query($conn, $newemployeesql);
            header("Location: http://localhost/.projects/Github/draai-schijf-breman/LoginBehandelaar.php");
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="registeren/css/RegisterenCSS.css">
        <title>Breman - Behandelaar Registeren</title>
        <link rel="icon" href="registeren/assets/img/icon.png" type="image/x-icon">
        <script src="registeren/JS/RegisterenJS.js"></script>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="headersection">
            <div class="Header">
                <div class="HL1">
                    <div class="HL2">
                        <div class="HB1"></div>
                        <div class="HB2">
                            <img src="registeren/assets/img/logo.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <br>


        <div class="contentmargin"></div>
        <div class="contentsection">
            <div class="registersection">
                <p>Welkom op de behandelaar registratie pagina. Maar hier je BackOffice account aan.</p>
                <div class="switchregisterbutton" onclick="goToKRegister();"><p>Klant Registratie</p></div>
                <form method="post">
                    <input placeholder="Voornaam" type="text" name="voornaam" maxlength="20" required/>
                    <input placeholder="Achternaam" type="text" name="achternaam" maxlength="30" required/>
                    <input placeholder="E-mailadres" type="email" name="emailadres" maxlength="50" required/>
                    <input placeholder="Wachtwoord" type="password" name="password" maxlength="20" required/>
                    <input placeholder="Behandelaarscode" type="password" name="behandelaarscode" maxlength="10" required/>
                    <input type="submit" name="registeren" value="Registeren" id="butnhover"/>
                </form>
            </div>
        </div>
    </body>
</html>