<?php
    include('../includes/db.php');
    function isValid()
    {    
        session_start();
        if(!(isset($_SESSION['isValid']) && $_SESSION['isValid'] == true))
        {       
               if(isset($_COOKIE['username']))
               {
    
                   $username = cleanInput($_COOKIE['username']);
                   $password = cleanInput($_COOKIE['pw']);
                   $criteria = "username='" . $username ."' and password= '" . ($password) ."'";
                   $rnum = dbCount("tb_login", $criteria);
                   if($rnum > 0)
                   {   
                       
                       $_SESSION['isValid'] = true;
                       $_SESSION['username'] = $username;

                    }
                    else 
                    {
                        header("location: ../signin.php");
                        exit();
                    }
                }
                else 
                {
                    header("location: ../signin.php");
                    
                }
        }
        
    }  
?>