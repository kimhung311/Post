<?php include('App/View/Admin/Layouts/master.php');
?>
<div class="main-panel">
    <h1 class="text-center">List of Posts
        <div class="row">
            <a href="<?php echo BASE_URL ?>post/add_post" class="btn btn-info"><i
                    class=" fa fa-calendar-plus fa-5x"></i>
                ADD
                NEW
            </a>
        </div>
    </h1>

    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Category_id</th>
                <th>User_id</th>
                <th>Title</th>
                <th>Picture</th>
                <th>Image_detail</th>

                <th>Action</th>
                <?php
                if (!empty($_GET['msg'])) {
                    $msg = unserialize(urldecode($_GET['msg']));
                    foreach ($msg as $key => $value) {
                        echo '<span class="btn btn-warning">' . $value . '</span>';
                    }
                }
                if (isset($_GET['Message'])) {
                    echo $_GET['Message'];
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $key => $value) : ?>
            <tr>
                <td><?php echo $value['posts_id'] ?></td>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['category_name'] ?></td>
                <td><?php echo $value['user_id'] ?></td>
                <td><?php echo $value['title'] ?></td>

                <td>
                    <img src="<?php echo URL_IMAGE_POST . $value['picture'] ?>" alt="<?php echo $value['picture'] ?>">
                </td>
                <td>
                    <img src="<?php echo URL_IMAGE_POST_DETAIL . $value['image_detail'] ?>"
                        alt="<?php echo $value['image_detail'] ?>">
                </td>

                <td>
                    <a href="<?php echo BASE_URL ?>post/editpost/<?php echo $value['posts_id'] ?>"
                        class="btn btn-primary"
                        onclick="return confirm('<?php echo 'Do you want to edit numeric information: ' . ' ' . $value['posts_id'] ?>')">Edit</a>
                    <a href="<?php echo BASE_URL ?>post/delete_post/<?php echo $value['posts_id'] ?>"
                        class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this:')">Del</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</div> <?php
        include('App/View/Admin/Layouts/footer.php');
        ?>