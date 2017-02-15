<?php
include ('session.php');
//KEUZEBEHEER
if ($_GET['beheer'] == "keuzes") {
echo "
    <form action='toevoegsql.php' method='post'>
    <p>Naam:</p> <input type='text' name='naam'> <br>
    <p>Maximum Studenten:</p> <input type='text' name='maxstuds'> <br>
    <p>Minimum Studenten:</p> <input type='text' name='minstuds'> <br>
    <p>Informatie:</p> <input type='text' name='info'> <br>
    <p>Docent:</p>
    
    ";
            $resultgetkeuze3 = $conn->prepare('SELECT abbreviation FROM Docent');
    
            $resultgetkeuze3->execute();

            $rowkeuze3 = $resultgetkeuze3->fetchall(PDO::FETCH_ASSOC);

            $arraykeuzen3 = $rowkeuze3;

            
            echo "<select name='docent' class='blacktext' id='sel_docenten'>";
            foreach ($arraykeuzen3 as $row) {
            print_r($row['abbreviation']); ?>
            <option value="<?php echo $row['abbreviation']; ?>"><?php echo $row['abbreviation']; ?></option>
            <?php
            }
            
            
    echo "</select> <br>
 
    <p>K-Code:</p> <input type='text' name='kcode'> <br>
    <input class='blacktext' type='submit' value='Toevoegen'/>
    <input type='hidden' value='keuzedelen' name='checkding'/>
    
    
    
    </form>"; }
//STUDENTBEHEER
    if ($_GET['beheer'] == "student") {
    echo "
    <form action='toevoegsql.php' method='post'>
    <p>Email:</p> <input type='text' name='email'> <br>
    <p>Student Nummer:</p> <input type='text' name='studnr'> <br>
    <p>Opleiding:</p>
    
    ";
            $resultgetkeuze3 = $conn->prepare('SELECT Naam FROM Opleiding');
    
            $resultgetkeuze3->execute();

            $rowkeuze3 = $resultgetkeuze3->fetchall(PDO::FETCH_ASSOC);

            $arraykeuzen3 = $rowkeuze3;

            
            echo "<select name='opleiding' class='blacktext' id='sel_opleiding'>";
            foreach ($arraykeuzen3 as $row) {
            print_r($row['Naam']); ?>
            <option value="<?php echo $row['Naam']; ?>"><?php echo $row['Naam']; ?></option>
            <?php
            }
            
            
    echo "</select> <br>
 
    <input class='blacktext' type='submit' value='Toevoegen'/>
    <input type='hidden' value='student' name='checkding'/>
    
    
    
    </form>"; }
//DOCENTBEHEER
    if ($_GET['beheer'] == "docent") {
    echo "
    <form action='toevoegsql.php' method='post'>
    <p>Email:</p> <input type='text' name='email'> <br>
    <p>Afkorting</p> <input type='text' name='abbreviation'> <br>
    <p>Gebruiker:</p>
    
    ";
            $resultgetkeuze3 = $conn->prepare('SELECT username FROM User');
    
            $resultgetkeuze3->execute();

            $rowkeuze3 = $resultgetkeuze3->fetchall(PDO::FETCH_ASSOC);

            $arraykeuzen3 = $rowkeuze3;

            
            echo "<select name='user' class='blacktext'>";
            foreach ($arraykeuzen3 as $row) {
            print_r($row['username']); ?>
            <option value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></option>
            <?php
            }
            
            
    echo "</select> <br>
    <input class='blacktext' type='submit' value='Toevoegen'/>
    <input type='hidden' value='docent' name='checkding'/>
    
    
    
    </form>"; }
//OPLEIDINGBEHEER
    if ($_GET['beheer'] == "opleiding") {
    echo "
    <form action='toevoegsql.php' method='post'>
    <p>Opleiding Naam:</p> <input type='text' name='naam'> <br>
    <input class='blacktext' type='submit' value='Toevoegen'/>
    <input type='hidden' value='opleiding' name='checkding'/>
    
    
    
    </form>"; }
    
    
//OPLEIDINGBEHEER
    if ($_GET['beheer'] == "gebruiker") {
    echo "
    <form action='toevoegsql.php' method='post'>
    <p>Gebruiker:</p> <input type='text' name='user'> <br>
    <p>Wachtwoord:</p> <input type='text' name='password'> <br>
    <p>Permissies:</p> <select class='blacktext' name='permissions'>
    <option value='1'>Student</option>
    <option value='2'>Docent</option>
    </select>
    <br>
    <input class='blacktext' type='submit' value='Toevoegen'/>
    <input type='hidden' value='gebruiker' name='checkding'/>
    
    
    
    </form>"; }
    
    
//OPLEIDINGBEHEER
    if ($_GET['beheer'] == "lesgroep") {
    echo "
    <form action='toevoegsql.php' method='post'>
    <p>Naam:</p> <input type='text' name='naam'> <br>
    <p>Keuzedeel:</p>
    
    ";
            $resultgetkeuze3 = $conn->prepare('SELECT Name FROM Keuzedeel');
    
            $resultgetkeuze3->execute();

            $rowkeuze3 = $resultgetkeuze3->fetchall(PDO::FETCH_ASSOC);

            $arraykeuzen3 = $rowkeuze3;

            
            echo "<select name='keuzedeel' class='blacktext'>";
            foreach ($arraykeuzen3 as $row) {
            print_r($row['Name']); ?>
            <option value="<?php echo $row['Name']; ?>"><?php echo $row['Name']; ?></option>
            <?php
            }
            
            
    echo "</select> <br>
    <p>Docent:</p> 
    
    ";
            $resultgetkeuze4 = $conn->prepare('SELECT abbreviation FROM Docent');
    
            $resultgetkeuze4->execute();

            $rowkeuze4 = $resultgetkeuze4->fetchall(PDO::FETCH_ASSOC);

            $arraykeuzen4 = $rowkeuze4;

            
            echo "<select name='docent' class='blacktext'>";
            foreach ($arraykeuzen4 as $row) {
            print_r($row['abbreviation']); ?>
            <option value="<?php echo $row['abbreviation']; ?>"><?php echo $row['abbreviation']; ?></option>
            <?php
            }
            
            
    echo "</select> <br>
    <br>
    <input class='blacktext' type='submit' value='Toevoegen'/>
    <input type='hidden' value='lesgroep' name='checkding'/>
    
    
    
    </form>"; }




