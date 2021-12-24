<?php include('App/View/Admin/Layouts/master.php') ?>

<div class="main-panel">
    <h1 class="text-center">List of Comment
        <?php include('App/View/Message/message.php') ?>
    </h1>

    <table class="table table-light table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>User_id</th>
                <th>Post_id</th>
                <th>Comment</th>
                <th>image_comment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $commentkey => $comment) : ?>
            <tr>
                <td><?php echo $comment['id']; ?></td>
                <td><?php echo $comment['user_id']; ?></td>
                <td><?php echo $comment['post_id']; ?></td>
                <td><?php echo $comment['comment']; ?></td>
                <td><?php echo $comment['image_comment']; ?></td>
                <td>
                    <!-- <a href="<?php echo BASE_URL ?>category/editcate/<?php echo $comment['id'] ?>"
                        class="btn btn-primary"
                        onclick="return confirm('<?php echo 'Do you want to edit numeric information: ' . ' ' . $comment['id'] ?>')">Edit</a> -->
                    <a href="<?php echo BASE_URL ?>comment/delete/<?php echo $comment['id'] ?>" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete?')">Del</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</div>
<script>
$(document).ready(function() {
    $('.toast').toast('show');
});
</script>