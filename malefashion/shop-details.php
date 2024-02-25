<?php
include("header.php");
if(isset($_GET['proId'])){
    $proId = $_GET['proId'];
    $query = $pdo -> prepare("SELECT `tbl_products`.*, `tbl_category`.`category_name`
    FROM `tbl_products` 
        INNER JOIN `tbl_category` ON `tbl_products`.`product_cat_id` = `tbl_category`.`category_id` where product_id=:pid");
    $query -> bindParam("pid",$proId);
    $query -> execute();
    $detail_product = $query ->fetch(PDO::FETCH_ASSOC);
}
?>
    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="./index.php">Home</a>
                            <a href="./shop.php">Shop</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="<?php echo $productImageAddress.$detail_product['product_image'] ?>">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="<?php echo $productImageAddress.$detail_product['product_image'] ?>">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="<?php echo $productImageAddress.$detail_product['product_image'] ?>">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="<?php echo $productImageAddress.$detail_product['product_image'] ?>">
                                        <!-- <i class="fa fa-play"></i> -->
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="<?php echo $productImageAddress.$detail_product['product_image'] ?>" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <!-- <img src="img/shop-details/product-big-3.png" alt=""> -->
                                    <img src="<?php echo $productImageAddress.$detail_product['product_image'] ?>" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <!-- <img src="img/shop-details/product-big.png" alt=""> -->
                                    <img src="<?php echo $productImageAddress.$detail_product['product_image'] ?>" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-4" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="<?php echo $productImageAddress.$detail_product['product_image'] ?>" alt="">
                                    <!-- <img src="img/shop-details/product-big-4.png" alt="">
                                    <a href="https://www.youtube.com/watch?v=8PJ3_p7VqHw&list=RD8PJ3_p7VqHw&start_radio=1" class="video-popup"><i class="fa fa-play"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
               <form action="shopping-cart.php" method="post">
                <input type="hidden" name="pId" value="<?php echo $detail_product['product_id']?>">
                <input type="hidden" name="pName" value="<?php echo $detail_product['product_name']?>">
                <input type="hidden" name="pPrice" value="<?php echo $detail_product['product_price']?>">
                <input type="hidden" name="pImage" value="<?php echo $detail_product['product_image']?>">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4><?php echo $detail_product['product_name']?></h4>
                            <h3>Rs <?php echo $detail_product['product_price']?><span></span></h3>
                            <p>Brand: <?php echo $detail_product['product_brand'] ?></p>
                          
                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1" name="pQuantity">
                                    </div>
                                </div>
                                <button type="submit" class="primary-btn"  name="addToCart">
										Add to cart
								</button>
                                <!-- <a href="" class="primary-btn" type="submit" name="addToCart">add to cart</a> -->
                            </div>
                            <!-- <div class="product__details__btns__option">
                                <a href="#"><i class="fa fa-heart"></i> add to wishlist</a>
                                <a href="#"><i class="fa fa-exchange"></i> Add To Compare</a>
                            </div> -->
                            <div class="product__details__last__option">
                                <h5><span>Guaranteed Safe Checkout</span></h5>
                                <img src="img/shop-details/details-payment.png" alt="">
                                <ul>
                                    <li><span>Id: </span> <?php echo $detail_product['product_id']?></li>
                                    <li><span>Categories: </span><?php echo $detail_product['category_name']?></li>
                                    <li><span>Tag: </span> Makeup, Bags, Stationary, Gifts, Art</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>     
               </form>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                    role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer
                                    Previews</a>
                                </li>
                            
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p><?php echo $detail_product['product_detail']?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-6" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <div class="product__details__tab__content__item">
                                            <!-- <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                    <?php
                                                     $query = $pdo ->query("select * from tbl_feedback");
                                                     $row = $query ->fetchAll(PDO::FETCH_ASSOC);
                                                     foreach($row as $feedback){
                                                    ?>
                                                     <h5>Feedback</h5>
                                                    <div class="product__details__tab__content__item">
                                                        <h6><?php echo $feedback['feedback']?></h6>
                                                        <p><?php echo $feedback['product_name']?></p>
                                                        <p><?php echo $feedback['order_number']?></p>
                                                        <p><?php echo $feedback['Ratings']?></p>
                                                    </div> 
                                                    <?php
                                                    } 
                                                    ?>
                                                    </div>

                                                </div>
                                            </div> -->
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8 mx-auto text-center">
                                                    <div class="contact__form">
                                                       <form action="" method="post">
                                                        <div class="row">
                                                           <?php
                                                             $query = $pdo ->query("select * from tbl_feedback");
                                                             $row = $query ->fetchAll(PDO::FETCH_ASSOC);
                                                             foreach($row as $feedback){
                                                            ?>
                                                           <div class="col-lg-6">
                                                                 <h6>Product:</span><?php echo $feedback['product_name']?></h6>
                                                                 <input type="text" name="feedback" value="<?php echo $feedback['feedback']?>"  readonly>
                                                           </div>
                                                           <?php
                                                             }
                                                            ?>                             
                                                        </div>
                                                       </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
            <div class="row">
                <?php
                
                $dp = $detail_product['product_cat_id'];
                $query = $pdo -> prepare("select * from tbl_products where product_cat_id =:pcid");
                $query -> bindParam("pcid",$dp);
                $query -> execute();
                $row = $query -> fetchAll(PDO::FETCH_ASSOC);
                foreach($row as $pro){
                    ?>
                      <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?php echo $productImageAddress.$pro['product_image'] ?>">
                            <?= $pro['product_status']=='hot-sales'?'<span class="label">Sale</span>':'<span class="label">New</span>'?>
                            <ul class="product__hover">
                                <li><a href="shop-details.php?proId=<?php echo $pro['product_id']?>"><img src="img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><?php echo $pro['product_name']?></h6>
                            <a href="shop-details.php?proId=<?php echo $pro['product_id']?>" class="add-cart">+ view product</a>
                            <h5>Rs <?php echo $pro['product_price']?></h5>             
                        </div>
                    </div>
                </div>

                    <?php
                }
                ?>
                <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                            <span class="label">New</span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Piqué Biker Jacket</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$67.24</h5>
                            <div class="product__color__select">
                                <label for="pc-1">
                                    <input type="radio" id="pc-1">
                                </label>
                                <label class="active black" for="pc-2">
                                    <input type="radio" id="pc-2">
                                </label>
                                <label class="grey" for="pc-3">
                                    <input type="radio" id="pc-3">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                            <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Piqué Biker Jacket</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$67.24</h5>
                            <div class="product__color__select">
                                <label for="pc-4">
                                    <input type="radio" id="pc-4">
                                </label>
                                <label class="active black" for="pc-5">
                                    <input type="radio" id="pc-5">
                                </label>
                                <label class="grey" for="pc-6">
                                    <input type="radio" id="pc-6">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                            <span class="label">Sale</span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Multi-pocket Chest Bag</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$43.48</h5>
                            <div class="product__color__select">
                                <label for="pc-7">
                                    <input type="radio" id="pc-7">
                                </label>
                                <label class="active black" for="pc-8">
                                    <input type="radio" id="pc-8">
                                </label>
                                <label class="grey" for="pc-9">
                                    <input type="radio" id="pc-9">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-4.jpg">
                            <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>Diagonal Textured Cap</h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5>$60.9</h5>
                            <div class="product__color__select">
                                <label for="pc-10">
                                    <input type="radio" id="pc-10">
                                </label>
                                <label class="active black" for="pc-11">
                                    <input type="radio" id="pc-11">
                                </label>
                                <label class="grey" for="pc-12">
                                    <input type="radio" id="pc-12">
                                </label>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Related Section End -->
<?php
include("footer.php");
?>
    