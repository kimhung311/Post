<?php
$_SESSION['alert']['count'] += 1;
if ($_SESSION['alert']['count'] > 1) {
    $_SESSION['alert']['count'] = 0;
    $_SESSION['alert']['msg'] = '';
}
if (!empty($_SESSION['alert']['msg']) && $_SESSION['alert']['count'] <= 1) {

?>
<div class="toast " data-autohide="false">
    <div class="toast-header alert alert-success" role="alert">
        <strong class="mr-auto text-primary">Message</strong>
        <small class="text-muted"></small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
    </div>
    <div class="toast-body alert alert-success" role="alert">
        <?php echo $_SESSION['alert']['msg']; ?>
    </div>
</div>

<?php } ?>


<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->