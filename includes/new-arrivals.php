<?php
 $conn = mysqli_connect('127.0.0.1', 'root','', 'rupp');	
 if (mysqli_connect_errno()) {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     exit();
 }
 
 
 $query = "SELECT * FROM tb_product where active = 1 ORDER BY pro_id DESC LIMIT 5";
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
<div class="section__intro u-s-m-b-46">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__text-wrap">
                    <h1 class="section__heading u-c-secondary u-s-m-b-12">NEW ARRIVALS</h1>

                    <span class="section__span u-c-silver">GET UP FOR NEW ARRIVALS</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Intro ======-->


<!--====== Section Content ======-->
<div class="section__content">
    <div class="container">
        <div class="slider-fouc">
            <div class="owl-carousel product-slider" data-item="4">
            <?php
                                            $i=0;
                                     while($row=mysqli_fetch_row($result))
                                        {
                                             ?>
                <div class="u-s-m-b-30">
                    <div class="product-o product-o--hover-on">
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

                            <a href="product-detail.html"><?=$row[1]?></a></span>
                        <div class="product-o__rating gl-rating-style"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                            <span class="product-o__review">(0)</span></div>

                        <span class="product-o__price">$125.00

                            <span class="product-o__discount">$160.00</span></span>
                    </div>
                 
                </div>
                <?php
                        $i++;
                       }
                        ?>
                <!-- <div class="u-s-m-b-30">
                    <div class="product-o product-o--hover-on">
                        <div class="product-o__wrap">

                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                <img class="aspect__img" src="https://images.unsplash.com/photo-1551190435-def8c09f507c?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=600&h=600&q=80" alt=""></a>
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

                            <a href="product-detail.html">Nikon DSLR 2K Camera</a></span>
                        <div class="product-o__rating gl-rating-style"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                            <span class="product-o__review">(0)</span></div>

                        <span class="product-o__price">$125.00

                            <span class="product-o__discount">$160.00</span></span>
                    </div>
                </div> -->
                <!-- <div class="u-s-m-b-30">
                    <div class="product-o product-o--hover-on">
                        <div class="product-o__wrap">

                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                <img class="aspect__img" src="https://images.unsplash.com/photo-1605648916361-9bc12ad6a569?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=600&q=80" alt=""></a>
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

                            <a href="product-detail.html">Sony DSLR 4K Camera</a></span>
                        <div class="product-o__rating gl-rating-style"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                            <span class="product-o__review">(0)</span></div>

                        <span class="product-o__price">$125.00

                            <span class="product-o__discount">$160.00</span></span>
                    </div>
                </div> -->
                <!-- <div class="u-s-m-b-30">
                    <div class="product-o product-o--hover-on">
                        <div class="product-o__wrap">

                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                <img class="aspect__img" src="https://images.unsplash.com/photo-1589578228447-e1a4e481c6c8?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=600&q=80" alt="Keyboard"></a>
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

                            <a href="product-detail.html">Sony DSLR 2K Camera</a></span>
                        <div class="product-o__rating gl-rating-style"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                            <span class="product-o__review">(0)</span></div>

                        <span class="product-o__price">$125.00

                            <span class="product-o__discount">$160.00</span></span>
                    </div>
                </div> -->
               
              
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Content ======-->
</div>