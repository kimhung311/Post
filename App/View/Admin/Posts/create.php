  <div class="main-panel">
      <div class="col-11 grid-margin mx-auto  stretch-card">
          <div class="card">
              <div class="card-body">
                  <div class="card-body">
                      <h4 class="h1 col-md-10 mx-auto ">Add Post</h4>
                      <?php
                        if (!empty($_GET['msg'])) {
                            $msg = unserialize(urldecode($_GET['msg']));
                            foreach ($msg as $key => $value) {
                                echo '<span class="btn btn-warning">' . $value . '</span>';
                            }
                        }
                        ?>
                      <div class="col-md-11 mx-auto">
                          <!-- style="width:1200px;margin:auto;" -->
                          <form class="row forms-sample needs-validation" novalidate
                              action="<?php echo BASE_URL ?>post/insertPost" method="POST" role="form"
                              enctype="multipart/form-data">


                              <div class="form-outline col-md-6 mb-5">
                                  <label for="inputGroupSelect02">Categories</label>
                                  <select class="custom-select" id="inputGroupSelect02" name="category_id" required>
                                      <?php foreach ($categories as $key => $value) : ?>
                                      <option value="<?php echo $value['id'] ?>">
                                          <?php echo $value['category_name'] ?></option>
                                      <?php endforeach; ?>
                                      <div class="invalid-feedback">Please provide a valid Categories.</div>

                                  </select>
                              </div>

                              <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">

                              <div class="form-outline col-md-6 mb-5">
                                  <label for="inputGroupSelect02">Author Name</label>
                                  <select class="custom-select" id="inputGroupSelect02" name="author_id" required>
                                      <?php foreach ($user as $key => $value) : ?>
                                      <option value="<?php echo $value['id'] ?>">
                                          <?php echo $value['name'] ?></option>
                                      <?php endforeach; ?>
                                      <div class="invalid-feedback">Please provide a valid Author Name.</div>

                                  </select>
                              </div>

                              <div class="form-outline col-md-6 mb-5">
                                  <label for="inputGroupSelect02">Title</label>
                                  <input type="text" type="text" name="title" id="inputGroupSelect02"
                                      class="form-control" placeholder="">
                                  <div class="invalid-feedback">Please provide a valid Title.</div>
                              </div>

                              <div class="form-outline col-md-6 mb-3">
                                  <label for="validationCustom05">Hot NEW</label>
                                  <div class="input-group">
                                      <select class="custom-select" id="validationCustom03" name="hot_new" required>
                                          <option selected value="0"></option>
                                          <option value="1">HOT</option>
                                          <option value="0">NO</option>
                                      </select>
                                      <div class="invalid-feedback">Please provide a valid Delegation of Powers.</div>
                                  </div>
                              </div>

                              <div class="form-outline col-md-6 mb-5">
                                  <label for="inputGroupSelect02">Content</label>
                                  <textarea class="form-control mytextarea" type="text" name="content"
                                      id="inputGroupSelect02" cols="140" rows="20" placeholder="Enter your content"
                                      required></textarea>
                                  <div class="invalid-feedback">Please provide a valid Content.</div>
                              </div>



                              <div class="form-outline col-md-6 mb-5">
                                  <label for="inputGroupSelect02">Description</label>
                                  <textarea class="form-control mytextarea" type="text" name="description"
                                      id="inputGroupSelect02" cols="140" rows="20" placeholder="Enter your content"
                                      required></textarea>
                                  <!-- <input type="text" name="description" id="inputGroupSelect" cols="140" rows="30"
                                      class="form-control mytextarea" type="text" name="description"> -->
                                  <div class="invalid-feedback">Please provide a valid description.</div>
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


                              <button type="submit" class="btn btn-primary  btn-block" name="insert_post">ADD</button>
                          </form>
                      </div>

                  </div>
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