<?php 
   require_once 'dbh.inc.php';
      if(isset($_POST["submit"])){
            $naam = htmlspecialchars($_POST['naam']);
            $wachtwoord = htmlspecialchars($_POST['wachtwoord']);
            $postcode = htmlspecialchars($_POST['postcode']);
            $status = 1;
            $query = "INSERT INTO gebruiker ( naam, wachtwoord, statusID, adress) VALUES ( '$naam', '$wachtwoord', '$status', '$postcode')";

            if ($conn->query($query) === TRUE) {
              echo "Data succesvol toegevoegd aan de database.";
             } else {
              echo "Fout bij het toevoegen van data: " . $conn->error;}
          
                
      } else echo "kon niet bij de database komen"
       



?>

