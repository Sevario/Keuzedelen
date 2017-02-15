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

                    $sql = "SELECT * FROM User WHERE `username` = :email AND `password` = PASSWORD(:password) ";

                    $stmt = $conn->prepare($sql);   
                    $stmt->execute(array('email' => $_POST['email'], 'password'=> $_POST['password']));

                    $num=$stmt->rowCount();
                    if($num > 0)
                        {
                            $_SESSION ['login_user'] = $_POST ['email'];
                            header("location:dashboard.php");
                        }
                    else
                        {
                            header("location:index.php?login=false");
                        }

//                        $password = $_POST['password'];
//                        $b = password_verify($_POST['password'], HIER KOMT DE HASH );

                          //  if($b == TRUE)
                            //{

                            //}


                }
            catch (Exception $e) 
                {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
        }
?>