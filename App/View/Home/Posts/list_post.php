<?php session_start(); ?>
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
<section class="category">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="#">List Post</a></li>
                            <!-- // <li class="active">Computer</li> -->
                        </ol>
                        <h1 class="page-title">List Post</h1>
                        <p class="page-subtitle">Show All <i>Posts</i></p>
                    </div>
                </div>
                <div class="line"></div>
                <div class="row">
                    <?php foreach ($posts as $post) : ?>
                    <article class="col-md-6 col-sm-6 col-xs-12 article-list">
                        <div class="inner">
                            <figure>
                                <a href="<?php echo Post_Detail ?>post_detail/<?php echo $post['id'] ?>">
                                    <img src="<?php echo URL_IMAGE_POST ?><?php echo $post['picture'] ?>" alt="">
                                </a>
                            </figure>
                            <div class="details">
                                <div class="detail">
                                    <div class="category">
                                        <a href="category.html">Film</a>
                                    </div>
                                    <div class="time"><?php echo $post['created_at'] ?></div>
                                </div>
                                <h1><a
                                        href="<?php echo Post_Detail ?>post_detail/<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a>
                                </h1>
                                <p>
                                    <?php echo $post['content'] ?>
                                </p>
                                <footer>
                                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i>
                                        <div>237</div>
                                    </a>
                                    <a class="btn btn-primary more"
                                        href="<?php echo Post_Detail ?>post_detail/<?php echo $post['id'] ?>">
                                        <div>More</div>
                                        <div><i class="ion-ios-arrow-thin-right"></i></div>
                                    </a>
                                </footer>
                            </div>
                        </div>
                    </article>
                    <?php endforeach; ?>

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