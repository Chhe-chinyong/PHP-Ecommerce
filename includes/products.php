<?php
 $conn = mysqli_connect('127.0.0.1', 'root','', 'rupp');	
 if (mysqli_connect_errno()) {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     exit();
 }
 
 
 $query = "SELECT * FROM tb_product where active = 1 ORDER BY pro_id ASC LIMIT 12";
 $result = mysqli_query($conn, $query);

 
 // checking query error 
 if(!$result)
 {
     die("Retriving Query Error <br>". $query);
 }

 mysqli_close($conn);
 


    //    $rows = dbSelect("tb_product","*","active=1", "ORDER BY id DESC LIMIT 10");
?>

<div class="u-s-p-b-60">

<!--====== Section Intro ======-->
<div class="section__intro u-s-m-b-16" style="margin:2rem">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__text-wrap">
                    <h1 class="section__heading u-c-secondary u-s-m-b-12">TOP TRENDING</h1>

                    <span class="section__span u-c-silver">CHOOSE CATEGORY</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Intro ======-->


<!--====== Section Content ======-->
<div class="section__content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="filter-category-container">
                    <div class="filter__category-wrapper">

                        <button class="btn filter__btn filter__btn--style-1 js-checked" type="button" data-filter="*">PHONES</button></div>
                    <!-- <div class="filter__category-wrapper">

                        <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".headphone">HEADPHONES1</button></div>
                    <div class="filter__category-wrapper">

                        <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".smartphone">SMARTPHONES</button></div>
                    <div class="filter__category-wrapper">

                        <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".sportgadget">SPORT GADGETS</button></div>
                    <div class="filter__category-wrapper">

                        <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".dslr">DSLR</button></div> -->
                </div>
                <div class="filter__grid-wrapper u-s-m-t-30">
                    <div class="row">
                    <?php
                                            $i=0;
                                     while($row=mysqli_fetch_row($result))
                                        {
                                             ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item headphone">
                            <div class="product-o product-o--hover-on product-o--radius">
                                <div class="product-o__wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                    <img class="aspect__img" src="images/product/product/<?=$row[6]?>" alt=""></a>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li>

                                                <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a></li>
                                            <li>

                                                <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">

                                    <a href="shop-side-version-2.html">Electronics</a></span>

                                <span class="product-o__name">

                                    <a href="product-detail.html">Red Wireless Headphone</a></span>
                                <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                    <span class="product-o__review">(23)</span></div>

                                <span class="product-o__price">$125.00

                                    <span class="product-o__discount">$160.00</span></span>
                            </div>
                        </div>
                        <?php
                        $i++;
                       }
                        ?>                        
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-12">
                <div class="load-more">

                    <button class="btn btn--e-brand" type="button">Load More</button></div>
            </div> -->
        </div>
    </div>
</div>
<!--====== End - Section Content ======-->
</div>