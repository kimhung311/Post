<?php include('View/Admin/Layouts/master.php');
?>
<div class="main-panel">
    <h1 class="text-center">List of Posts
        <div class="row">
            <a href="?controller=post&action=create" class="btn btn-info"><i class=" fa fa-calendar-plus fa-5x"></i>
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($post as $key => $value) : ?>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['category_id'] ?></td>
                <td><?php echo $value['user_id'] ?></td>
                <td><?php echo $value['title'] ?></td>
                <td><a href="?controller=post&action=post_detail&id=<?php echo $value['id'] ?>"
                        class="btn btn-primary">Post_Detail</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</div> <?php
        include('View/Admin/Layouts/footer.php');
        ?>