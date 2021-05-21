<?php
    include "db.php";
    // $row = dbSelect("tb_slideshow" ,"sh_id");
    $rows = dbSelect("tb_slideshow","*","active=1");
    // $rows = mysqli_fetch_row($rows);
?>

<div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey">
    <div class="owl-carousel primary-style-1" id="hero-slider">
        <div class="hero-slide hero-slide--1">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php
                       while($row=mysqli_fetch_row($rows))
                        {
                        // foreach($rows as row){
                    ?>
                        <div class="slider-content slider-content--animation">

                            <span class="content-span-1 u-c-secondary"><?=$row[0]?></span>

                            <!-- <span class="content-span-2 u-c-secondary"><?=$row[2]?></span> -->

                            <!-- <span class="content-span-3 u-c-secondary"><?=$row[3]?></span>

                            <span class="content-span-4 u-c-secondary">Starting At

                                <span class="u-c-brand"><?=$row[4]?></span></span>

                            <a class="shop-now-link btn--e-brand" href="shop-side-version-2.html"><?=$row[5]?></a>  -->
                        </div>
                        <?php
                       }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>