<?php
include ('session.php');
echo "
    <form>
    Naam: <input type='text' name='naam'> <br>
    Maximum Studenten: <input type='text' name='maxstuds'> <br>
    Minimum Studenten: <input type='text' name='minstuds'> <br>
    Informatie: <input type'text' name='info'> <br>
    Docent:
    
    ";
            $resultgetkeuze3 = $conn->prepare('SELECT abbreviation FROM Docent');
    
            $resultgetkeuze3->execute();

            $rowkeuze3 = $resultgetkeuze3->fetchall(PDO::FETCH_ASSOC);

            $arraykeuzen3 = $rowkeuze3;

            
            echo "<select name='Keuzedelen' class='keuzedrop' id='sel_docenten'>";
            foreach ($arraykeuzen3 as $row) {
            print_r($row['abbreviation']); ?>
            <option value="<?php echo $row['abbreviation']; ?>"><?php echo $row['abbreviation']; ?></option>
            <?php
            }
            
            
    echo "</select> <br>
 
    K-Code: <input type='text' name='kcode'> <br>
    
    
    
    
    </form>





";