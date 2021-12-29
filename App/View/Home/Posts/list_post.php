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
                    <?php foreach ($list_posts as $post) : ?>
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
                                        <a href="">Film</a>
                                    </div>
                                    <div class="time"><?php echo $post['created_at'] ?></div>
                                </div>
                                <h6><a
                                        href="<?php echo Post_Detail ?>post_detail/<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a>
                                </h6>
                                <h5 style=" display: -webkit-box;
                                        max-width: 100%;
                                        height: 98px;
                                        margin: 0 auto;
                                        font-size: 14px;
                                        line-height: 1;
                                        -webkit-line-clamp: 3;
                                        -webkit-box-orient: vertical;
                                        overflow: hidden;
                                        text-overflow: ellipsis;">
                                    <?php echo $post['content'] ?>
                                </h5>
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
                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $offset = 3; // số link trưuóc và sau khi hiện hành
                $row = 3;  // đọ lớn hiẻn thị limit 1 trang
                $from = ($page - 1) * $row;

                $colum = $page - 3;
                $to = $page + 3;
                $colum = $page - $offset;
                if ($colum < 1) $colum = 1;
                $to = $page + $offset;
                $Previous = $page - 1;
                $Next = $page + 1;
                // if($to > $pagenum) $to
                ?>
                <div class="col-md-12 text-center">
                    <ul class="pagination">
                        <?php if ($page > 1) { ?>
                        <li class="prev"><a class="page-link btn btn-outline-warning"
                                href="<?php echo Post_Detail ?>listPosts&page=<?php echo $Previous; ?>">Prev</a>
                        </li>
                        <?php } ?>
                        <?php

                        for ($i = $colum; $i < $to; $i++) {
                        ?>
                        <li class="page-item "><a class="page-link btn btn-outline-warning"
                                href="<?php echo Post_Detail ?>listPosts&page=<?php echo $i ?>"><?php echo $i ?></a>
                        </li>
                        <?php } ?>
                        <?php if ($colum >= $page) { ?>
                        <li class="next"><a class=" btn btn-outline-warning"
                                href="<?php echo Post_Detail ?>listPosts&page=<?php echo $Next; ?>">Next</a>
                        </li>
                        <?php } ?>
                    </ul>
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