<?php
include("header.php");
?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Feedback</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>Feedback</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 30px;
            cursor: pointer;
            color: #ddd;
        }

        .star-rating input:checked ~ label {
            color: #ffcc00;
        }
    </style>
</head>
<body>
<section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 mx-auto text-center">
                    <div class="contact__form">
                        <form action="" method="post">
                       
                            <div class="row">
                                <div class="col-lg-8">
                                <h5 class="text-center"> How was your experience shopping? </h5>
                                </div>
                                <br>
                                <div class="col-lg-8">
                                    <input type="text" name="user_id" required placeholder="User Id" value="<?php echo $_SESSION['userId'] ?>">
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="product_name" required placeholder="Product" value="<?php echo  $_SESSION['productname']?>">
                                </div>
                                <div class="col-lg-8">
                                   <textarea name="feedback_text" rows="4" placeholder="Your Valuable Feedback" required></textarea>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="order_number" required placeholder="order_id" value="<?php echo $_SESSION['ordernumber'] ?>">
                                </div>
                                <div class="star-rating col-lg-8">
                                        <input type="radio" name="rating" value="1" id="star1">
                                        <label for="star1">&#9733;</label>
                                        <input type="radio" name="rating" value="2" id="star2">
                                        <label for="star2">&#9733;</label>
                                        <input type="radio" name="rating" value="3" id="star3">
                                        <label for="star3">&#9733;</label>
                                        <input type="radio" name="rating" value="4" id="star4">
                                        <label for="star4">&#9733;</label>
                                        <input type="radio" name="rating" value="5" id="star5">
                                        <label for="star5">&#9733;</label>
                                </div>
                                <div class="col-lg-8">
                                    
                                    <button type="submit" class="site-btn" name="feedback">Submit Feedback</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>            


</body>
</html>
<?php
include("footer.php");
?>
