<?php
   
    function isValid()
    {    
        session_start();
        if(!(isset($_SESSION['isValid']) && $_SESSION['isValid'] == true))
        {       
                header("location: ../signin.php");
                exit();
        }
    }
  
?>