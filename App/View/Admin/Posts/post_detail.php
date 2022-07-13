<div class="main-panel">
    <div class="col-8 mx-auto mt-5 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail Post</h4>
                <a href="<?php echo BASE_URL ?>post/index"" class=" btn btn-info col-2"><i
                        class=" fa fa-calendar-plus fa-5x"></i>
                    Back List Post
                </a>
                <a href="<?php echo BASE_URL ?>/Post/editPost/<?php echo $postviewbyid['post_id'] ?>"
                    class="btn btn-danger col-2 ">Edit <i class="far fa-edit fa-5x" style="font-size:24px"></i></a></a>
                <form class="form-sample">
                    <p class="card-description"></p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><b>Title</b></label>
                                <div class="col-sm-9">

                                    <p><?php echo $postviewbyid['title'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><b>Category Name</b></label>
                                <div class="col-sm-9">

                                    <p> <?php echo $postviewbyid['category_name'] ?> </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><b>User Name</b></label>
                                <div class="col-sm-9">

                                    <p><?php echo $postviewbyid['user_name'] ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><b>Author Name</b></label>
                                <div class="col-sm-9">
                                    <?php foreach ($user as $key => $value) { ?>
                                    <?php if ($postviewbyid['author_id'] == $value['id']) {
                                            echo $value['name'];
                                        } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><b>Hot New</b></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value=<?php if ($postviewbyid['hot_new'] == true) {
                                        echo 'Hot';
                                    } else {
                                        echo 'Unhot';
                                    } ?>>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><b>Content</b></label>
                                <div class="col-sm-9">

                                    <p><?php echo $postviewbyid['content'] ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><b>Picture</b></label>
                                <div class="col-sm-9">
                                    <img src="<?php echo URL_Post_Detail . $postviewbyid['picture'] ?>"
                                        style="width:400px ;height:200px;border-radius: inherit;" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><b>Description</b></label>
                                <div class="col-sm-9">
                                    <!-- <input type="text" class="form-control"
                                        value="<?php echo $postviewbyid['description'] ?>"> -->
                                    <p><?php echo $postviewbyid['description'] ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><b>Image_detail</b></label>
                                <div class="col-sm-9">
                                    <img src="<?php echo URL_Detail . $postviewbyid['image_detail'] ?>"
                                        style="width:400px ;height:200px;border-radius: inherit;" alt="">
                                </div>
                            </div>
                        </div>

                    </div>

            </div>



            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
<script>
tinymce.init({
    selector: '.mytextarea'
});
</script>