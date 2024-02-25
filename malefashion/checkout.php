<?php
include("header.php");
// for taking product id
if(isset($_GET['proId'])){
    $proid = $_GET['proId'];
}
?>
<style>
    ul.custom-numbered {
        list-style-type: none;
        counter-reset: custom-counter;
        padding: 0;
    }

    ul.custom-numbered li {
        counter-increment: custom-counter;
        margin-bottom: 10px;
    }

    ul.custom-numbered li::before {
        content: counter(custom-counter) ".";
        display: inline-block;
        width: 20px; /* Adjust the width as needed */
        text-align: right;
        margin-right: 5px;
    }
</style>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <a href="./shop.php">Shop</a>
                            <a href="./shopping-cart.php">Shopping cart</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>User Name</p>
                                        <input type="hidden" name="proid" value="<?php echo $proid?>" required>
                                        <input type="text" name="name" value="<?php echo $_SESSION['userName']?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email</p>
                                        <input type="text" name="email" value="<?php echo $_SESSION['userEmail'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="country" required>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address" placeholder="Street Address" class="checkout__input__add" required>
                               
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="city" required>
                            </div>
                           
                            <div class="checkout__input">
                                <p>Postalcode / ZIP<span>*</span></p>
                                <input type="text" name="postalcode" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" required>
                                    </div>
                                </div>
    
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span></span></p>
                                <input type="text" name="orderinstructions"
                                placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product<span>Total</span></div>
                                <ul class="checkout__total__products custom-numbered">
                                    <?php if(isset($_SESSION['cart'])){
                                        foreach($_SESSION['cart'] as $key => $value){
                                            ?>
                                            <li>
                                            <?php    
                                            echo $value['proName'];
                                            ?>
                                            <span>Rs <?php echo $value['proQuantity']*$value['proPrice'];?></span>
                                            </li>
                                            <?php
                                        }
                                    } ?> 
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span> <?php
                        if(isset($_SESSION['cart'])){
                            foreach($_SESSION['cart'] as $key => $value){
                                $subt = $value['proQuantity']*$value['proPrice'];
                                ?> Rs <?php echo  $subt = $value['proQuantity']*$value['proPrice'];?>
                                 <br>
                                <?php
                            }
                        }
                        ?></span></li>
                                    <li>Total <span>Rs <?php 
                        $totalAmount = 0;
                        if(isset($_SESSION['cart'])){
                            foreach($_SESSION['cart'] as $key => $value){
                                $subt = $value['proQuantity']*$value['proPrice'];
                                $totalAmount += $subt;

                            }
                        }
                        echo $totalAmount;
                        ?></span></li>
                                </ul>
                                <div class="checkout__input__checkbox">
						                <select class="input100" name="uselect" required>
                                           <option value="" disabled selected hidden>Select Payment Type</option>
                                           <option value="Credit card">Credit card</option>
                                           <option value="customercheque">cheque</option>
                                           <option value="VPP">VPP</option>
                                        </select>       
                                </div>            
                                <div class="checkout__input__checkbox">
						                <select class="input100" name="uselectdelivery" required>
                                           <option value="" disabled selected hidden>Select Delivery Type</option>
                                           <option value="Urgent1">Urgent Delivery</option>
                                           <option value="Scheduled2">Scheduled Delivery</option>
                                        </select>   
                                </div>
                               
                                <button type="submit" class="site-btn" name="checkout">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
<?php
include("footer.php");
?>