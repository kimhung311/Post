   <?php include('App/View/Admin/Layouts/master.php') ?>
   <div class="main-panel " style="width:700px;margin:auto;">
       <?php
        foreach ($postbyid as $post) :
        ?>
       <form action="<?php echo BASE_URL ?>post/updatepost/<?php echo $post['id'] ?>" method="POST" role="form"
           enctype="multipart/form-data">

           <h1>
               <legend class="text-center">Edit Post</legend>
           </h1>

           <div class="form-group">
               <label for="">Category Name </label>
               <input name="name" type="text" value="<?php echo $post['name'] ?> " class="form-control" id=""
                   placeholder="Input field">
           </div>

           <label for="">Categories</label>
           <div class="input-group mb-3">
               <div class="input-group-prepend">
                   <label class="input-group-text" for="inputGroupSelect01">Slected</label>
               </div>
               <select class="custom-select" id="inputGroupSelect01" name="category_id">
                   <?php foreach ($categories as $key => $value) : ?>
                   <option value="<?php echo $value['id'] ?>">
                       <?php echo $value['category_name'] ?></option>
                   <?php endforeach; ?>
               </select>
           </div>

           <div class="input-group mb-3">
               <div class="input-group-prepend">
                   <label class="input-group-text" for="inputGroupSelect01">Slected</label>
               </div>
               <select class="custom-select" id="inputGroupSelect01" name="user_id">
                   <?php foreach ($user as $key => $value) : ?>
                   <option value="<?php echo $value['id'] ?>">
                       <?php echo $value['name'] ?></option>
                   <?php endforeach; ?>
               </select>
           </div>

           <div class="form-group">
               <label for=""> Title </label>
               <input name="title" type="text" value="<?php echo $post['title'] ?> " class="form-control" id=""
                   placeholder="Input title">
           </div>


           <div class="form-group">
               <label for=""> Content </label>
               <input name="content" type="text" value="<?php echo $post['content'] ?> " class="form-control" id=""
                   placeholder="Input title">
           </div>

           <div class="form-group">
               <label for=""> Description </label>
               <input name="description" type="text" value="<?php echo $post['description'] ?> " class="form-control"
                   id="" placeholder="Input title">
           </div>

           <div class="form-group">
               <label for=""> picture </label>
               <input name="picture" type="file" class="form-control" id="" placeholder="Input title">
               <img src="Public/image-post-detail/<?php echo $post['picture'] ?> " w="200" height="150" alt="
                   <?php echo $post['image_detail'] ?>">

           </div>

           <div class="form-group">
               <label for=""> Image_detail </label>
               <input name="image_detail" type="file" value="" class="form-control" id="" placeholder="Input title">
               <img src="Public/image-post-detail/<?php echo $post['image_detail'] ?> " w="200" height="150" alt="<?php echo $post['image_detail'] ?> >
           </div>

           <button type=" submit" name="updatecategory" class="btn btn-primary">SAVE</button>
       </form>
       <?php endforeach; ?>
   </div>
   </div>
   </div>