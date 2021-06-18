<?php 
$total = 0;
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}

if(isset($_POST["quantity"]))
{

if(isset($_SESSION["shopping_cart"]))
{
    echo $_SESSION["shopping_cart"];
    

$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
if(!in_array($_GET["id"], $item_array_id))
{
    echo $_SESSION['quantity'];
    $count = count($_SESSION["shopping_cart"]);
    $item_array = array(
        'item_id'			=>	$_GET["id"],
        'item_name'			=>	$_POST["hidden_name"],
        'item_price'		=>	$_POST["hidden_price"],
        'item_quantity'		=>	$_POST["quantity"]  ,  
        'item_image'        =>  $_POST['hidden_img']
     );
    $_SESSION["shopping_cart"][$count] = $item_array;
}
else
{
    echo '<script>alert("Item Already Added")</script>';
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
}
}
?>

<div class="u-s-p-y-60">

<!--====== Section Content ======-->
<div class="section__content">
    <div class="container">
        <div class="breadcrumb">
            <div class="breadcrumb__wrap">
                <ul class="breadcrumb__list">
                    <li class="has-separator">

                        <a href="index.php?page=home">Home</a></li>
                    <li class="is-marked">

                        <a href="cart.html">Cart</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<!--====== End - Section 1 ======-->


<!--====== Section 2 ======-->
<div class="u-s-p-b-60">

<!--====== Section Intro ======-->
<div class="section__intro u-s-m-b-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__text-wrap">
                    <h1 class="section__heading u-c-secondary">SHOPPING CART</h1>
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
            <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                <div class="table-responsive">
                    <table class="table-p">
                        <tbody>
                        
                            <!--====== Row ======-->
                            <?php
					if(!empty($_SESSION["shopping_cart"]))
					{
                        echo 'hi';
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
                            <tr>
                                <td>
                                    <div class="table-p__box">
                                        <div class="table-p__img-wrap">

                                            <img class="u-img-fluid" src="images/product/product/<?=$values['item_image']?>" style="height:120px"alt="image1"></div>
                                        <div class="table-p__info">

                                            <span class="table-p__name">

                                                <a href="product-detail.html"><?php echo $values["item_name"]; ?></a></span>

                                            <span class="table-p__category">

                                                <a href="shop-side-version-2.html">Electronics</a></span>
                                            <ul class="table-p__variant-list">
                                                <li>

                                                    <span>Size: 22</span></li>
                                                <li>

                                                    <span>Color: Red</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                                <td>

                                    <span class="table-p__price">$<?php echo $values["item_price"]; ?></span></td>
                                <td>
                                    <div class="table-p__input-counter-wrap">

                                        <!--====== Input Counter ======-->
                                        <div class="input-counter">

                                            <span class="input-counter__minus fas fa-minus"></span>
                                            <form method="POST" action="?page=cart&action=add&id=<?php echo $values["item_id"]; ?>">   
                                                 <input class="input-counter__text input-counter--text-primary-style" name="quantity" type="text" value="<?php echo $values["item_quantity"]; ?>" onchange="this.form.submit()"  data-min="1" data-max="1000">
                                            </form>
                                            <span class="input-counter__plus fas fa-plus"></span></div>
                                        <!--====== End - Input Counter ======-->
                                    </div>
                                </td>
                                <td>
                                    <div class="table-p__del-wrap">

                                        <a class="far fa-trash-alt table-p__delete-link" href="?page=cart&action=delete&id=<?php echo $values["item_id"]; ?>"></a>
                          
                                        
                                        </div>
                                </td>
                                <?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
                            </tr>

                            <?php
					}
					?>
                    
                            <!--====== End - Row ======-->
                        
				

                           
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="route-box">
                    <div class="route-box__g1">

                        <a class="route-box__link" href="shop-side-version-2.html"><i class="fas fa-long-arrow-alt-left"></i>

                            <span>CONTINUE SHOPPING</span></a></div>
                    <div class="route-box__g2">

                        <a class="route-box__link" href="cart.html"><i class="fas fa-trash"></i>

                            <span>CLEAR CART</span></a>

                        <a class="route-box__link" href="cart.html"><i class="fas fa-sync"></i>

                            <span>UPDATE CART</span></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Content ======-->
</div>
<!--====== End - Section 2 ======-->


<!--====== Section 3 ======-->
<div class="u-s-p-b-60">

<!--====== Section Content ======-->
<div class="section__content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                <form class="f-cart">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="f-cart__pad-box">
                                <h1 class="gl-h1">ESTIMATE SHIPPING AND TAXES</h1>

                                <span class="gl-text u-s-m-b-30">Enter your destination to get a shipping estimate.</span>
                                <div class="u-s-m-b-30">

                                    <!--====== Select Box ======-->

                                    <label class="gl-label" for="shipping-country">COUNTRY *</label><select class="select-box select-box--primary-style" id="shipping-country">
                                        <option selected value="">Choose Country</option>
                                        <option value="uae">United Arab Emirate (UAE)</option>
                                        <option value="uk">United Kingdom (UK)</option>
                                        <option value="us">United States (US)</option>
                                    </select>
                                    <!--====== End - Select Box ======-->
                                </div>
                                <div class="u-s-m-b-30">

                                    <!--====== Select Box ======-->

                                    <label class="gl-label" for="shipping-state">STATE/PROVINCE *</label><select class="select-box select-box--primary-style" id="shipping-state">
                                        <option selected value="">Choose State/Province</option>
                                        <option value="al">Alabama</option>
                                        <option value="al">Alaska</option>
                                        <option value="ny">New York</option>
                                    </select>
                                    <!--====== End - Select Box ======-->
                                </div>
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="shipping-zip">ZIP/POSTAL CODE *</label>

                                    <input class="input-text input-text--primary-style" type="text" id="shipping-zip" placeholder="Zip/Postal Code"></div>
                                <div class="u-s-m-b-30">

                                    <a class="f-cart__ship-link btn--e-transparent-brand-b-2" href="cart.html">CALCULATE SHIPPING</a></div>

                                <span class="gl-text">Note: There are some countries where free shipping is available otherwise our flat rate charges or country delivery charges will be apply.</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="f-cart__pad-box">
                                <h1 class="gl-h1">NOTE</h1>

                                <span class="gl-text u-s-m-b-30">Add Special Note About Your Product</span>
                                <div>

                                    <label for="f-cart-note"></label><textarea class="text-area text-area--primary-style" id="f-cart-note"></textarea></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="f-cart__pad-box">
                                <div class="u-s-m-b-30">
                                    <table class="f-cart__table">
                                        <tbody>
                                            <tr>
                                                <td>SHIPPING</td>
                                                <td>$4.00</td>
                                            </tr>
                                            <tr>
                                                <td>TAX</td>
                                                <td>$0.00</td>
                                            </tr>
                                            <tr>
                                                <td>SUBTOTAL</td>
                                                <td>$379.00</td>
                                            </tr>
                                            <tr>
                                                <td>GRAND TOTAL</td>
                                                <td> $<?php echo $total; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>

                                    <button class="btn btn--e-brand-b-2" type="submit"> PROCEED TO CHECKOUT</button></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Content ======-->
</div>
<!--====== End - Section 3 ======-->
</div>
<!--====== End - App Content ======-->