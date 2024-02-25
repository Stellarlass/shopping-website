<?php
include("header.php");
?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Our Blog</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
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
                            <a href="blog-details.php?BlogId=<?php echo $blog['Blog_id'] ?>">Read More</a>
                        </div>
                    </div>
                </div>
                <?php    
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
<?php
include("footer.php");
?>