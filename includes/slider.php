<?php
    include "db.php";
    // $row = dbSelect("tb_slideshow" ,"sh_id");
    $rows = dbSelect("tb_slideshow","*","active=1");
    // $rows = mysqli_fetch_row($rows);
?>

<div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey">
    <div class="owl-carousel  primary-style-1" id="hero-slider">
    <?php
                        $i=0;
                       while($row=mysqli_fetch_row($rows))
                        {
                      
                    ?>
        <div class="hero-slide hero-slide--<?=$i?>">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="slider-content slider-content--animation <?php echo $i==0 ? 'active': '';?>">

                            <span class="content-span-1 u-c-secondary"><?=$row[6]?></span>

                            <span class="content-span-2 u-c-secondary"><?=$row[1]?></span>

                            <span class="content-span-3 u-c-secondary"><?=$row[3]?></span>
<!-- 
                            <span class="content-span-4 u-c-secondary">Starting At

                                <span class="u-c-brand"><?=$row[4]?></span></span> -->

                            <!-- <a class="shop-now-link btn--e-brand" href="shop-side-version-2.html"><?=$row[4]?></a>   -->

                            <a class="shop-now-link btn--e-brand" href="<?=$row[4]?>">Learn more</a>

                            <script language="javascript">
		                       		
                                document.querySelector(".hero-slide--<?=$i?>").style.backgroundImage  =  "url(images/slider/<?=$row[5]?>)";
		
		                    </script>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <?php
            $i++;}
        ?>                
    </div>
</div>

<script type='text/javascript'>

jQuery(document).ready(function($) {
	 $('#hero-slide').owlCarousel({
		nav: true,
		items: 2,
		loop: true,
		center: true,
		margin: 0,
		lazyLoad:true,
		dots: true
	});
 })

</script>


