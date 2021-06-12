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
                unlink("../images/slider/thumbnail/" . $image);
                header("location: index.php?p=slideshow");
                break;

        
       
       
       
       
            case "2":
                $sh_id = $_GET['id'];
                $rows = dbSelect('tb_slideshow','*', "sh_id = $sh_id", "");
                $active = 0;
                foreach($rows as $row){
                    $active = $row['active'];
                }
                if($active == 0)
                {
                    $active = 1;
                }
                else {
                    $active = 0;
                }
                dbUpdate("tb_slideshow", $data=['active' => $active], "sh_id = $sh_id");
                header("location: index.php?p=slideshow");
            
            }
    }



    $rows = dbSelect("tb_slideshow","*","", "order by sh_order asc");
    
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- < DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product list</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="index.php?p=productform" type="button" class="btn btn-primary"
                    style="float:right;color:white; margin:1rem 0">Add new
                    Product</a>
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
                            <td><img src="../images/slider/thumbnail/<?=$row['image']?>" style="width:75px"></td>
                            <td><?=$row['title']?></td>
                            <td style="max-width:200px;"><?=$row['subtitle']?></td>
                            <td><?=$row['text']?></td>
                            <td><?=$row['link']?></td>
                            <td class="table-action" style="height:100px">
                                <a href=""><i class="fas fa-arrow-up"></i></a>
                                <a href=""><i class="fas fa-arrow-down"></i></a>
                                <a href="?p=slideshow&action=2&id=<?=$row['sh_id']?>"><i
                                        class=" <?php echo($row['active'] == 1 ) ? "fas fa-eye": "fas fa-eye-slash"?> "></i></a>
                                <a href="index.php?p=slideshowform&action=1&id=<?=$row['sh_id']?>"><i
                                        class="far fa-edit"></i></a>
                                <!-- <a href="?p=slideshow&action=0&id=<?=$row['sh_id']?>"><i
                                        class="far fa-trash-alt"></i></a> -->

                                <!-- Modal -->
                                <!-- Button trigger modal -->

                                <a style="cursor:pointer; color:blue" data-toggle="modal"
                                    data-target="#slideshow<?=$row['sh_id']?>">
                                    <i class="far fa-trash-alt"></i>
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="slideshow<?=$row['sh_id']?>" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Do you want to delete this prodcut?
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a class="btn btn-primary"
                                                    href="?p=slideshow&action=0&id=<?=$row['sh_id']?>">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


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