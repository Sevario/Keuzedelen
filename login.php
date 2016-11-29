<?php
    session_start(); 
    if (isset($_POST['submit'], $_POST['email'], $_POST['password'])) 
        {
            try
                {
                    $email      = $_POST['email'];
                    $password   = $_POST['password'];

                    $dbhost     = "92.222.169.67";
                    $dbname     = "Keuzedelen";
                    $dbuser     = "root";
                    $dbpass     = "garage";

                    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = "SELECT * FROM User WHERE `username` = :email AND `password` = :password ";

                    $stmt = $conn->prepare($sql); 
                    $stmt->execute(array(':email' => $_POST['email'], ':password'=> $_POST['password']));

                    $num=$stmt->rowCount();
                    if($num > 0)
                        {
                            header("location:dashboard.php");
                        }
                    else
                        {
                            header("location:index.html");
                        }

                }
            catch (Exception $e) 
                {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
        }
?>