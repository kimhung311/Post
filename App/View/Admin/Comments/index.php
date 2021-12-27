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
                <td><?php if (isset($comment['image_comment']) == true) {
                            echo $comment['image_comment'];
                        } else {
                            echo ' <a class="btn btn-primary">IMAGE NULL</a>';
                        }
                        ?></td>
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

    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $offset = 3; // số link trưuóc và sau khi hiện hành
    $row = 3;  // đọ lớn hiẻn thị limit 1 trang
    $from = ($page - 1) * $row;

    $colum = $page - 3;
    $to = $page + 3;
    $colum = $page - $offset;
    if ($colum < 1) $colum = 1;
    $to = $page + $offset;
    $Previous = $page - 1;
    $Next = $page + 1;
    // if($to > $pagenum) $to
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php if ($page > 1) { ?>
            <li class="page-item"><a class="page-link btn btn-outline-warning"
                    href="<?php echo BASE_URL ?>Comment/index&page=<?php echo $Previous; ?>">Previous</a>
            </li>
            <?php } ?>
            <?php

            for ($i = $colum; $i < $to; $i++) {
            ?>
            <li class="page-item"><a class="page-link btn btn-outline-warning"
                    href="<?php echo BASE_URL ?>Comment/index&page=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
            <?php } ?>
            <?php if ($colum >= $page) { ?>
            <li class="page-item"><a class="page-link btn btn-outline-warning"
                    href="<?php echo BASE_URL ?>Comment/index&page=<?php echo $Next; ?>">Next</a>
            </li>
            <?php } ?>
        </ul>
    </nav>
</div>
</div>
</div>
<script>
$(document).ready(function() {
    $('.toast').toast('show');
});
</script>