<?php
    include('session.php');
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: index.php");
    }
    if ($user_permissions != 3) { //if not admin, redirect to login page.
        header ("Location: index.php");
    }
    ?>

<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" type="text/css" href="/keuzedelen/bootstrap/css/bootstrap.min.css"  />
        <link rel="stylesheet" type="text/css" href="/keuzedelen/style.css" media="screen" />
        <script src="js/jquery.js"></script>
        <script src="js/changes.js"></script>
        <title>Dashboard</title>
</head>
<body>

    <div id="profile">
        <b id="welcome">Welcome : <i><?php echo $login_session?></i></b> <?php  if ($user_permissions == "1") {echo $opleiding_naam;} ?>
    </div>
    <div id="menu">
        <ul>
            <li><a href="account.php">Account</a></li>
            <?php
            if ($user_permissions == 3) {
            echo "<li><a href='beheer.php' class='selected'>Beheer</a></li>";
            }
            ?>
            <li><a href="logout.php">Log Out</a></li>
            <br>
            <div id="myProgress">
                <div id="myBar">
                    <div id="label">1/3</div>
                </div>
            </div>
        </ul>

    </div>
    <div id="geheel">
        <div  class="beheer_keuzedelen">
           <h2 class="beheerding_keuzedelen">Keuzedelen</h2>
           <div class ="verdwijn_keuzedelen">
            <?php
            
            $resultgetkeuze = $conn->prepare("SELECT Name FROM Keuzedeel");
    
            $resultgetkeuze->execute();

            $rowkeuze = $resultgetkeuze->fetchall(PDO::FETCH_ASSOC);

            $arraykeuzen = $rowkeuze;

            
            echo "<select name='Keuzedelen' class='keuzedrop' id='sel_keuzedelen'>";
            foreach ($arraykeuzen as $row) {
            print_r($row['Name']); ?>
            <option value="<?php echo $row['Name']; ?>"><?php echo $row['Name']; ?></option>
            
            <?php
            }
            
            echo "</select> &nbsp; &nbsp;";
            echo "<a class='addkeuze btn btn-lg btn-default btnwidth'>Toevoegen</a>";
            ?>
               <div id="keuzes">

               </div>

           </div>
        </div>
        <div  class="beheer_studenten">
            <h2 class="beheerding_studenten">Studenten</h2>
            <div class ="verdwijn_studenten">
            <?php
            
            $resultgetkeuze2 = $conn->prepare("SELECT email FROM Student");
    
            $resultgetkeuze2->execute();

            $rowkeuze2 = $resultgetkeuze2->fetchall(PDO::FETCH_ASSOC);

            $arraykeuzen2 = $rowkeuze2;

            
            echo "<select name='Keuzedelen' class='keuzedrop' id='sel_studenten'>";
            foreach ($arraykeuzen2 as $row) {
            print_r($row['email']); ?>
            <option value="<?php echo $row['email']; ?>"><?php echo $row['email']; ?></option>
            <?php
            }
            
            echo "</select>"
            
            ?>
                <div id="beheerstudenten">

                </div>
           </div>
        </div>
        <div class="beheer_docenten">
            <h2 class="beheerding_docenten">Docenten</h2>
            <div class ="verdwijn_docenten">    
            <?php
            
            $resultgetkeuze3 = $conn->prepare("SELECT abbreviation FROM Docent");
    
            $resultgetkeuze3->execute();

            $rowkeuze3 = $resultgetkeuze3->fetchall(PDO::FETCH_ASSOC);

            $arraykeuzen3 = $rowkeuze3;

            
            echo "<select name='Keuzedelen' class='keuzedrop' id='sel_docenten'>";
            foreach ($arraykeuzen3 as $row) {
            print_r($row['abbreviation']); ?>
            <option value="<?php echo $row['abbreviation']; ?>"><?php echo $row['abbreviation']; ?></option>
            <?php
            }
            
            echo "</select>"
            
            ?>
                <div id="beheerdocenten">

                </div>
           </div>
        </div>
        <div class="beheer_opleiding">
            <h2 class="beheerding_opleiding">Opleidingen</h2>
            <div class ="verdwijn_opleiding">
            <?php
            
            $resultgetkeuze = $conn->prepare("SELECT Naam FROM Opleiding");
    
            $resultgetkeuze->execute();

            $rowkeuze = $resultgetkeuze->fetchall(PDO::FETCH_ASSOC);

            $arraykeuzen = $rowkeuze;

            
            echo "<select name='Keuzedelen' class='keuzedrop' id='sel_opleiding'>";
            foreach ($arraykeuzen as $row) {
            print_r($row['Naam']); ?>
            <option value="<?php echo $row['Naam']; ?>"><?php echo $row['Naam']; ?></option>
            <?php
            }
            
            echo "</select>"
            
            ?>
                <div id="beheeropleiding">

                </div>
           </div>
        </div>
        <div class="beheer_gebruikers">
            <h2 class="beheerding_gebruikers">Gebruikers</h2>
            <div class ="verdwijn_gebruikers">
            <?php
            
            $resultgetkeuze = $conn->prepare("SELECT username FROM User");
    
            $resultgetkeuze->execute();

            $rowkeuze = $resultgetkeuze->fetchall(PDO::FETCH_ASSOC);

            $arraykeuzen = $rowkeuze;

            
            echo "<select name='Keuzedelen' class='keuzedrop' id='sel_gebruikers'>";
            foreach ($arraykeuzen as $row) {
            print_r($row['username']); ?>
            <option value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></option>
            <?php
            }
            
            echo "</select>"
            
            ?>
                <div id="beheergebruikers">

                </div>
           </div>
        </div>
        <div class="beheer_lesgroepen">
            <h2 class="beheerding_lesgroepen">Lesgroepen</h2>
            <div class ="verdwijn_lesgroepen">
                <?php

                $resultgetkeuze = $conn->prepare("SELECT naam FROM Lesgroep");

                $resultgetkeuze->execute();

                $rowkeuze = $resultgetkeuze->fetchall(PDO::FETCH_ASSOC);

                $arraykeuzen = $rowkeuze;


                echo "<select name='Keuzedelen' class='keuzedrop' id='sel_lesgroepen'>";
                foreach ($arraykeuzen as $row) {
                    print_r($row['naam']); ?>
                    <option value="<?php echo $row['naam']; ?>"><?php echo $row['naam']; ?></option>
                    <?php
                }

                echo "</select>"

                ?>
                <div id="beheerlesgroepen">

                </div>
            </div>
        </div>
        
        
    </div>

       



</body>
<footer id="profile">
    &copy; ROCA12 Ede
</footer>
</html>