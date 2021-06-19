
<?php
    include_once "../includes/db.php";

    $rows = dbSelect("orders","*","", "");

    
?>




<div class="container-fluid">
    <!-- < DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Order ID</th>
                        <th>Total Price</th>
                        <th>Transaction</th>
                        <th>Status</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $i=1;
                           
                            foreach($rows as $row)
                            {
                                
                        ?>
                        <tr>
                            
                            <td><?=$row['order_id']?></td>
                            <td><?=$row['order_amount']?></td>
                            <td style="max-width:200px;"><?=$row['order_transaction']?></td>
                            <td><?=$row['order_status']?></td>
                           
                                <!-- Modal -->
                                <!-- Button trigger modal -->


                              


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