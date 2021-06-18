<?php
       include "db.php";
       
    //    session_start();
       ob_start();
        // Add to cart 
        if(isset($_POST["add_to_cart"]))
        {

	if(isset($_SESSION["shopping_cart"]))
	{
       
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"],
                'item_image'        =>  $_POST['hidden_img']
 			);
			$_SESSION["shopping_cart"][$count] = $item_array;
            echo '<script>alert("Item Added")</script>';
			echo '<script>window.location="index.php?page=productItem"</script>';
		}
		else
		{

			// echo '<script>alert("Item Already Added")</script>';
            // echo '<script>window.location="index.php?page=productItem"</script>';
            // echo '<script>alert("Item Already Added")</script>';
            // echo '<script>alert("Item Removed")</script>';
            // echo '<script>window.location="productitem.php"</script>';
            echo '<script>alert("Item Added")</script>';
			echo '<script>window.location="index.php?page=productItem"</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"],
            'item_image'        =>  $_POST['hidden_img']
		);
		$_SESSION["shopping_cart"][0] = $item_array;
        echo '<script>location.reload();</script>';
        echo '<script>alert("Item Already Added")</script>';
        echo '<script>window.location="index.php?page=productItem"</script>';

	}
}

       $rows = dbSelect("tb_product","*","active=1");
?>

<div class="col-lg-9 col-md-12">
                            <div class="shop-p">
                                <div class="shop-p__toolbar u-s-m-b-30">
                                    <div class="shop-p__meta-wrap u-s-m-b-60">

                                        <span class="shop-p__meta-text-1">FOUND 18 RESULTS</span>
                                        <div class="shop-p__meta-text-2">

                                            <span>Related Searches:</span>

                                            <a class="gl-tag btn--e-brand-shadow" href="#">men's clothing</a>

                                            <a class="gl-tag btn--e-brand-shadow" href="#">mobiles & tablets</a>

                                            <a class="gl-tag btn--e-brand-shadow" href="#">books & audible</a></div>
                                    </div>
                                    <div class="shop-p__tool-style">
                                        <div class="tool-style__group u-s-m-b-8">

                                            <span class="js-shop-grid-target is-active">Grid</span>

                                            <span class="js-shop-list-target">List</span></div>
                                        <form>
                                            <div class="tool-style__form-wrap">
                                                <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                                        <option>Show: 8</option>
                                                        <option selected>Show: 12</option>
                                                        <option>Show: 16</option>
                                                        <option>Show: 28</option>
                                                    </select></div>
                                                <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                                        <option selected>Sort By: Newest Items</option>
                                                        <option>Sort By: Latest Items</option>
                                                        <option>Sort By: Best Selling</option>
                                                        <option>Sort By: Best Rating</option>
                                                        <option>Sort By: Lowest Price</option>
                                                        <option>Sort By: Highest Price</option>
                                                    </select></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                


                                <div class="shop-p__collection">
                                    <div class="row is-grid-active">
                                    <?php
                                            $i=0;
                                     while($row=mysqli_fetch_row($rows))
                                        {
                                             ?>


                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                        <form method="post" action="?page=productItem&action=add&id=<?php echo $row[0]; ?>">

                                            <div class="product-m">
                                                <div class="product-m__thumb">
                                                
                                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                                        <img class="aspect__img" src="images/product/product/<?=$row[6]?>" alt=""></a>
                                                    <div class="product-m__quick-look">

                                                        <a class="fas fa-search" data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick Look"></a></div>
                                                    <div class="product-m__add-cart">
                                                    <!-- <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" /> -->
                                                        <input type="submit" name="add_to_cart"  style="margin-top:5px;"  class="btn--e-brand" data-modal="modal" data-modal-id="#add-to-cart<?php echo $row[0];?>" value="Add to cart" /> 
                                                    </div>
                                                        <!-- href="?p=productItem&action=2&id=<?=$row[0]?>" -->
                                                </div>
                                                <div class="product-m__content">
                                                    <div class="product-m__category">

                                                        <a href="shop-side-version-2.html">Men Clothing</a></div>
                                                    <div class="product-m__name">

                                                        <a href="product-detail.html"><?=$row[5]?></a></div>
                                                    <div class="product-m__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                        <span class="product-m__review">(23)</span></div>
                                                    <div class="product-m__price" name="hidden_price" >$<?=$row[1]?></div>
                                                    <div class="product-m__hover">
                                                        <div class="product-m__preview-description">

                                                            <span><?=$row[2]?></span></div>
                                                        <div class="product-m__wishlist">

                                                            <a class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"></a></div>
                                                    </div>

                                                    
						                <input type="hidden" name="quantity" value="1" class="form-control" />

                                        <input type="hidden" name="hidden_name" value="<?php echo $row[5]; ?>" />

                                        <input type="hidden" name="hidden_price" value="<?php echo $row[1]; ?>" />
                                        <input type="hidden" name="hidden_img" value="<?php echo $row[6]; ?>" />

                                                </div>
                                            </div>
                                        </form>
                                        </div>

                                        
                                        <?php
                        $i++;
                       }
                        ?>
                                       
                                    </div>
                                </div>
                                <div class="u-s-p-y-60">

                                    <!--====== Pagination ======-->
                                    <ul class="shop-p__pagination">
                                        <li class="is-active">

                                            <a href="shop-side-version-2.html">1</a></li>
                                        <li>

                                            <a href="shop-side-version-2.html">2</a></li>
                                        <li>

                                            <a href="shop-side-version-2.html">3</a></li>
                                        <li>

                                            <a href="shop-side-version-2.html">4</a></li>
                                        <li>

                                            <a class="fas fa-angle-right" href="shop-side-version-2.html"></a></li>
                                    </ul>
                                    <!--====== End - Pagination ======-->
                                </div>
                            </div>
                        </div>