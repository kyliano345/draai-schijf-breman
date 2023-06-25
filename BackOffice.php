<script>
    function getCookie(cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for(let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
            c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
            }
        }
    }

    function changefilter(selFil) {
        if (document.getElementById(selFil).style.backgroundColor != "red") {
            document.getElementById(selFil).style.backgroundColor = "red";
        }
        else {
            document.getElementById(selFil).style.backgroundColor = "green";
        }

        

        let cookiewaarde = getCookie(selFil);

        if (cookiewaarde == 1) {
            document.cookie = selFil + "=" + 0 + ";" + "max-age=" + 3600; //40 min
        }
        else {
            document.cookie = selFil + "=" + 1 + ";" + "max-age=" + 3600; //40 min
        }
    }
</script>

<?php 
    require_once ',DevFiles/dataCon.php';

    session_start();

    if (!isset($_SESSION['LIUB'])) {
        if (isset($_SESSION['LIUK'])) {
            header("Location: http://localhost/.projects/Github/draai-schijf-breman/FrontOffice.php");
        }
        else {
            header("Location: http://localhost/.projects/Github/draai-schijf-breman/LoginKlant.php");
        }
    }
    else if (isset($_SESSION['LIUB'])) {
        if (isset($_SESSION['LIUK'])) {
            
            header("Location: http://localhost/.projects/Github/draai-schijf-breman/LoginKlant.php");
            unset($_SESSION['LIUK']);
            unset($_SESSION['LIUB']);

        }
    }

    if (isset($_POST['logout-button'])) {
        unset($_SESSION['LIUK']);
        unset($_SESSION['LIUB']);
        header("Location: http://localhost/.projects/Github/draai-schijf-breman/LoginBehandelaar.php");
    }

    if (!isset($_COOKIE["f1"])) {
        setcookie("f1", 0);
    }
    if (!isset($_COOKIE["f2"])) {
        setcookie("f2", 0);
    }
    if (!isset($_COOKIE["f3"])) {
        setcookie("f3", 0);
    }
    if (!isset($_COOKIE["f4"])) {
        setcookie("f4", 0);
    }
    if (!isset($_COOKIE["f5"])) {
        setcookie("f5", 0);
    }
    if (!isset($_COOKIE["f6"])) {
        setcookie("f6", 0);
    }
    if (!isset($_COOKIE["f7"])) {
        setcookie("f7", 0);
    }
    if (!isset($_COOKIE["f8"])) {
        setcookie("f8", 0);
    }
    if (!isset($_COOKIE["f9"])) {
        setcookie("f9", 0);
    }
    if (!isset($_COOKIE["f10"])) {
        setcookie("f10", 0);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="backoffice/css/BackOfficeCSS.css">
        <title>Breman - BackOffice</title>
        <link rel="icon" href="backoffice/assets/img/icon.png" type="image/x-icon">
        <script src="backoffice/JS/BackOfficeJS.js"></script>
        <meta charset="UTF-8">
    </head>
    <body>
        <div class="headersection">
            <img src="backoffice/assets/img/logo.png"/>
            <?php 

                    $sql = "SELECT * FROM melding;";
                    $amountresult = mysqli_query($conn, $sql);


                    $resultCheck = mysqli_num_rows($amountresult);
                
                    $sqlGREEN = "SELECT * FROM melding WHERE melding_color='1';";
                    $sqlORANGE = "SELECT * FROM melding WHERE melding_color='2';";
                    $sqlRED = "SELECT * FROM melding WHERE melding_color='3';";
                    $sqlCLOSED = "SELECT * FROM melding WHERE melding_status='4';";

                    $resultGREEN = mysqli_query($conn, $sqlGREEN);
                    $resultORANGE = mysqli_query($conn, $sqlORANGE);
                    $resultRED = mysqli_query($conn, $sqlRED);
                    $resultCLOSED = mysqli_query($conn, $sqlCLOSED);

                    $resultCheckGREEN = mysqli_num_rows($resultGREEN);
                    $resultCheckORANGE = mysqli_num_rows($resultORANGE);
                    $resultCheckRED = mysqli_num_rows($resultRED);
                    $resultCheckCLOSED = mysqli_num_rows($resultCLOSED);
                    
                
                ?>

                <table class="casesamount">
                    <tr>
                        <td class="TG">Groen</td>
                        <td class="TO">Oranje</td>
                        <td class="TR">Rood</td>
                        <td class="TC">Gesloten</td>
                    </tr>
                    <tr>
                        <td class="TG"><?php echo $resultCheckGREEN; ?></td>
                        <td class="TO"><?php echo $resultCheckORANGE; ?></td>
                        <td class="TR"><?php echo $resultCheckRED; ?></td>
                        <td class="TC"><?php echo $resultCheckCLOSED; ?></td>
                    </tr>
                </table>


            <div id="loginincontent">
                <?php
                    $LIU = $_SESSION['LIUB'];
                    $accountquery = array("SELECT voornaam FROM behandelaar WHERE behandelaar_id=", $LIU, ";");
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
        <div class="headermargin">

        </div>
        <div class="contentsection">
            <div class="filtersection">
                <p class="filter-H-text">Meldingen</p>
                <div class="filterrow" onclick="changefilter('f1')">
                    <div class="filterbox">
                        <div class="filterboxindicator" id="f1"></div>
                    </div>
                    <p class="filter-I-text">Noodgeval (Rood)</p>
                </div>
                
                <div class="filterrow" onclick="changefilter('f2')">
                    <div class="filterbox">
                        <div class="filterboxindicator" id="f2"></div>
                    </div>
                    <p class="filter-I-text">Incident (Geel)</p>
                </div>
                
                <div class="filterrow" onclick="changefilter('f3')">
                    <div class="filterbox">
                        <div class="filterboxindicator" id="f3"></div>
                    </div>
                    <p class="filter-I-text">Compliment/Opmerking (Groen)</p>
                </div>

                <p class="filter-H-text">Status</p>
                
                <div class="filterrow" onclick="changefilter('f4')">
                    <div class="filterbox">
                        <div class="filterboxindicator" id="f4"></div>
                    </div>
                    <p class="filter-I-text">Open</p>
                </div>
                
                <div class="filterrow" onclick="changefilter('f5')">
                    <div class="filterbox">
                        <div class="filterboxindicator" id="f5"></div>
                    </div>
                    <p class="filter-I-text">In Behandeling</p>
                </div>
                
                <div class="filterrow" onclick="changefilter('f6')">
                    <div class="filterbox">
                        <div class="filterboxindicator" id="f6"></div>
                    </div>
                    <p class="filter-I-text">In de wacht</p>
                </div>

                <div class="filterrow" onclick="changefilter('f7')">
                    <div class="filterbox">
                        <div class="filterboxindicator" id="f7"></div>
                    </div>
                    <p class="filter-I-text">Afgehandeld/Gesloten</p>
                </div>
                

                <p class="filter-H-text">Project</p>
                
                <div class="filterrow" onclick="changefilter('f8')">
                    <div class="filterbox">
                        <div class="filterboxindicator" id="f8"></div>
                    </div>
                    <p class="filter-I-text">Leeuwarden - Cammingaburen</p>
                </div>
                
                <div class="filterrow" onclick="changefilter('f9')">
                    <div class="filterbox">
                        <div class="filterboxindicator" id="f9"></div>
                    </div>
                    <p class="filter-I-text">Groningen - Stationplein</p>
                </div>
                
                <div class="filterrow" onclick="changefilter('f10')">
                    <div class="filterbox">
                        <div class="filterboxindicator" id="f10"></div>
                    </div>
                    <p class="filter-I-text">Zwolle - Industrieterrein</p>
                </div>
            </div>


            <div class="casesection">
                <div id="onetimemargin"></div>
            
                <?php 

                    $sqlquery = "SELECT * FROM melding WHERE ";
                    $sqloptions1 = array();
                    $sqloptions2 = array();

                    if (isset($_COOKIE["f1"])) {
                        $fil1 = $_COOKIE["f1"];
                        if ($fil1 == 0) {
                            array_push($sqloptions1, "melding_color='3'");
                        }
                    }
                    if (isset($_COOKIE["f2"])) {
                        $fil2 = $_COOKIE["f2"];
                        if ($fil2 == 0) {
                            array_push($sqloptions1, "melding_color='2'");
                        }
                    }
                    if (isset($_COOKIE["f3"])) {
                        $fil3 = $_COOKIE["f3"];
                        if ($fil3 == 0) {
                            array_push($sqloptions1, "melding_color='1'");
                        }
                    }
                    if (isset($_COOKIE["f4"])) {
                        $fil4 = $_COOKIE["f4"];
                        if ($fil4 == 0) {
                            array_push($sqloptions2, "melding_status='1'");
                        }
                    }
                    if (isset($_COOKIE["f5"])) {
                        $fil5 = $_COOKIE["f5"];
                        if ($fil5 == 0) {
                            array_push($sqloptions2, "melding_status='2'");
                        }
                    }
                    if (isset($_COOKIE["f6"])) {
                        $fil6 = $_COOKIE["f6"];
                        if ($fil6 == 0) {
                            array_push($sqloptions2, "melding_status='3'");
                        }
                    }
                    if (isset($_COOKIE["f7"])) {
                        $fil7 = $_COOKIE["f7"];
                        if ($fil7 == 0) {
                            array_push($sqloptions2, "melding_status='4'");
                        }
                    }                                      

                    $sqlend = "ORDER BY melding_color DESC;";

                    $sqloptions1 = implode(" OR ", $sqloptions1);
                    $sqloptions2 = implode(" OR ", $sqloptions2);
                    $alloptionsarray = array($sqloptions1, $sqloptions2);
                    $totaloptions = implode (" AND ", $alloptionsarray);
                    
                    $sqlgathering = array($sqlquery, $totaloptions, $sqlend);
                    $sql = implode("", $sqlgathering);

                    // echo $sql;

                    $result = mysqli_query($conn, $sql);

                    
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck <= 0) {

                        echo "Geen resultaten gevonden";
                        
                    }
                    else {
                        while ($row = mysqli_fetch_assoc($result)) {
                            
                            $caseid = $row['melding_K_id'];
                            $accountquery = array("SELECT voornaam, achternaam, postcode, huisnummer FROM klant WHERE klant_id=", $caseid, ";");
                            $accountsql = implode("", $accountquery);
                            $accountresult = mysqli_query($conn, $accountsql);
                            $accountrow = mysqli_fetch_assoc($accountresult);
                    ?>

                <div class="casebar">
                    <div class="barbox colorboxsection">
                        <div class="colorbox <?php if($row['melding_color'] == 1) { echo 'greenBGcolor';}; if($row['melding_color'] == 2) { echo 'orangeBGcolor';}; if($row['melding_color'] == 3) { echo 'redBGcolor';};?>"></div>
                    </div>
                    <div class="barbox casenumber">
                        <p class="casenumberp"><?php echo $row['melding_id'];?></p>
                    </div>
                    <div class="barbox casestatus">
                        <p class="casestatusp"><?php if ($row['melding_status'] == "1") { echo "Open"; }; if ($row['melding_status'] == "2") { echo "Behandeling"; }; if ($row['melding_status'] == "3") { echo "i.d. wacht"; }; if ($row['melding_status'] == "4") { echo "Gesloten"; }; ?></p>
                    </div>
                    <div class="barbox caseinfo">
                        <p><?php echo $accountrow['voornaam'] ." " .$accountrow['achternaam']; ?></p>
                        <p><?php echo $accountrow['postcode'] ?></p>
                        <p><?php echo $accountrow['huisnummer'] ?></p>
                        <p><?php echo $row['melding_date'];?></p>
                        <p><?php echo $row['melding_message'];?></p>
                    </div>
                    <div class="barbox open">
                        <img src="backoffice/assets/img/open.png"/>
                    </div>
                    <div class="filler"></div>
                </div>
                            

                    <?php
                        };
                    };
                    ?>

                <div id="onetimemargin"></div>
            </div>



        </div>
    </body>
</html>



<script>

    function checkLoadFilterColor(amountoffilters) {
        
        for (let i = 1; i <= amountoffilters; i++) {

            var filter = "f" + i;
            let cookiewaarde = getCookie("f" + i);
            console.log(filter);
            console.log(cookiewaarde);

            if (cookiewaarde == 1) {
                console.log(filter);
                document.getElementById(filter).style.backgroundColor = "red";
            }
            else {
                document.getElementById(filter).style.backgroundColor = "green";
            }
        }
    }

    checkLoadFilterColor(10);
</script>