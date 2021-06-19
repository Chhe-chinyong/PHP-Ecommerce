<?php
    include_once "../includes/db.php";
    $rows = dbSelect("tb_report","*","", "");
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- < DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Report</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Report Id</th>
                        <th>Product image</th>
                        <th>Product name</th>
                        <th>product price</th>
                        <th>product quantity</th>
                        <th>order_id</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $i=1;
                           
                            foreach($rows as $row)
                            {
                                
                        ?>
                        <tr>
                                
                            <td><?=$row['report_id']?></td>
                            <td><img src="../images/product/product/<?=$row['product_image']?>" style="width:100px"></td>
                            <td><?=$row['product_name']?></td>
                            <td style="max-width:200px;">$<?=$row['product_price']?></td>
                            <td><?=$row['product_quantity']?></td>
                            <td><?=$row['order_id']?></td>
                          
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