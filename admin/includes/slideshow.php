<?php
    include_once "../includes/db.php";
    if(isset($_GET['action']))
    {
        $action=$_GET['action'];
      
        switch($action)
        {
            case "0":
                $sh_id = $_GET['id'];
                echo $sh_id;
                $rows = dbSelect('tb_slideshow',"*","sh_id= $sh_id","");
                echo"hi";
                foreach($rows as $row)
                {
                   
                    $image = $row['image'];
                   
                }
            
                dbDelete('tb_slideshow',"sh_id=$sh_id");
                unlink("../images/slider/" . $image);
                
                header("location: index.php?p=slideshow");
                break;
        }
    }



    $rows = dbSelect("tb_slideshow","*","", "order by sh_order asc");
    
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- < DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <button type="button" class="btn btn-primary" style="float:right; margin:1rem 0">Add new
                    slideshow</button>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Text</th>
                            <th>Link</th>
                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $i=1;
                            foreach($rows as $row)
                            {
                        ?>
                        <tr>
                            <td><?=$i?></td>
                            <td><img src="../images/slider/<?=$row['image']?>" style="width:150px"></td>
                            <td><?=$row['title']?></td>
                            <td style="max-width:200px;"><?=$row['subtitle']?></td>
                            <td><?=$row['text']?></td>
                            <td><?=$row['link']?></td>
                            <td class="table-action">
                                <a href=""><i class="fas fa-arrow-up"></i></a>
                                <a href=""><i class="fas fa-arrow-down"></i></a>
                                <a href=""><i
                                        class=" <?php echo($row['active'] ==1 ) ? "fas fa-eye": "fas fa-eye-slash"?> "></i></a>
                                <a href=""><i class="far fa-edit"></i></a>
                                <a href="?p=slideshow&action=0&id=<?=$row['sh_id']?>"><i
                                        class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>

                        <?php
                        $i++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->