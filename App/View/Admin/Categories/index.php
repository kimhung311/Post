<div class="main-panel">

    <h1 class="text-center">List of categories
        <div class="row">
            <div class="col-3">
                <a href="<?php echo BASE_URL ?>category/addcategory" class="btn btn-info"><i
                        class=" fa fa-calendar-plus fa-5x"></i>
                    ADD
                    NEW
                </a>
            </div>
            <div class=" col-6">
                <div class="form-outline">
                    <form action="<?php echo BASE_URL ?>category/search" method="GET" role="form">
                        <input id="search-focus" type="search" name="search" id="form1" class="form-control" />

                        <button type="submit" name="search" class="btn btn-primary btn-lg btn-block">Submit</button>
                    </form>

                </div>

            </div>
        </div>

        <?php include('App/View/Message/message.php') ?>
    </h1>

    <table class="table table-light table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>category_name</th>
                <th>Parent_Id</th>
                <th>User_Id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $key => $category) : ?>
            <tr>
                <td><?php echo $category['id']; ?></td>
                <td><?php echo $category['category_name']; ?></td>
                <td><?php echo $category['paren_id']; ?></td>
                <td><?php echo $category['user_id']; ?></td>
                <td>
                    <a href="<?php echo BASE_URL ?>category/editcate/<?php echo $category['id'] ?>"
                        class="btn btn-primary"
                        onclick="return confirm('<?php echo 'Do you want to edit numeric information: ' . ' ' . $category['id'] ?>')">Edit</a>
                    <a href="<?php echo BASE_URL ?>category/deletecate/<?php echo $category['id'] ?>"
                        class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Del</a>
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
                    href="<?php echo BASE_URL ?>category/list_category&page=<?php echo $Previous; ?>">Previous</a>
            </li>
            <?php } ?>
            <?php

            for ($i = $colum; $i < $to; $i++) {
            ?>
            <li class="page-item "><a class="page-link btn btn-outline-warning"
                    href="<?php echo BASE_URL ?>category/list_category&page=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
            <?php } ?>
            <?php if ($colum >= $page) { ?>
            <li class="page-item"><a class="page-link btn btn-outline-warning"
                    href="<?php echo BASE_URL ?>category/list_category&page=<?php echo $Next; ?>">Next</a>
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