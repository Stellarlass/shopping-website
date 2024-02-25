<?php
include("header.php");
?>
<style>
    /* CSS added by me */
  h6 a {
	color: black;
	text-decoration: none;
	display: inline-block;
	padding: 5px;
	border: 1px solid #b7b7b7;
	border-radius: 5px;
	transition: color 0.3s ease; /* Smooth transition effect */
  }
  h6 a:hover {
    color: #ffffff;
	background: #111111;
  }
</style>
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
          
            <div class="hero__items set-bg" data-setbg="img/hero/hero.png">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Artem Serenity</h6>
                                <h2>Crafted Joys, Digital Ease.</h2>
                                <p>At Artem Serenity, we invite you to explore the intersection of art and convenience, where every purchase tells a story and adds a touch of sophistication to your world. Immerse yourself in the tranquil elegance of Artem Serenity, where art meets online ease</p>
                                <a href="shop.php" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <div class="row">
                <?php
                 $categoryName = "Gift articles & Greeting Cards"; 
                 $query = $pdo -> prepare("select * from tbl_category where category_name = :pn");
                 $query -> bindParam("pn",$categoryName);
                 $query -> execute();
                 $row = $query -> fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="col-lg-7 offset-lg-4  text-center">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="../dashmin/img/category/<?php echo $row['category_image']?>" alt="" width="420px" height="420px">
                        </div>
                        <div class="banner__item__text">
                            <h2><?php echo $row['category_name']?></h2>
                            <a href="shop.php?catID=<?php echo $row['category_id']?>">Shop now</a>
                        </div>
                    </div>
                </div>
                <?php
                 $categoryName = "Artistic Essentials"; 
                 $query = $pdo -> prepare("select * from tbl_category where category_name = :pn");
                 $query -> bindParam("pn",$categoryName);
                 $query -> execute();
                 $row = $query -> fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="col-lg-5 text-center">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <!-- <img src="img/banner/banner-2.jpg" alt=""> -->
                            <img src="../dashmin/img/category/<?php echo $row['category_image']?>" alt="" width="420px" height="420px">
                        </div>
                        <div class="banner__item__text">
                            <h2><?php echo $row['category_name']?></h2>
                            <a href="shop.php?catID=<?php echo $row['category_id']?>">Shop now</a>
                        </div>
                    </div>
                </div>
                <?php
                 $categoryName = "Wallets & Purses"; 
                 $query = $pdo -> prepare("select * from tbl_category where category_name = :pn");
                 $query -> bindParam("pn",$categoryName);
                 $query -> execute();
                 $row = $query -> fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="col-lg-7 text-center">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <!-- <img src="img/banner/banner-3.jpg" alt=""> -->
                            <img src="../dashmin/img/category/<?php echo $row['category_image']?>" alt="" width="420px" height="420px">
                        </div>
                        <div class="banner__item__text">
                            <br>
                            <h2><?php echo $row['category_name']?></h2>
                            <a href="shop.php?catID=<?php echo $row['category_id']?>">Shop now</a>
                        </div>
                    </div>
                </div>
                <?php
                 $categoryName = "Stationary items & toys"; 
                 $query = $pdo -> prepare("select * from tbl_category where category_name = :pn");
                 $query -> bindParam("pn",$categoryName);
                 $query -> execute();
                 $row = $query -> fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="col-lg-5 text-center">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <br>
                            <!-- <img src="img/banner/banner-2.jpg" alt=""> -->
                            <img src="../dashmin/img/category/<?php echo $row['category_image']?>" alt="" width="420px" height="420px">
                        </div>
                        <div class="banner__item__text">
                            <h2><?php echo $row['category_name']?></h2>
                            <a href="shop.php?catID=<?php echo $row['category_id']?>">Shop now</a>
                        </div>
                    </div>
                </div>
                <?php       
                 $categoryName = "Beauty Collection"; 
                 $query = $pdo -> prepare("select * from tbl_category where category_name = :pn");
                 $query -> bindParam("pn",$categoryName);
                 $query -> execute();
                 $row = $query -> fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="col-lg-7 text-center">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <img src="../dashmin/img/category/<?php echo $row['category_image']?>" alt="" width="420px" height="420px">
                        </div>
                        <div class="banner__item__text">
                            <br>
                            <h2><?php echo $row['category_name']?></h2>
                            <a href="shop.php?catID=<?php echo $row['category_id']?>">Shop now</a>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Best Sellers</li>
                        <?php
                          $productstatus = 'new-arrivals';
                          $query = $pdo -> prepare("select * from tbl_products where product_status=:ps");
                          $query -> bindParam("ps",$productstatus);
                          $query -> execute();
                          $row = $query ->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <li data-filter=".<?php echo $row['product_status']?>">New Arrivals</li>
                        <?php
                          $productstatus = 'hot-sales';
                          $query = $pdo -> prepare("select * from tbl_products where product_status=:ps");
                          $query -> bindParam("ps",$productstatus);
                          $query -> execute();
                          $row = $query ->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <li data-filter=".<?php echo $row['product_status']?>">Hot Sales</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                  <?php
                    $query = $pdo -> query("select * from tbl_products");
                    $row = $query -> fetchAll(PDO::FETCH_ASSOC);
                    foreach($row as $proAll){
                  ?>
                  <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix <?php echo $proAll['product_status'] ?>">
                    <div class="product__item <?= $proAll['product_status']=='hot-sales'?'sale':''?>">
                        <div class="product__item__pic set-bg" data-setbg="../dashmin/img/products/<?php echo $proAll['product_image']?>">
                            <span class="label">
                                <?= $proAll['product_status']=='hot-sales'?'Sale':'New'?>
                            </span>
                            <ul class="product__hover">
                                <li><a href="shop.php"><img src="img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><?php echo $proAll['product_name']?></h6>
                            <a href="shop.php" class="add-cart">+ View Shop</a>
                            <h5>Rs <?php echo $proAll['product_price']?></h5>          
                        </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Categories Section Begin -->
    <section class="categories spad">
        <div class="container">
            <div class="row">

                    <div class="col-lg-3">
                       <div class="categories__text">
                         <h2>
                           <?php
                            $query = $pdo -> query("select * from tbl_category");
                            $row = $query -> fetchAll(PDO::FETCH_ASSOC);
                            foreach($row as $catAll){
                                ?>
                                <h6><a href="shop.php?catID=<?php echo $catAll['category_id']?>"><?php echo $catAll['category_name']?></a><br><br></h6>
                            <?php
                            }
                           ?>
                           </h2>
                       </div>

                    </div>
                    <?php
                          $dealstatus = 'Deal-Of-The-Week';
                          $query = $pdo -> prepare("select * from tbl_products where deal_of_the_week=:dotw");
                          $query -> bindParam("dotw",$dealstatus);
                          $query -> execute();
                          $row = $query ->fetch(PDO::FETCH_ASSOC);
                    ?> 
                <div class="col-lg-4">
                    <div class="categories__hot__deal">
                        <img src="../dashmin/img/products/<?php echo $row['product_image']?>" alt="">
                        <div class="hot__deal__sticker">
                            <span><?php echo $row['product_status']?></span>
                            <h5>Rs <?php echo $row['product_price']?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <span>Deal Of The Week</span>
                        <h2><?php echo $row['product_name']?></h2>
                        <div class="categories__deal__countdown__timer" id="countdown">
                            <div class="cd-item">
                                <span>3</span>
                                <p>Days</p>
                            </div>
                            <div class="cd-item">
                                <span>1</span>
                                <p>Hours</p>
                            </div>
                            <div class="cd-item">
                                <span>50</span>
                                <p>Minutes</p>
                            </div>
                            <div class="cd-item">
                                <span>18</span>
                                <p>Seconds</p>
                            </div>
                        </div>
                        <a href="shop-details.php?proId=<?php echo $row['product_id']?>" class="primary-btn">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Instagram Section Begin -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="instagram__pic">
                        <div class="instagram__pic__item set-bg" data-setbg="../1.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="../2.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="../3.png"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="../4.jpg"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="../5.png"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="../6.png"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="instagram__text">
                        <h2><a href="https://www.instagram.com/accounts/login/" style="color: black;" onmouseover="this.style.color='#333'; this.style.textDecoration='underline';" onmouseout="this.style.color='black'; this.style.textDecoration='none';">Instagram</a></h2>
                        <p>Welcome to Artem Serenity, your sanctuary of creativity and curated elegance. As a stationary shop, we take pride in offering a diverse array of arts, thoughtful gift articles, charming greeting cards, delightful dolls, meticulously crafted files, stylish handbags, wallets, and a touch of beauty products that add a flourish to your everyday life.</p>
                        <h3>#Artem_Serenity</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Latest Blogs</span>
                        <h2> Unveiling the World of Quality</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $query = $pdo ->query("select * from tbl_blog");
                $row = $query -> fetchAll(PDO::FETCH_ASSOC);
                foreach($row as $blog){
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="../dashmin/img/blog/<?php echo $blog["Blog_image"]?>"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 16 February 2020</span>
                            <h5><?php echo $blog['Blog_name']?></h5>
                            <a href="blog.php">Read More</a>
                        </div>
                    </div>
                </div>
                <?php    
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->
<?php
include("footer.php");
?>
  