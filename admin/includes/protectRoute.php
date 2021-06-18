<?php
    ob_start();  
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

    function image_resize($file_name, $width, $height, $crop=FALSE) {
        echo 'hi';
        list($wid, $ht) = getimagesize($file_name);
        $r = $wid / $ht;
        if ($crop) {
        if ($wid > $ht) {
        $wid = ceil($wid-($width*abs($r-$width/$height)));
        } else {
        $ht = ceil($ht-($ht*abs($r-$w/$h)));
        }
        $new_width = $width;
        $new_height = $height;
        } else {
        if ($width/$height > $r) {
        $new_width = $height*$r;
        $new_height = $height;
        } else {
        $new_height = $width/$r;
        $new_width = $width;
        }
        }
        // $source = imagecreatefromjpeg($file_name);
        $source = imagecreatefrompng($file_name);
        $dst = imagecolortransparent($new_width, $new_height);
        // $dst = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($dst, $source, 0, 0, 0, 0, $new_width, $new_height, $wid, $ht);
        return $dst;
        }

        
    function image_resizeJPG($file_name, $width, $height, $crop=FALSE) {
        echo 'hi';
        list($wid, $ht) = getimagesize($file_name);
        $r = $wid / $ht;
        if ($crop) {
        if ($wid > $ht) {
        $wid = ceil($wid-($width*abs($r-$width/$height)));
        } else {
        $ht = ceil($ht-($ht*abs($r-$w/$h)));
        }
        $new_width = $width;
        $new_height = $height;
        } else {
        if ($width/$height > $r) {
        $new_width = $height*$r;
        $new_height = $height;
        } else {
        $new_height = $width/$r;
        $new_width = $width;
        }
        }
        $source = imagecreatefromjpeg($file_name);
     
        $dst = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($dst, $source, 0, 0, 0, 0, $new_width, $new_height, $wid, $ht);
        return $dst;
        }
?>