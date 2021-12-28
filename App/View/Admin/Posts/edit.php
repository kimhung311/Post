<div class="main-panel ">

    <h1>
        <legend class="text-center">Edit Post</legend>
    </h1>

    <form class="row g-3 needs-validation" novalidate
        action="<?php echo BASE_URL ?>post/updatePost/<?php echo $postbyid['id'] ?>" method="POST" role="form"
        enctype="multipart/form-data" style="width:1200px; margin:0 auto;">



        <div class="form-outline col-md-6 mb-5">
            <label for="inputGroupSelect01">Category_Name</label>
            <select class="custom-select" id="inputGroupSelect01" name="category_id">
                <?php foreach ($categories as $key => $value) : ?>
                <option value="<?php echo $value['id'] ?>">
                    <?php echo $value['category_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">


        <div class=" form-outline col-md-6 mb-5">
            <label for="inputGroupSelect02">Title</label>
            <input type="text" name="title" id="inputGroupSelect02" class="form-control"
                value="<?php echo $postbyid['title'] ?>" required>
            <div class="invalid-feedback">Please provide a valid title.</div>
        </div>

        <div class="form-outline col-md-12 mb-5">
            <label for="inputGroupSelect02">Content</label>
            <textarea class="form-control mytextarea" type="text" name="content" id="inputGroupSelect02" cols="140"
                rows="10" placeholder="Enter yourcContent" required><?php echo $postbyid['content'] ?></textarea>
            <div class="invalid-feedback">Please provide a valid Content.</div>
        </div>

        <div class="form-outline col-md-12 mb-5">
            <label for="inputGroupSelect02">Description</label>
            <textarea class="form-control mytextarea" type="text" name="description" id="inputGroupSelect02" cols="140"
                rows="10" placeholder="Enter your Description"
                required><?php echo $postbyid['description'] ?></textarea>
            <div class="invalid-feedback">Please provide a valid Description.</div>
        </div>

        <div class="form-outline col-md-6 mb-5">
            <label for=""> picture </label>
            <input name="picture" type="file" class="form-control" id="" placeholder="Input title"
                value="<?php echo $postbyid['picture'] ?>">
            <img src="../../Public/Image-post/<?php echo $postbyid['picture'] ?> " w="200" height="150" alt="
                   <?php echo $postbyid['picture'] ?>">

        </div>

        <div class="form-outline col-md-6 mb-5">
            <label for=""> Image_detail </label>
            <input name="image_detail" type="file" value="" class="form-control" id="" placeholder="Input title"
                value="<?php echo $postbyid['image_detail'] ?>">
            <img src="../../Public/image-post-detail/<?php echo $postbyid['image_detail'] ?> " w="200" height="150"
                alt="<?php echo $postbyid['image_detail'] ?>">
        </div>


        <button type=" submit" name="updatepost" class="btn btn-primary btn-lg btn-block">SAVE</button>
    </form>

</div>
</div>
</div>

<script>
tinymce.init({
    selector: '.mytextarea'
});
</script>

<script type="text/javascript">
// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict';

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach((form) => {
        form.addEventListener('submit', (event) => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();
</script>