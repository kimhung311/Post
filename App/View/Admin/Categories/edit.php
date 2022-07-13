   <div class="main-panel  text-center">

       <div class="col-md-7 mx-auto mt-5 grid-margin stretch-card">
           <div class="card">
               <div class="card-body">
                   <h4 class="card-title float-left">Form Edit Category</h4>
                   <p class="card-description"></p>
                   <?php
                    foreach ($categorybyid as $category) :
                    ?>
                   <form class="forms-sample needs-validation mt-5" novalidate
                       action="<?php echo BASE_URL ?>Category/updateCategory/<?php echo $category['id'] ?>"
                       method="POST" role="form">
                       <div class="form-group form-outline row ">
                           <input name="id" type="hidden" value="<?php echo $category['id'] ?>" placeholder=""
                               class="form-control " id="" placeholder="Input field" readonly>
                           <label for="exampleInputUsername2 validationCustom02"
                               class="col-sm-3 col-form-label">Category
                               Name</label>
                           <div class="col-sm-5">
                               <select class="custom-select" id="inputGroupSelect01" name="paren_id">
                                   <?php foreach ($categorybyid as $key => $value) : ?>
                                   <option value="<?php echo $value['id'] ?>">
                                       <?php echo $value['category_name'] ?></option>
                                   <?php endforeach; ?>
                               </select>
                           </div>
                       </div>

                       <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">

                       <button type="submit" name="updateCategory" class="btn btn-success btn-rounded btn-fw"> Submit
                       </button>
                       <button class="btn btn-light">Cancel</button>
                   </form>
                   <?php endforeach; ?>
               </div>
           </div>
       </div>
   </div>
   </div>
   </div>

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