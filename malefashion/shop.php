<?php
include("header.php");
?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll"> 
                                                    <?php
                                                    $query = $pdo -> query("select * from tbl_category");
                                                    $row = $query -> fetchAll(PDO::FETCH_ASSOC);
                                                    foreach($row as $catAll){
                                                        ?>
                                                        <li><a href="shop.php?catID=<?php echo $catAll['category_id']?>"><?php echo $catAll['category_name']?></a></li>
                                                    <?php    
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                    <?php
                                                    $query = $pdo -> query("select distinct product_brand from tbl_products");
                                                    $row = $query -> fetchAll(PDO::FETCH_ASSOC);
                                                    foreach($row as $catAll){
                                                        ?>
                                                        <li><a><?php echo $catAll['product_brand']?></a></li>
                                                    <?php    
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseSix">Tags</a>
                                    </div>
                                    <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__tags">
                                               
                                                <a href="#">Bags</a>
                                                <a href="#">Makeup</a>
                                                <a href="#">Stationary</a>
                                                <a href="#">Gifts</a>
                                                <a href="#">Greeting Cards</a>
                                                <a href="#">Art</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <?php
                        if(isset($_GET['catID'])){
                            $catID = $_GET['catID'];
                            $query = $pdo -> prepare("select * from tbl_products where product_cat_id = :pcid");
                            $query -> bindParam("pcid",$catID);
                            $query -> execute();
                            $row = $query ->fetchAll(PDO::FETCH_ASSOC);
                            foreach($row as $proAll){
                                ?>
                                 <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item <?= $proAll['product_status']=='hot-sales'?'sale':''?>">
                                      <div class="product__item__pic set-bg" data-setbg="<?php echo $productImageAddress.$proAll['product_image'] ?>">
                                         <?= $proAll['product_status']=='hot-sales'?'<span class="label">Sale</span>':'<span class="label">New</span>'?>
                                         <ul class="product__hover">
                                            </li>
                                            <li><a href="shop-details.php?proId=<?php echo $proAll['product_id']?>"><img src="img/icon/search.png" alt=""></a></li>
                                         </ul>
                                      </div>
                                      <div class="product__item__text">
                                           <h6><?php echo $proAll['product_name']?></h6>
                                           <a href="shop-details.php?proId=<?php echo $proAll['product_id']?>" class="add-cart">+ View Detail</a>
                                           <h5>Rs <?php echo $proAll['product_price']?></h5>
                                      </div>
                                    </div>
                                 </div>
                            <?php    
                            }
                        }else{
                            $query = $pdo -> query("select * from tbl_products");
                            $row = $query ->fetchAll(PDO::FETCH_ASSOC);
                            foreach($row as $proAll){
                                ?>
                                 <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item <?= $proAll['product_status']=='hot-sales'?'sale':''?>">
                                      <div class="product__item__pic set-bg" data-setbg="<?php echo $productImageAddress.$proAll['product_image'] ?>">
                                         <?= $proAll['product_status']=='hot-sales'?'<span class="label">Sale</span>':'<span class="label">New</span>'?>
                                         <ul class="product__hover">
                                         
                                            <li><a href="shop-details.php?proId=<?php echo $proAll['product_id']?>"><img src="img/icon/search.png" alt=""></a></li>
                                         </ul>
                                      </div>
                                      <div class="product__item__text">
                                           <h6><?php echo $proAll['product_name']?></h6>
                                           <a href="shop-details.php?proId=<?php echo $proAll['product_id']?>" class="add-cart">+ View Detail</a>
                                           <h5>Rs <?php echo $proAll['product_price']?></h5>
                                           
                                      </div>
                                    </div>
                                 </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
<?php
include("footer.php");
?>