  <div class="main-panel">
      <h1 class="text-center">ADD Post
      </h1>
      <?php
        if (!empty($_GET['msg'])) {
            $msg = unserialize(urldecode($_GET['msg']));
            foreach ($msg as $key => $value) {
                echo '<span class="btn btn-warning">' . $value . '</span>';
            }
        }
        ?>

      <form class="row g-3 needs-validation" novalidate action="<?php echo BASE_URL ?>post/insert_post" method="POST"
          role="form" enctype="multipart/form-data" style="width:1200px;margin:auto;">

          <div class="form-outline col-md-6 mb-6">
              <label for="validationCustom01">Name</label>
              <input type="text" name="name" id="validationCustom01" class="form-control" placeholder=" Enter Name post"
                  required>
              <div class="invalid-feedback">Please provide a valid Name.</div>

          </div>

          <div class="form-outline col-md-6 mb-6 ">
              <label for="inputGroupSelect02">Categories</label>
              <select class="custom-select" id="inputGroupSelect02" name="category_id" required>
                  <?php foreach ($categories as $key => $value) : ?>
                  <option value="<?php echo $value['id'] ?>">
                      <?php echo $value['category_name'] ?></option>
                  <?php endforeach; ?>
                  <div class="invalid-feedback">Please provide a valid Categories.</div>

              </select>
          </div>

          <!-- <div class="form-outline col-md-4 mb-5 ">
              <label for="inputGroupSelect01">Admin</label>
              <select class="custom-select" id="inputGroupSelect01" name="user_id" required>
                  <?php foreach ($user as $key => $value) : ?>
                  <option value="<?php echo $value['id'] ?>">
                      <?php echo $value['name'] ?></option>
                  <?php endforeach; ?>
              </select>
              <div class="invalid-feedback">Please provide a valid Admin.</div>

          </div> -->
          <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">


          <div class="form-outline col-md-12 mb-5">
              <label for="inputGroupSelect02">Title</label>
              <textarea class="form-control mytextarea" type="text" name="title" id="inputGroupSelect02" cols="140"
                  rows="10" placeholder="Enter your title" required></textarea>
              <div class="invalid-feedback">Please provide a valid Title.</div>
          </div>

          <div class="form-outline col-md-12 mb-5">
              <label for="inputGroupSelect02">Content</label>
              <textarea class="form-control mytextarea" type="text" name="content" id="inputGroupSelect02" cols="140"
                  rows="10" placeholder="Enter your content" required></textarea>
              <div class="invalid-feedback">Please provide a valid Content.</div>
          </div>

          <div class="form-outline col-md-12 mb-5">
              <label for="inputGroupSelect02">Description</label>
              <textarea class="form-control mytextarea" type="text" name="description" id="description" cols="140"
                  rows="10" placeholder="Enter your description" required></textarea>
              <div class="invalid-feedback">Please provide a valid Description.</div>

          </div>

          <div class="form-outline col-md-6 mb-5">
              <label for="">Picture</label>
              <input type="file" name="picture" id="inputGroupSelect02" class="form-control"
                  placeholder="Enter Picture " required>
              <div class="invalid-feedback">Please provide a valid Picture.</div>

          </div>

          <div class="form-outline col-md-6 mb-5">
              <label for="inputGroupSelect02">Image_detail</label>
              <input type="file" name="image_detail" id="inputGroupSelect02" class="form-control"
                  placeholder="Enter Image_detail " required>
              <div class="invalid-feedback">Please provide a valid Image_detail.</div>

          </div>


          <button type="submit" class="btn btn-primary btn-lg btn-block" name="insert_post">ADD</button>
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