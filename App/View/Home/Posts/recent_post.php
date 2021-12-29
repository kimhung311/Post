<!-- Bootstrap -->
<link rel="stylesheet" href="../../Public/asset/scripts/bootstrap/bootstrap.min.css">
<!-- IonIcons -->
<link rel="stylesheet" href="../../Public/asset/scripts/ionicons/css/ionicons.min.css">
<!-- Toast -->
<link rel="stylesheet" href="../../Public/asset/scripts/toast/jquery.toast.min.css">
<!-- OwlCarousel -->
<link rel="stylesheet" href="../../Public/asset/scripts/owlcarousel/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="../../Public/asset/scripts/owlcarousel/dist/assets/owl.theme.default.min.css">
<!-- Magnific Popup -->
<link rel="stylesheet" href="../../Public/asset/scripts/magnific-popup/dist/magnific-popup.css">
<link rel="stylesheet" href="../../Public/asset/scripts/sweetalert/dist/sweetalert.css">
<!-- Custom style -->
<link rel="stylesheet" href="../../Public/asset/css/style.css">
<link rel="stylesheet" href="../../Public/asset/css/skins/all.css">
<link rel="stylesheet" href="../../Public/asset/css/demo.css">
<section class="single">
    <?php include('App/View/Message/message.php') ?>


    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <!-- <li class="active">
                       
                    <!-- </li> --> -->
                </ol>
                <div class="title">
                    <p style="font: size 40px;"><?php echo $postbyid['title'] ?></p>
                </div>
                <article class="article main-article">
                    <header>
                        <ul class="details">
                            <li><?php echo $postbyid['created_at'] ?></li>
                            <!-- <li><a>Film</a></li>
                            <li>By <a href="#">John Doe</a></li> -->
                        </ul>
                    </header>
                    <div class="main">
                        <p><img src="<?php echo URL_Detail ?><?php echo $postbyid['image_detail'] ?>" width="700px"
                                alt="">
                        </p>
                        <p><?php echo $postbyid['content'] ?>.</p>
                        <div class="featured">
                            <figure>
                                <img src="<?php echo URL_Post_Detail ?><?php echo $postbyid['picture'] ?>">

                            </figure>
                        </div>
                        <div class="title">

                            <span><?php echo $postbyid['description'] ?></span>
                        </div>
                    </div>
                    <footer>

                        <div class="col-6">
                            <a href="#" class="love"><i class="ion-android-favorite-outline"></i>
                                <div>1220</div>
                            </a>
                        </div>
                    </footer>

                </article>

                <div class="line thin"></div>
                <div class="comments">
                    <h2 class="title"> Responses <a href="#">Write a Response</a></h2>
                    <?php foreach ($commentbyid as $comment) :  ?>
                    <div class="comment-list">
                        <div class="item">
                            <div class="user">
                                <figure>
                                    <img src="<?php echo URL_USER_Home . $value['avatar'] ?>">
                                </figure>
                                <div class="details">
                                    <h5 class="name"><?php echo $comment['comment'] ?></h5>
                                    <div class="time"><?php echo $comment['created_at'] ?></div>
                                    <div class="description">

                                    </div>
                                    <footer>
                                        <a href="#">Reply</a>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <form class="row" " action=" <?php echo Post_Detail ?>insertComment" method="post" role="form"
                        enctype="multipart/form">
                        <div class="col-md-12">
                            <h3 class="title">Leave Your Response</h3>
                        </div>
                        <div class="form-group">
                            <input type="hidden" namne="user_id">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="post_id" value="<?php echo $postbyid['id']; ?>">

                        </div>

                        <div class="form-group col-md-12">
                            <label for="message">Response <span class="required"></span></label>
                            <textarea class="form-control" name="comment"
                                placeholder="Write your response ..."></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <button class="btn btn-primary" type="submit" name="insertComment">Send Response</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<?php
include('App/View/Home/Layouts/footer.php');
?>

<script src="../../Public/asset/js/jquery.js"></script>
<script src="../../Public/asset/js/jquery.migrate.js"></script>
<script src="../../Public/asset/scripts/bootstrap/bootstrap.min.js"></script>
<script>
var $target_end = $(".best-of-the-week");
</script>
<script src="../../Public/asset/scripts/jquery-number/jquery.number.min.js"></script>
<script src="../../Public/asset/scripts/owlcarousel/dist/owl.carousel.min.js"></script>
<script src="../../Public/asset/scripts/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="../../Public/asset/scripts/easescroll/jquery.easeScroll.js"></script>
<script src="../../Public/asset/scripts/sweetalert/dist/sweetalert.min.js"></script>
<script src="../../Public/asset/scripts/toast/jquery.toast.min.js"></script>
<script src="../../Public/asset/js/demo.js"></script>
<script src="../../Public/asset/js/e-magz.js"></script>