<div class="main-panel">
    <h1 class="text-center">List of categories
        <div class="row">
            <a href="<?php echo BASE_URL ?>category/addcategory" class="btn btn-info"><i
                    class=" fa fa-calendar-plus fa-5x"></i>
                ADD
                NEW
            </a>
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
    <nav>
        <ul class="pagination">
            <li class="page-item <?= ($currentPage = 1) ? "disabled" : "" ?>"><a class="page-link" href="#">Previous</a>
            </li>
            <?php for ($page = 1; $page <= $page; $page++) :  ?>
            <li class="page-item <?= ($currentPage = $page) ? "active" : "" ?>">
                <a href="" class="page-link">
                    <?= $page ?>
                </a>
            </li>
            <?php endfor ?>
            <li class="page-item"><a class="page-link <?= ($currentPage = $pages) ? "disabled" : "" ?>"
                    href="#">Next</a>
            </li>
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