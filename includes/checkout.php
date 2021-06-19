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
?>
   
        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="breadcrumb">
                            <div class="breadcrumb__wrap">
                                <ul class="breadcrumb__list">
                                    <li class="has-separator">

                                        <a href="index.php?p=home">Home</a></li>
                                    <li class="is-marked">

                                        <a href="index.php?page=checkout">Checkout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->


            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- <div id="checkout-msg-group">
                                    <div class="msg u-s-m-b-30">

                                        <span class="msg__text">Returning customer?

                                            <a class="gl-link" href="#return-customer" data-toggle="collapse">Click here to login</a></span>
                                        <div class="collapse" id="return-customer" data-parent="#checkout-msg-group">
                                            <div class="l-f u-s-m-b-16">

                                                <span class="gl-text u-s-m-b-16">If you have an account with us, please log in.</span>
                                                <form class="l-f__form">
                                                    <div class="gl-inline">
                                                        <div class="u-s-m-b-15">

                                                            <label class="gl-label" for="login-email">E-MAIL *</label>

                                                            <input class="input-text input-text--primary-style" type="text" id="login-email" placeholder="Enter E-mail"></div>
                                                        <div class="u-s-m-b-15">

                                                            <label class="gl-label" for="login-password">PASSWORD *</label>

                                                            <input class="input-text input-text--primary-style" type="text" id="login-password" placeholder="Enter Password"></div>
                                                    </div>
                                                    <div class="gl-inline">
                                                        <div class="u-s-m-b-15">

                                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">LOGIN</button></div>
                                                        <div class="u-s-m-b-15">

                                                            <a class="gl-link" href="lost-password.html">Lost Your Password?</a></div>
                                                    </div>

                                                    <!--====== Check Box ======-->
                                                    <!-- <div class="check-box">

                                                        <input type="checkbox" id="remember-me">
                                                        <div class="check-box__state check-box__state--primary">

                                                            <label class="check-box__label" for="remember-me">Remember Me</label></div>
                                                    </div>
                                                    <!--====== End - Check Box ======-->
                                                
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
                        <div class="checkout-f">
                            <div class="row">
                             
                                <div class="col-lg-12">
                                    <h1 class="checkout-f__h1">ORDER SUMMARY</h1>

                                    <!--====== Order Summary ======-->
                                    <div class="o-summary">
                                        <div class="o-summary__section u-s-m-b-30">
                                            <div class="o-summary__item-wrap gl-scroll">
                                            <?php
                                                                if(!empty($_SESSION["shopping_cart"]))
                                                                {
                                                                    
                                                                    $total = 0;
                                                                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                                                                    {
					                                        ?>
                                                <div class="o-card">
                                                    <div class="o-card__flex">
                                                        <div class="o-card__img-wrap">
                                                        

                                                            <img class="u-img-fluid"  src="images/product/product/<?=$values['item_image']?>" ></div>
                                                            
                                                        <div class="o-card__info-wrap">
                                                      
                                                            <span class="o-card__name">

                                                                <a href="product-detail.html"><?php echo $values["item_name"]; ?></a></span>

                                                            <span class="o-card__quantity">Quantity x 1</span>

                                                            <span class="o-card__price">$<?php echo $values["item_price"]; ?></span></div>
                                                    </div>
                                                    

                                                    <a href="?page=checkout&action=delete&id=<?php echo $values["item_id"]; ?>" class="o-card__del far fa-trash-alt"></a>
                                                </div>
                                                <?php
							                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
						                                            }}?>
                                              
                                                <!-- <div class="o-card">
                                                    <div class="o-card__flex">
                                                        <div class="o-card__img-wrap">

                                                            <img class="u-img-fluid" src="images/product/men/product8.jpg" alt=""></div>
                                                        <div class="o-card__info-wrap">

                                                            <span class="o-card__name">

                                                                <a href="product-detail.html">New Fashion D Nice Elegant</a></span>

                                                            <span class="o-card__quantity">Quantity x 1</span>

                                                            <span class="o-card__price">$150.00</span></div>
                                                    </div>

                                                    <a class="o-card__del far fa-trash-alt"></a>
                                                </div> -->
                                            </div>
                                        </div>
                                        
                                        <div class="o-summary__section u-s-m-b-30">
                                            <div class="o-summary__box">
                                                <table class="o-summary__table">
                                                    <tbody>
                                                        
                                                        <tr>
                                                            <td>SUBTOTAL</td>
                                                            <td>$<?php echo $total ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>GRAND TOTAL</td>
                                                            <td id="amountCheckout1"><?php echo $total ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="o-summary__section u-s-m-b-30 col-6 " style="float:right">
                                            <div class="o-summary__box">
                                                <h1 class="checkout-f__h1">PAYMENT INFORMATION</h1>
                                                <form class="checkout-f__payment">
                                                    <div class="u-s-m-b-10">

                                                 
                              

                                                     
                                                    </div>
                                                    <div>
                                                    <!-- <button class="btn btn--e-brand-b-2" id="paypal-account" type="submit">PLACE ORDER</button></div> -->

                                                    <div id="paypal-payment">

                                                    </div>
                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                    <!--====== End - Order Summary ======-->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 3 ======-->
        </div>}
    
        <script src="https://www.paypal.com/sdk/js?client-id=Aa4OZroAcmTjMOCBtYvN9ZVrki4aAdAPtfIOI-w7sXzcE4d52fBrlWK7o4DmQIWdpozD1dvcy_D8G_I2"></script>
    <!-- <script>paypal.Buttons().render('#paypal-payment');</script>  -->

    <script>      
  //code
  var total = document.getElementById("amountCheckout1").innerHTML;

  paypal
  .Buttons({
    style: {
      size: "small",
      shape: "pill",
      label: "checkout",
    },

    // Set up the transaction
    createOrder: function (data, actions) {
      return actions.order.create({
        purchase_units: [
          {
            amount: {
              value: total,
            },
          },
        ],
      });
    },

    onApprove: function (data, actions) {
      return actions.order.capture().then(function (details) {
        // Show a success message to the buyer
        console.log(details);
        var amt = total;
        var cc = details.payer.address.country_code;
        var tx = details.id;
        var st = details.status;
        var url =
          "http://localhost/testing/includes/complete.php" +
          "?amt=" +
          amt +
          "&cc=" +
          cc +
          "&tx=" +
          tx +
          "&st=" +
          st;
        window.location.replace(url);
      });
    },
    onCancel: function (data) {
     alert('you cant proccess your transaction');
    },
  })
  .render("#paypal-payment");
</script>


       
        <!-- <script src="https://www.paypal.com/sdk/js?client-id=Aa4OZroAcmTjMOCBtYvN9ZVrki4aAdAPtfIOI-w7sXzcE4d52fBrlWK7o4DmQIWdpozD1dvcy_D8G_I2&disable-funding=credit, card"></script>
        <script>
                paypal.Buttons({
                    createOrder: function(data, actions) {
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                        purchase_units: [{
                        amount: {
                            value: '100'
                        }
                        }]
                    });
                    },
                    onApprove: function(data, actions) {
                    // This function captures the funds from the transaction.
                    return actions.order.capture().then(function(details) {
                        // This function shows a transaction success message to your buyer.
                        alert('Transaction completed by ' + details.payer.name.given_name);
                    });
                    }
                }).render('#paypal-payment');
  //This function displays Smart Payment Buttons on your web page.
</script>
         -->
        <!--====== End - App Content ======-->
        


    
