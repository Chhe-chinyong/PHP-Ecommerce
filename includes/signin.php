<?php
    session_start();
    ob_start();  
    $message ="";
      include('db.php'); 
      if (isset($_POST['username']))
      {
          $username = cleanInput($_POST['username']);
          $password = cleanInput($_POST['password']);
          $criteria = "username='" . $username ."' and password= '" . md5($password) ."'";
          $rnum = dbCount("tb_login", $criteria);
          if($rnum > 0)
          {
              $_SESSION['isValid'] = true;
              header("location: admin");
              exit; 
          }
          else 
          {
            $message = "Invalid username or password";
            // exit();
          }
      }
      ob_end_flush();
?>

<!--====== Section 1 ======-->
<div class="u-s-p-y-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="breadcrumb">
                <div class="breadcrumb__wrap">
                    <ul class="breadcrumb__list">
                        <li class="has-separator">

                            <a href="index.php">Home</a>
                        </li>
                        <li class="is-marked">

                            <a href="signin.html">Signin</a>
                        </li>
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
                        <!-- <h1 class="section__heading u-c-secondary">Login</h1> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Intro ======-->


    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row row--center">
                <div class="col-lg-6 col-md-8 u-s-m-b-30">
                    <div class="l-f-o">
                        <div class="l-f-o__pad-box">
                            <!-- <h1 class="gl-h1">I'M NEW CUSTOMER</h1>

                        <span class="gl-text u-s-m-b-30">By creating an account with our store, you will be able to move through the checkout process faster, store shipping addresses, view and track your orders in your account and more.</span>
                        <div class="u-s-m-b-15">

                            <a class="l-f-o__create-link btn--e-transparent-brand-b-2" href="signup.html">CREATE AN ACCOUNT</a></div>
                        <h1 class="gl-h1">SIGNIN</h1>

                        <span class="gl-text u-s-m-b-30">If you have an account with us, please log in.</span> -->
                            <form class="l-f-o__form" method="POST">
                                <div class="gl-s-api">
                                    <div class="u-s-m-b-15">

                                        <!-- login -->

                                        <h2 style="color:black">Login</h2>
                                        <p style="color:red"> <?=$message?></p>
                                        <div class="u-s-m-b-15">

                                            <!-- <button class="gl-s-api__btn gl-s-api__btn--gplus" type="button"><i class="fab fa-google"></i>

                                        <span>Signin with Google</span></button></div> -->
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="login-email">USERNAME*</label>

                                            <input class="input-text input-text--primary-style" type="text"
                                                id="login-email" placeholder="Enter Usernmae" name="username">
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="login-password">PASSWORD *</label>

                                            <input class="input-text input-text--primary-style" type="text"
                                                id="login-password" placeholder="Enter Password" name="password">
                                        </div>
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">

                                                <button class="btn btn--e-transparent-brand-b-2"
                                                    type="submit">LOGIN</button>
                                            </div>

                                        </div>
                                        <div class="u-s-m-b-30">

                                            <!--====== Check Box ======-->
                                            <div class="check-box">

                                                <input type="checkbox" id="remember-me">
                                                <div class="check-box__state check-box__state--primary">

                                                    <label class="check-box__label" for="remember-me">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <!--====== End - Check Box ======-->

                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>