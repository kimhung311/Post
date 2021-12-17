   <?php include('App/View/Admin/Layouts/master.php') ?>
   <div class="main-panel ">

       <h1>
           <legend class="text-center">Edit Post</legend>
       </h1>
       <?php
        foreach ($postbyid as $post) :
        ?>
       <form class="row g-3 needs-validation" novalidate
           action="<?php echo BASE_URL ?>post/updatepost/<?php echo $post['id'] ?>" method="POST" role="form"
           enctype="multipart/form-data" style="width:1200px; margin:0 auto;">


           <div class="form-outline col-md-4 mb-5">
               <label for="">Category Name </label>
               <input name="name" type="text" value="<?php echo $post['name'] ?> " class="form-control" id=""
                   placeholder="Input field">
           </div>

           <div class="form-outline col-md-4 mb-5">
               <label for="inputGroupSelect01">Categories</label>
               <select class="custom-select" id="inputGroupSelect01" name="category_id">
                   <?php foreach ($categories as $key => $value) : ?>
                   <option value="<?php echo $value['id'] ?>">
                       <?php echo $value['category_name'] ?></option>
                   <?php endforeach; ?>
               </select>
           </div>

           <div class="form-outline col-md-4 mb-5">
               <label for="inputGroupSelect01">Admin</label>
               <select class="custom-select" id="inputGroupSelect01" name="user_id">
                   <?php foreach ($user as $key => $value) : ?>
                   <option value="<?php echo $value['id'] ?>">
                       <?php echo $value['name'] ?></option>
                   <?php endforeach; ?>
               </select>
           </div>

           <div class="form-outline col-md-12 mb-5">
               <label for="inputGroupSelect02">Title</label>
               <textarea class="form-control mytextarea" type="text" name="title" id="inputGroupSelect02" cols="140"
                   rows="10" placeholder="Enter your title" required><?php echo $post['title'] ?></textarea>
               <div class="invalid-feedback">Please provide a valid title.</div>
           </div>
           <div class="form-outline col-md-12 mb-5">
               <label for="inputGroupSelect02">Content</label>
               <textarea class="form-control mytextarea" type="text" name="content" id="inputGroupSelect02" cols="140"
                   rows="10" placeholder="Enter yourcContent" required><?php echo $post['content'] ?></textarea>
               <div class="invalid-feedback">Please provide a valid Content.</div>
           </div>
           <div class="form-outline col-md-12 mb-5">
               <label for="inputGroupSelect02">Description</label>
               <textarea class="form-control mytextarea" type="text" name="description" id="inputGroupSelect02"
                   cols="140" rows="10" placeholder="Enter your Description"
                   required><?php echo $post['description'] ?></textarea>
               <div class="invalid-feedback">Please provide a valid Description.</div>
           </div>

           <div class="form-outline col-md-6 mb-5">
               <label for=""> picture </label>
               <input name="picture" type="file" class="form-control" id="" placeholder="Input title">
               <img src="Public/image-post-detail/<?php echo $post['picture'] ?> " w="200" height="150" alt="
                   <?php echo $post['image_detail'] ?>">

           </div>

           <div class="form-outline col-md-6 mb-5">
               <label for=""> Image_detail </label>
               <input name="image_detail" type="file" value="" class="form-control" id="" placeholder="Input title">
               <img src="Public/image-post-detail/<?php echo $post['image_detail'] ?> " w="200" height="150"
                   alt="<?php echo $post['image_detail'] ?>">
           </div>

           <button type=" submit" name="updatepost" class="btn btn-primary btn-lg btn-block">SAVE</button>
       </form>
       <?php endforeach; ?>
   </div>
   </div>
   </div>

   <script>
tinymce.init({
    selector: '.mytextarea'
});
   </script>

   <?php
    include('App/View/Admin/Layouts/footer.php');
    ?>

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