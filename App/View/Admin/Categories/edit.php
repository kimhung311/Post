   <?php include('View/Admin/Layouts/master.php') ?>
   <div class="main-panel">
       <form action="" method="POST" role="form" enctype="multipart/form-data">

           <h1>
               <legend class="text-center">Edit category</legend>
           </h1>

           <div class="form-group">
               <input name="id" type="hidden" value="<?php echo $category['id'] ?>" placeholder="" class="form-control"
                   id="" placeholder="Input field" readonly>
               <label for="">Category Name </label>
               <input name="name" type="text" value="<?php echo $category['name'] ?> " class="form-control" id=""
                   placeholder="Input field">
           </div>

           <label for="">Paren_id</label>
           <div class="input-group mb-3">
               <div class="input-group-prepend">
                   <label class="input-group-text" for="inputGroupSelect01">Slected</label>
               </div>
               <select class="custom-select" id="inputGroupSelect01" name="paren_id">
                   <?php foreach ($categories as $key => $value) : ?>
                   <option value="<?php echo $value['id'] ?>">
                       <?php echo $value['id'] ?></option>
                   <?php endforeach; ?>
               </select>
           </div>
           <button type="submit" name="action" value="save" class="btn btn-primary">SAVE</button>
       </form>
   </div>
   </div>
   </div>
   <?php
    include('View/Admin/Layouts/footer.php');
    ?>