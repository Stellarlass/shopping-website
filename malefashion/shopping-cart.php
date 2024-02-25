<?php
include("header.php");
?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <a href="./shop.php">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(isset($_SESSION['cart'])){
                                    foreach($_SESSION['cart'] as $key => $values){
                                        ?>
                                         <tr>
                                            <td class="cart__price">
                                                <?php echo $values['proId'] ?>
                                            </td>
                                            <td class="product__cart__item">
                                               <div class="product__cart__item__pic">
                                                  <img src="<?php echo $productImageAddress.$values['proImage'] ?>" alt="" width="80">
                                                </div>
                                                <div class="product__cart__item__text">
                                                   <h6><?php echo $values['proName'] ?></h6>
                                                   <h5>Rs <?php echo $values['proPrice'] ?></h5>
                                                </div>
                                            </td>
                                            <td class="cart__price text-center">
                                                <div class="quantity">
                                                  <?php echo $values['proQuantity'] ?>
                                                </div>
                                           
                                            </td>
                                            <!-- <td class="quantity__item">
                                                <div class="quantity">
                                                   <div class="pro-qty-2">
                                                     <input type="text" value="" readonly>
                                                   </div>
                                                </div>
                                            </td> -->
                                            <td class="cart__price">Rs <?php echo $values['proQuantity']*$values['proPrice']?></td>
                                            <td class="cart__close"><a href="?removeId=<?php echo $values['proId']?>"><i class="fa fa-close"></i></a></td>
                                         </tr>
                                        <?php    
                                    }
                                }
                                ?>
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="shop.php"><i class="fa fa-spinner"></i> Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6 class="text-center">Making Shopping Easy</h6>
                        <form action="#">
                            <input class="text-center" type="text" value="Hurry Up, Place Your Orders Now" placeholder="" readonly>
                            <!-- <button type="submit">Apply</button> -->
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                        <?php 
                        $totalAmount = 0;
                        ?>
                        <?php
                        if(isset($_SESSION['cart'])){
                            ?>
                            <li>Subtotal
                            <?php
                            foreach($_SESSION['cart'] as $key => $value){
                                $subt = $value['proQuantity']*$value['proPrice'];
                                $totalAmount += $subt;
                                ?>
                                <span>Rs <?php echo $subt = $value['proQuantity']*$value['proPrice'];?></span></br>
                                <?php
                            }
                        }
                        ?>
                             </li>
                            <li>Total <span>Rs <?php echo $totalAmount; ?></span></li>
                        </ul>
                        <?php
						if(isset($_SESSION['userEmail'])){
							?>
							<a href="checkout.php?proId=<?php echo $value['proId']?>" class="primary-btn">Proceed to checkout</a>
							<?php
						}else{
							?>
							<a href="login.php" class="primary-btn">Proceed to Checkout</a>
							<?php
						}
						?>	
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
<?php
include("footer.php");
?>
   