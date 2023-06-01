<?php 
  // require_once 'include/dbh.inc.php';

?>

<!DOCTYPE html>
<html>
<body>
         <form name="registreren" method="post"
              enctype="multipart/form-data" action="include/dbh.send.php">
            <p>registeren</p>
            <input placeholder="naam" type="text" name="naam"/>
            <br>
            <input placeholder="wachtwoord" type="password" name="wachtwoord"/>
            <br>
            <input placeholder="postcode" type="text" name="postcode"/> 
             <br><br>
            <input type="submit" name="submit" value="submit"/>
         
        </form>
        
   
</body>
</html>