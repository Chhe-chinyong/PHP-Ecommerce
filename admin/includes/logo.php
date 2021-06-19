<?php
    $logo_header = "";
    $link ="";
   
    $endisble = 0;
    $but = 'submit';
    $action = 5;
    $imagerequired = 1;
    if((isset($_GET['action']) && $_GET['action'] == '5'))
    {
        $logo_header = $_POST['txt_header'];
        $link = $_POST['txt_link'];
        
        $endisble = 0;
        
        
        if(isset($_POST['chk_endisable']))
        {
            $endisble = 1;
        }
        $filename = $_FILES['image']['tmp_name'];
        // if(isset($_FILES['image'])){
            // $filename = $_FILES['image']['tmp_name'];
            echo 'hi';

        
        $rows = dbSelect('tb_logo', "*", "", "");
        $row = mysqli_fetch_assoc($rows);
        // $order = $row['sh_order'] + 1;
        $image_name = time() . uniqid(rand()) . ".jpg";
        $image_path = "../images/logo/" . $image_name;
        echo 'jol';
        if(move_uploaded_file($filename, $image_path))
        {
            echo 'jol';
            $image_thumbnail = image_resize($image_path, 75,75);
            imagejpeg($image_thumbnail, "../images/logo/" . $image_name);
            $data = ['logo_header' => $logo_header , 'logo_link' => $link, 'logo_img' => $image_name];
            dbInsert('tb_logo', $data);
            header('location: index.php?p=logo');
        }
    }
   
    // Update
   else  if((isset($_GET['action']) && $_GET['action'] == '6'))
    {
        $id = $_GET['id'];
        $title = $_POST['txt_title'];
        $subtitle = $_POST['txt_subtitle'];
        $description = $_POST['txt_description'];
        $link = $_POST['txt_link'];
        // $toptitle = $_POST['txt_toptitle'];
        $endisble = 0;
        $image_name = "";
        if(isset($_POST['chk_endisable']))
        {
            $endisble = 1;
        }
        if (file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name']))
        {
        $filename = $_FILES['image']['tmp_name'];
       
        $rows = dbSelect('tb_slideshow', "*", "", "order by sh_order desc limit 1");
        $row = mysqli_fetch_assoc($rows);
        $order = $row['sh_order'] + 1;
        $image_name = time() . uniqid(rand()) . ".jpg";
        $image_path = "../images/slider/" . $image_name;
        $oldimgname = $row['image'];

        echo $oldimgname;
        if(move_uploaded_file($filename, $image_path))
        {
            echo 'jol';
            $image_thumbnail = image_resize($image_path, 75, 100);
            imagejpeg($image_thumbnail, "../images/slider/thumbnail/" . $image_name);
            unlink('../images/slider/thumbnail/' . $oldimgname);
            unlink('../images/slider/' . $oldimgname);
          
        }
        else {
            $error =1;
        }
    }
    $data = ['title' => $title , 'subtitle' => $subtitle, 'text' => $description , 'link' => $link , 'image' => $image_name , 'toptitle'=> $toptitle, 'active' => $endisble];

    if($image_name == "")
    {
        $data = ['title' => $title , 'subtitle' => $subtitle, 'text' => $description , 'link' => $link , 'toptitle'=> $toptitle,  'active' => $endisble];
    }

    dbUpdate('tb_slideshow', $data, "sh_id = $id");
    header('location: index.php?p=slideshow');


    }

    
    // Edit 
    else if((isset($_GET['action']) && $_GET['action'] == '1'))
    {
        
        $sh_id = $_GET['id'];
     
        $rows = dbSelect('tb_slideshow', "*", "sh_id= $sh_id", "");
        $row = mysqli_fetch_array($rows);
      
        $title = $row['title'];
    
        $subtitle = $row['subtitle'];
        $description = $row['text'];
        $link = $row['link'];
        $toptitle = $row['toptitle'];
        $endisble = $row['active'];
        $but = "Update";
        $imagerequired = 0;
        $action = "6&id=$sh_id";
    }

?>


<form class="container" action="index.php?p=logo&action=<?=$action?>" enctype="multipart/form-data" method="POST">

    <div class="form-group">

        <input type="text" class="form-control" value="<?=$logo_header?>" name="txt_header" id="exampleInputPassword1"
            placeholder="logo header">
    </div>

    <div class="form-group">

        <input type="text" class="form-control" value="<?=$link?>" name="txt_link" id="exampleInputPassword1"
            placeholder="link" required>
    </div>

    
    <div class="form-group">

        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1"
            <?php if($imagerequired == 1) {echo "required = 'required'";}?> />
    </div>
    <button type="submit" class="btn btn-primary"><?=$but?></button>
    <button type="reset" class="btn btn-primary" value="clear">Cancel</button>
</form>