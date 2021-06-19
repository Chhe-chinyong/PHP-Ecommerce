<?php
    $title = "";
    $price = "";
    $description = "";
    $link = "";
    $quantity = "";
    $discount = "";
    $endisble = 0;
    $but = 'submit';
    $action = 5;
    $imagerequired = 1;
    if((isset($_GET['action']) && $_GET['action'] == '5'))
    {
        $title = $_POST['txt_title'];
        $price = $_POST['txt_price'];
        $description = $_POST['txt_description'];
        // $link = $_POST['txt_link'];
        $quantity = $_POST['txt_quantity'];
        $discount = $_POST['txt_discount'];
        $endisble = 0;
        
        
        if(isset($_POST['chk_endisable']))
        {
            $endisble = 1;
        }
        $filename = $_FILES['image']['tmp_name'];
        // if(isset($_FILES['image'])){
            // $filename = $_FILES['image']['tmp_name'];
            echo 'hi';

        
        $rows = dbSelect('tb_product', "*", "", "order by sh_order desc limit 1");
        $row = mysqli_fetch_assoc($rows);
        $order = $row['sh_order'] + 1;
        $image_name = time() . uniqid(rand()) . ".jpg";
        $image_path = "../images/product/product/" . $image_name;
        echo 'jol';
        if(move_uploaded_file($filename, $image_path))
        {
            echo 'jol';
            $image_thumbnail = image_resizeJPG($image_path, 600, 600);
            imagejpeg($image_thumbnail, "../images/product/product/" . $image_name);
            $data = ['pro_price' => $price , 'pro_discount' => $discount, 'pro_quantity' => $quantity,'pro_des' => $description  , 'pro_img' => $image_name , 'pro_title'=> $title,  'active' => $endisble, 'sh_order' => $order];
            dbInsert('tb_product', $data);
            header('location: index.php?p=product');
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
            $image_thumbnail = image_resizeJPG($image_path, 100, 100);
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


<form class="container" action="index.php?p=productform&action=<?=$action?>" enctype="multipart/form-data"
    method="POST">
    <div class="form-group">
        <h2>Product</h2>
        <input type="text" name="txt_title" class="form-control" value="<?=$title?>" id="exampleInputEmail1"
            placeholder="Product Title" required>
    </div>
    <div class="form-group">

        <input type="number" name="txt_price" class="form-control" id="exampleInputPassword1" placeholder="Price" min=0
            value="<?=$price?>" required>
    </div>
    <div class="form-group">

        <input type="number" name="txt_quantity" class="form-control" id="exampleInputPassword1" placeholder="Quantity"
            min=1 value="<?=$quantity?>" required>
    </div>
    <div class="form-group">

        <input type="number" name="txt_discount" class="form-control" id="exampleInputPassword1" placeholder="discount"
            min=0 value="<?=$discount?>" required>
    </div>
    <div class="form-group">

        <textarea class="form-control" name="txt_description" id="exampleFormControlTextarea1" rows="3"
            placeholder="Description" required> <?=$description?></textarea>
    </div>
    <!-- <div class="form-group">
        <input type="text" class="form-control" name="txt_toptitle" id="exampleInputPassword1" placeholder="TopTitle"
            required value="<?=$toptitle?>">
    </div> -->
    <div class="form-group">

        <input type="text" class="form-control" value="<?=$link?>" name="txt_link" id="exampleInputPassword1"
            placeholder="link" required>
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" <?php echo ($endisble==0) ? '': 'checked'?> id="exampleCheck1"
            name="chk_endisable">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <div class="form-group">

        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1"
            <?php if($imagerequired == 1) {echo "required = 'required'";}?> />
    </div>
    <button type="submit" class="btn btn-primary"><?=$but?></button>
    <button type="reset" class="btn btn-primary" value="clear">Cancel</button>
</form>