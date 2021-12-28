<section class="home">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="headline">
                    <div class="nav" id="headline-nav">
                        <a class="left carousel-control" role="button" data-slide="prev">
                            <span class="ion-ios-arrow-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" role="button" data-slide="next">
                            <span class="ion-ios-arrow-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="owl-carousel owl-theme" id="headline">
                        <?php foreach ($posts as $post) : ?>
                        <div class="item">
                            <a href="<?php echo Post_Detail ?>post_detail/<?php echo $post['id'] ?>">
                                <div class="badge">Tip!</div><?php echo $post['title'] ?>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="owl-carousel owl-theme slide" id="featured">
                    <?php foreach ($posts as $key => $value) : ?>
                    <div class="item">
                        <article class="featured">
                            <div class="overlay"></div>
                            <figure>
                                <img src="<?php echo URL_Post_Home ?><?php echo $value['picture'] ?>"
                                    alt="Sample Article">
                            </figure>
                            <div class="details">
                                <div class="category"><a
                                        href="<?php echo Post_Detail ?>PostDetail/<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a>
                                </div>
                                <!-- <h1><a
                                        href="<?php echo Post_Detail ?>post_detail/<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a>
                                </h1> -->
                                <div class="time"><?php echo $value['created_at'] ?></div>
                            </div>
                        </article>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="line">
                    <div>Latest News</div>
                </div>
                <div class="row">

                    <?php
                    $counter = 0;
                    foreach ($latestnew as $key => $value) :
                        $counter++;
                        if ($counter >= 5) {
                            break;
                        }
                    ?>

                    <div class="col-md-6 col-sm-6 col-xs-12" style="height:470px; margin-bottom:70px;">

                        <div class=" row">

                            <article class="article col-md-12">
                                <div class="">
                                    <figure>
                                        <a href="<?php echo Post_Detail ?>Post_Detail/<?php echo $value['id'] ?>">
                                            <img src="<?php echo URL_Post_Home ?><?php echo $value['picture'] ?>"
                                                height="250px" alt="" alt="Sample Article">
                                        </a>
                                    </figure>

                                    <div class="padding">
                                        <div class="detail">
                                            <div class="time"><?php echo $value['created_at']; ?></div>
                                            <div class=" category"><a
                                                    href="category.html"><?php echo $value['category_name']?></a>
                                            </div>
                                        </div>
                                        <h6>
                                            <a href="<?php echo Post_Detail ?>Post_Detail/<?php echo $value['id'] ?>"
                                                style="font-size:14px; height:70px">
                                                <?php echo $value['title']; ?>
                                            </a>
                                        </h6>
                                        <h4 style=" overflow: hidden; display: -webkit-box; -webkit-box-orient:
                                                vertical; -webkit-line-clamp: 3; height:70px;">
                                            <?php echo $value['content'] ?>
                                        </h4>
                                        <footer>
                                            <a href="#" class="love"><i class="ion-android-favorite-outline"></i>
                                                <div>1263</div>
                                            </a>
                                            <a class="btn btn-primary more" type="submit"
                                                href="<?php echo Post_Detail ?>PostDetail/<?php echo $value['id'] ?>"
                                                name="popular">
                                                <div>More</div>
                                                <div><i class="ion-ios-arrow-thin-right"></i></div>
                                            </a>
                                        </footer>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="banner">
                    <a href="#">
                        <img src="Public/asset/images/ads.png" alt="Sample Article">
                    </a>
                </div>
                <div class="line transparent little"></div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 trending-tags">
                        <h1 class="title-col">Trending Tags</h1>
                        <div class="body-col">
                            <ol class="tags-list">
                                <?php foreach ($trendingtags as $value) : ?>
                                <li><a
                                        href="<?php echo Post_Detail ?>PostDetail/<?php echo $value['posts_id'] ?>"><?php echo $value['title'] ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <h1 class="title-col">
                            Hot News
                            <div class="carousel-nav" id="hot-news-nav">
                                <div class="prev">
                                    <i class="ion-ios-arrow-left"></i>
                                </div>
                                <div class="next">
                                    <i class="ion-ios-arrow-right"></i>
                                </div>
                            </div>
                        </h1>
                        <div class="body-col vertical-slider" data-max="4" data-nav="#hot-news-nav" data-item="article">
                            <?php
                            foreach ($posts as $key => $value) :

                            ?>
                            <article class="article-mini">
                                <div class="inner">
                                    <figure>
                                        <a href="<?php echo Post_Detail ?>post_detail/<?php echo $value['id'] ?>">
                                            <img src="<?php echo URL_Post_Home ?><?php echo $value['picture'] ?>"
                                                alt="Sample Article">
                                        </a>
                                    </figure>
                                    <div class="padding">
                                        <h1><a
                                                href="<?php echo Post_Detail ?>post_detail/<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a>
                                        </h1>
                                        <!-- <div class="detail">
                                            <div class="category"><a
                                                    href="<?php echo Post_Detail ?>post_detail/<?php echo $value['id'] ?>"><?php echo $value['content'] ?></a>
                                            </div>
                                            <div class="time"><?php echo $value['created_at'] ?></div>
                                        </div> -->
                                    </div>
                                </div>
                            </article>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>



                <div class="line top">
                    <div>Just Another News</div>
                </div>
                <div class="row">

                    <?php
                    $counter = 0;
                    foreach ($posts as $key => $value) :
                        $counter++;
                        if ($counter >= 5) {
                            break;
                        }
                    ?>
                    <article class="col-md-12 article-list">
                        <div class="inner">
                            <figure>
                                <a href="<?php echo Post_Detail ?>post_detail/<?php echo $value['id'] ?>">
                                    <img src="<?php echo URL_Post_Home ?><?php echo $value['picture'] ?>"
                                        alt="Sample Article">
                                </a>
                            </figure>
                            <div class="details">
                                <div class="detail">
                                    <div class="category">
                                        <a href="#">Film</a>
                                    </div>
                                    <div class="time"><?php echo $value['created_at'] ?></div>
                                </div>
                                <h1><a
                                        href="<?php echo Post_Detail ?>post_detail/<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a>
                                </h1>
                                <p>
                                    <?php echo $value['title'] ?>
                                </p>
                                <footer>
                                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i>
                                        <div>273</div>
                                    </a>
                                    <a class="btn btn-primary more"
                                        href="<?php echo Post_Detail ?>post_detail/<?php echo $value['id'] ?>">
                                        <div>More</div>
                                        <div><i class="ion-ios-arrow-thin-right"></i></div>
                                    </a>
                                </footer>
                            </div>
                        </div>
                    </article>
                    <?php endforeach;  ?>
                    e
                </div>
            </div>
            <div class="col-xs-6 col-md-4 sidebar" id="sidebar">
                <div class="sidebar-title for-tablet">Sidebar</div>
                <aside>
                    <div class="aside-body">
                        <div class="featured-author">
                            <div class="featured-author-inner">
                                <div class="featured-author-cover"
                                    style="background-image: url(' <?php echo URL_Layouts_home ?>img15.jpg');">
                                    <div class="badges">
                                        <div class="badge-item"><i class="ion-star"></i> Featured</div>
                                    </div>
                                    <div class="featured-author-center">
                                        <figure class="featured-author-picture">
                                            <img src="Public/asset/images/img01.jpg" alt="Sample Article">
                                        </figure>
                                        <div class="featured-author-info">
                                            <h2 class="name">Kim Hùng</h2>
                                            <div class="desc">@HùngERIC</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="featured-author-body">
                                    <div class="featured-author-count">
                                        <div class="item">
                                            <a href="#">
                                                <div class="name">Posts</div>
                                                <div class="value">208</div>
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="#">
                                                <div class="name">Stars</div>
                                                <div class="value">3,729</div>
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="#">
                                                <div class="icon">
                                                    <div>More</div>
                                                    <i class="ion-chevron-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="featured-author-quote">
                                        "Eur costrict mobsa undivani krusvuw blos andugus pu aklosah"
                                    </div>
                                    <div class="block">
                                        <h2 class="block-title">Photos</h2>
                                        <div class="block-body">
                                            <ul class="item-list-round" data-magnific="gallery">
                                                <li>
                                                    <a href="<?php echo URL_Layouts_home ?>img06.jpg"
                                                        style="background-image: url('<?php echo URL_Layouts_home ?>img06.jpg');"></a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo URL_Layouts_home ?>img07.jpg"
                                                        style="background-image: url('<?php echo URL_Layouts_home ?>img07.jpg');"></a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo URL_Layouts_home ?>img08.jpg"
                                                        style="background-image: url('<?php echo URL_Layouts_home ?>img08.jpg');"></a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo URL_Layouts_home ?>img09.jpg"
                                                        style="background-image: url('<?php echo URL_Layouts_home ?>img09.jpg');"></a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo URL_Layouts_home ?>img10.jpg"
                                                        style="background-image: url('<?php echo URL_Layouts_home ?>img10.jpg');"></a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo URL_Layouts_home ?>img11.jpg"
                                                        style="background-image: url('<?php echo URL_Layouts_home ?>img11.jpg');"></a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo URL_Layouts_home ?>img12.jpg"
                                                        style="background-image: url('<?php echo URL_Layouts_home ?>img12.jpg');">
                                                        <div class="more">+2</div>
                                                    </a>
                                                </li>
                                                <li class="hidden">
                                                    <a href="<?php echo URL_Layouts_home ?>img13.jpg"
                                                        style="background-image: url('<?php echo URL_Layouts_home ?>img13.jpg');"></a>
                                                </li>
                                                <li class="hidden">
                                                    <a href="<?php echo URL_Layouts_home ?>img14.jpg"
                                                        style="background-image: url('<?php echo URL_Layouts_home ?>img14.jpg');"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="featured-author-footer">
                                        <a href="#">See All Authors</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <aside>
                    <h1 class="aside-title">Popular <a href="#" class="all"></a>
                    </h1>
                    <div class="aside-body">
                        <?php
                        $counter = 0;
                        foreach ($popular as $key => $value) :
                            $counter++;
                            if ($counter >= 7) {
                                break;
                            }
                        ?>
                        <article class="article-mini">
                            <div class="inner">
                                <figure>
                                    <a href="<?php echo Post_Detail ?>postDetail/<?php echo $value['id'] ?>">
                                        <img src="<?php echo URL_Post_Home ?><?php echo $value['picture'] ?>"
                                            alt="Sample Article">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <h1><a
                                            href="<?php echo Post_Detail ?>post_detail/<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a>
                                    </h1>
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
                <aside>
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li class="active">
                            <a href="#recomended" aria-controls="recomended" role="tab" data-toggle="tab">
                                <i class="ion-android-star-outline"></i> Recomended
                            </a>
                        </li>
                        <li>
                            <a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">
                                <i class="ion-ios-chatboxes-outline"></i> Comments
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="recomended">

                            <?php
                            $counter = 0;
                            foreach ($recomended as $key => $value) :
                                $counter++;
                                if ($counter >= 2) {
                                    break;
                                } ?>

                            <article class="article-fw">
                                <div class="inner">
                                    <figure>
                                        <a href="<?php echo Post_Detail ?>postDetail/<?php echo $value['id'] ?>">
                                            <img src="<?php echo URL_Post_Home ?><?php echo $value['picture'] ?>"
                                                alt="Sample Article">
                                        </a>
                                    </figure>
                                    <div class="details">
                                        <div class="detail">
                                            <div class="time"><?php echo $value['created_at'] ?></div>
                                            <div class="category"><a href="category.html">Sport</a></div>
                                        </div>

                                        <h6 style="overflow: hidden;
                                        display: -webkit-box;
                                        -webkit-box-orient: vertical;
                                        -webkit-line-clamp: 3;">
                                            <?php echo $value['title'] ?>
                                        </h6>
                                    </div>
                                </div>
                            </article>
                            <?php endforeach; ?>

                            <div class="line"></div>

                        </div>
                        <div class="tab-pane comments" id="comments">
                            <div class="comment-list sm">
                                <?php foreach ($commenttop as  $value) : ?>
                                <div class="item">
                                    <div class="user">
                                        <figure>
                                            <img src="<?php echo URL_USER_Home . $value['avatar'] ?>"
                                                alt="User Picture">
                                        </figure>
                                        <div class="details">
                                            <p class="name"><?php echo $value['name'] ?></p>

                                            <div>
                                                <a
                                                    href="<?php echo Post_Detail ?>postDetail/<?php echo $value['id'] ?>">
                                                    <?php echo $value['title'] ?>
                                                </a>
                                            </div>
                                            <div class="description">
                                                <?php echo $value['comment'] ?>.
                                            </div>
                                            <div class="time"><?php echo $value['created_at'] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </aside>
                <aside>
                    <h1 class="aside-title">Videos
                    </h1>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/v64KOxKVLVg"
                            allowfullscreen></iframe>
                    </div>
                </aside>
                <aside id="sponsored">
                    <h1 class="aside-title">Sponsored</h1>
                    <div class="aside-body">
                        <ul class="sponsored">
                            <li>
                                <a href="#">
                                    <img src="Public/asset/images/img01.jpg" alt="Sponsored">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="Public/asset/images/img01.jpg" alt="Sponsored">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="Public/asset/images/img01.jpg" alt="Sponsored">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="Public/asset/images/img01.jpg" alt="Sponsored">
                                </a>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<section class="best-of-the-week">
    <div class="container">
        <h1>
            <div class="text">Best Of The Week</div>
            <div class="carousel-nav" id="best-of-the-week-nav">
                <div class="prev">
                    <i class="ion-ios-arrow-left"></i>
                </div>
                <div class="next">
                    <i class="ion-ios-arrow-right"></i>
                </div>
            </div>
        </h1>
        <div class="owl-carousel owl-theme carousel-1">
            <?php foreach ($best_of_the_week as $key => $value) : ?>
            <article class="article">
                <div class="inner">
                    <figure>
                        <a href="<?php echo Post_Detail ?>post_detail/<?php echo $value['id'] ?>">
                            <img src="<?php echo URL_Post_Home ?><?php echo $value['picture'] ?>" alt="Sample Article">
                        </a>
                    </figure>
                    <div class="padding">
                        <div class="detail">
                            <div class="time">
                                <?php echo $value['created_at'] ?>
                            </div>
                            <div class="category"><a href="category.html">Travel</a></div>
                        </div>
                        <h2><a href="<?php echo Post_Detail ?>post_detail/<?php echo $value['id'] ?>">
                                <?php echo $value['title'] ?></a></h2>
                        <h6
                            style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3;">
                            <?php echo $value['content'] ?>
                        </h6>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
include('App/View/Home/Layouts/footer.php');
?>