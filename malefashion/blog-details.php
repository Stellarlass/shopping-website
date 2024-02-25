<?php
include("header.php");
if(isset($_GET['BlogId'])){
    $BlogId = $_GET['BlogId'];
    $query = $pdo -> prepare("select * from tbl_blog where Blog_id = :bid");
    $query -> bindParam("bid",$BlogId);
    $query -> execute();
    $detail_blog = $query -> fetch(PDO::FETCH_ASSOC);
}else{
    echo "<script>
    alert('No id found');
    location.assign('blog.php');
    </script>";
}
?>

    <!-- Blog Details Hero Begin -->
    <section class="blog-hero spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9 text-center">
                    <div class="blog__hero__text">
                        <h2><?php $detail_blog['Blog_name'] ?></h2>
                        <ul>
                            <li>By <?php echo $detail_blog['Blog_author'] ?></li>
                            <li>February 21, 2019</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="blog__details__pic">
                        <img src="../dashmin/img/blog/<?php echo $detail_blog['Blog_image'] ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <div class="blog__details__share">
                            <span>share</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="blog__details__text">
                            <p><?php echo $detail_blog['Blog_detail']?></p>
                        </div>
                        <div class="blog__details__quote">
                            <i class="fa fa-quote-left"></i>
                            <p>“<?php echo $detail_blog['Blog_name']?>”</p>
                            <h6>_ <?php echo $detail_blog['Blog_author']?>_</h6>
                        </div>
                       
                        <div class="blog__details__option">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="blog__details__author">
                                        <div class="blog__details__author__pic">
                                            <img src="img/blog/details/blog-author.jpg" alt="">
                                        </div>
                                        <div class="blog__details__author__text">
                                            <h5><?php echo $detail_blog['Blog_author']?></h5>
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
    <!-- Blog Details Section End -->
<?php
include("footer.php");
?>