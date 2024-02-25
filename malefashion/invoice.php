<?php
include("header.php");
// for restricting user
if(!isset($_SESSION['ordernumber'])){
    echo "<script>
    alert('You need to place order first');
    location.assign('checkout.php');
    </script>";
}
?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Invoice</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <a href="./shop.php">Shop</a>
                            <a href="./shopping-cart.php">Shopping cart</a>
                            <a href="./checkout.php">Order</a>
                            <span>Invoice</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <br>
    <div class="container">
        <div class="row">
           <div class="col-lg-4 col-md-6">
              <div class="checkout__order">
                             <form action="" method="get">
                                <h6 class="order__title">Order Invoice</h6>
                                <div class="checkout__order__products">Order Number<span><input type="text" value="<?php echo $_SESSION['ordernumber'] ?>" class="text-center" readonly></span>
                                </div>
                                <div class="checkout__order__products">User Id<span><input  type="text" value="<?php echo $_SESSION['userId']?>" class="text-center" readonly></span>
                                </div>
                                <div class="checkout__order__products">Product Qty<span><input type="text" value="<?php echo $_SESSION['productQuantity']?>" class="text-center" readonly></span>
                                </div>
                                <div class="checkout__order__products">Total Amount<span><input type="text" value="<?php echo $_SESSION['productprice']*$_SESSION['productQuantity']?>" class="text-center" readonly></span>
                                </div>
                               <a href="feedback.php">Your Feedback <i class="fa fa-thin fa-arrow-right"></i></a><span></span>
                             </form>   
            
               </div>
           </div>   
        </div>
    </div>
    <br>
<?php
include("footer.php");
?>