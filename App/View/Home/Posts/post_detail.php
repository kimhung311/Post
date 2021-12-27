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
            <div class="col-md-4 sidebar" id="sidebar">
                <aside>
                    <div class="aside-body">
                        <figure class="ads">
                            <img src="../../Public/asset/images/ad.png">
                            <figcaption>Advertisement</figcaption>
                        </figure>
                    </div>
                </aside>
                <aside>
                    <h1 class="aside-title">Recent Post</h1>
                    <div class="aside-body">
                        <?php
                        $counter = 0;
                        foreach ($posts as $key => $value) :
                            $counter++;
                            if ($counter >= 2) {
                                break;
                            }
                        ?>
                        <article class="article-fw">
                            <div class="inner">
                                <figure>
                                    <a href="<?php echo Post_Detail ?>post_detail/<?php echo $value['id']; ?>">
                                        <img src="<?php echo URL_Post_Detail ?><?php echo $value['picture'] ?>">
                                    </a>
                                </figure>
                                <div class="details">
                                    <h1><a href="<?php echo Post_Detail ?>post_detail/<?php echo $value['id']; ?>"><?php echo $value['title'] ?>
                                        </a></h1>
                                    <h6 style="overflow: hidden;
                                        display: -webkit-box;
                                        -webkit-box-orient: vertical;
                                        -webkit-line-clamp: 3;">
                                        <?php echo $value['content'] ?>
                                    </h6>
                                    <div class="detail">
                                        <div class="time"><?php echo $value['created_at'] ?></div>
                                        <div class="category"><a href="category.html">Lifestyle</a></div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php endforeach; ?>

                        <!-- <div class="line"></div>    -->
                        <?php
                        $counter = 0;
                        foreach ($posts as $key => $value) :
                            $counter++;
                            if ($counter >= 4) {
                                break;
                            }
                        ?>
                        <article class="article-mini">
                            <div class="inner" style="height:75px; margin-top:20px;">
                                <figure>
                                    <a href="<?php echo Post_Detail ?>post_detail/<?php echo $value['id']; ?>">
                                        <img src="<?php echo URL_Post_Detail ?><?php echo $value['picture'] ?>">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <h1><a
                                            href="<?php echo Post_Detail ?>post_detail/<?php echo $value['id']; ?>"><?php echo $value['title'] ?></a>
                                    </h1>

                                    <div class="detail">
                                        <div class="category"><a href="category.html">Lifestyle</a></div>
                                        <div class="time"><?php echo $value['created_at'] ?>"</div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php endforeach; ?>
                    </div>
                </aside>
                <aside>
                    <div class="aside-body">
                        <form class="newsletter">
                            <div class="icon">
                                <i class="ion-ios-email-outline"></i>
                                <h1>Newsletter</h1>
                            </div>
                            <div class="input-group">
                                <input type="email" class="form-control email" placeholder="Your mail">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
                                </div>
                            </div>
                            <p>By subscribing you will receive new articles in your email.</p>
                        </form>
                    </div>
                </aside>
            </div>
            <div class="col-md-8">
                <?php foreach ($postbyid as $post) : ?>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">
                        <?php echo $post['name']; ?>
                    </li>
                </ol>
                <div class="title">
                    <p style="font: size 40px;"><?php echo $post['title'] ?></p>
                </div>
                <article class="article main-article">
                    <header>
                        <ul class="details">
                            <li><?php echo $post['created_at'] ?></li>
                            <!-- <li><a>Film</a></li>
                            <li>By <a href="#">John Doe</a></li> -->
                        </ul>
                    </header>
                    <div class="main">
                        <p><?php echo $post['content'] ?>.</p>
                        <div class="featured">
                            <figure>
                                <img src="<?php echo URL_Post_Detail ?><?php echo $post['picture'] ?>">
                                <figcaption><?php echo $post['name'] ?></figcaption>
                            </figure>
                        </div>
                        <div class="title">

                            <span><?php echo $post['description'] ?></span>
                        </div>
                    </div>
                    <footer>
                        <div class="col-6">
                            <ul class="tags">
                                <li><a href="#">Free Themes</a></li>
                                <li><a href="#">Bootstrap 3</a></li>
                                <li><a href="#">Responsive Web Design</a></li>
                                <li><a href="#">HTML5</a></li>
                                <li><a href="#">CSS3</a></li>
                                <li><a href="#">Web Design</a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <a href="#" class="love"><i class="ion-android-favorite-outline"></i>
                                <div>1220</div>
                            </a>
                        </div>
                    </footer>

                </article>
                <?php endforeach; ?>
                <div class="sharing">
                    <div class="title"><i class="ion-android-share-alt"></i> Sharing is caring</div>
                    <ul class="social">
                        <li>
                            <a href="#" class="facebook">
                                <i class="ion-social-facebook"></i> Facebook
                            </a>
                        </li>
                        <li>
                            <a href="#" class="twitter">
                                <i class="ion-social-twitter"></i> Twitter
                            </a>
                        </li>
                        <li>
                            <a href="#" class="googleplus">
                                <i class="ion-social-googleplus"></i> Google+
                            </a>
                        </li>
                        <li>
                            <a href="#" class="linkedin">
                                <i class="ion-social-linkedin"></i> Linkedin
                            </a>
                        </li>
                        <li>
                            <a href="#" class="skype">
                                <i class="ion-ios-email-outline"></i> Email
                            </a>
                        </li>
                        <li class="count">
                            20
                            <div>Shares</div>
                        </li>
                    </ul>
                </div>
                <div class="line">
                    <div>Author</div>
                </div>
                <div class="author">
                    <figure>
                        <img src="images/img01.jpg">
                    </figure>
                    <div class="details">
                        <div class="job">Web Developer</div>
                        <h3 class="name">Eric HUNG</h3>
                        <p>Nulla sagittis rhoncus nisi, vel gravida ante. Nunc lobortis condimentum elit, quis porta
                            ipsum rhoncus vitae. Curabitur magna leo, porta vel fringilla gravida, consectetur in
                            libero. Duis aute irure dolor in reprehenderit
                            in voluptate velit esse cillum.</p>
                        <ul class="social trp sm">
                            <li>
                                <a href="#" class="facebook">
                                    <svg>
                                        <rect />
                                    </svg>
                                    <i class="ion-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="twitter">
                                    <svg>
                                        <rect />
                                    </svg>
                                    <i class="ion-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="youtube">
                                    <svg>
                                        <rect />
                                    </svg>
                                    <i class="ion-social-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="googleplus">
                                    <svg>
                                        <rect />
                                    </svg>
                                    <i class="ion-social-googleplus"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="line">
                    <div>You May Also Like</div>
                </div>
                <div class="row">

                    <?php
                    $counter = 0;
                    foreach ($post_relate as $key => $value) :
                        $counter++;
                        if ($counter >= 3) {
                            break;
                        }
                    ?>
                    <article class="article related col-md-6 col-sm-6 col-xs-12">
                        <div class="inner">
                            <figure>
                                <a href="<?php echo Post_Detail ?>post_detail/<?php echo $value['id']; ?>">
                                    <img src="<?php echo URL_Post_Detail ?><?php echo $value['picture'] ?>">
                                </a>
                            </figure>
                            <div class="padding">
                                <h2><a
                                        href="<?php echo Post_Detail ?>post_detail/<?php echo $value['id']; ?>"><?php echo $value['title'] ?></a>
                                </h2></a></h2>
                                <div class="detail">
                                    <div class="category"><a href="category.html">Lifestyle</a></div>
                                    <div class="time"><?php echo $value['created_at'] ?></div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
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
                    <form class="row" " action=" <?php echo Post_Detail ?>insertcomment" method="post" role="form"
                        enctype="multipart/form">
                        <div class="col-md-12">
                            <h3 class="title">Leave Your Response</h3>
                        </div>
                        <div class="form-group">
                            <input type="hidden" namne="user_id">
                        </div>
                        <?php foreach ($postbyid as $post) : ?>
                        <div class="form-group">
                            <input type="hidden" name="post_id" value="<?php echo $post['id'] ?>">

                        </div>
                        <?php endforeach; ?>

                        <div class="form-group col-md-12">
                            <label for="message">Response <span class="required"></span></label>
                            <textarea class="form-control" name="comment"
                                placeholder="Write your response ..."></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <button class="btn btn-primary" type="submit" name="insertcomment">Send Response</button>
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