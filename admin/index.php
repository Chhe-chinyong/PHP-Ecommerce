<?php
ob_start();
include "./includes/protectRoute.php";
isValid();
include('includes/header.php'); 
include_once('includes/navbar.php'); 
?>
<!DOCTYPE html>

<!-- Begin Page Content -->
<?php
    $page= "includes/dashboard.php";
    if(isset($_GET["p"]))
    {
        $re_page =$_GET["p"];
        switch($re_page)
        {
            case "slideshow":
                $page = 'includes/slideshow.php';
                break;

                case "slideshowform":
                    $page = 'includes/slideshowform.php';
                    break;
                    case "product":
                        $page = 'includes/product.php';
                        break;
                    case "productform":
                        $page = 'includes/productform.php';
                        break;

                        case "logo":
                            $page = 'includes/logo.php';
                            break;
        }
    }

    include $page;

?>



<?php
include('includes/footer.php');
include('includes/scripts.php');
?>