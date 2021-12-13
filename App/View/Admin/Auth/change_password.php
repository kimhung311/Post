<?php include('View/Admin/Layouts/master.php');
?>
<div class="main-panel">
    <h1 class="text-center">Change Password
    </h1>
    <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
        <div style="width:500px;">
            <div class="message"><?php if (isset($message)) {
                                        echo $message;
                                    } ?></div>
            <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">

                <tr>
                    <td width="40%"><label>Current Password</label></td>
                    <td width="60%"><input type="password" name="currentPassword" class="txtField form-control" /><span
                            id="currentPassword" class="required"></span></td>
                </tr>
                <tr>
                    <td><label>New Password</label></td>
                    <td><input type="password" name="newPassword" class="txtField form-control" /><span id="newPassword"
                            class="required"></span></td>
                </tr>
                <td><label>Confirm Password</label></td>
                <td><input type="password" name="confirmPassword" class="txtField form-control" /><span
                        id="confirmPassword" class="required"></span></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="action" value="Submit" class="btnSubmit"></td>
                </tr>
            </table>
        </div>
    </form>
    <?php include('Validation/validation.php'); ?>
</div>
</div>
</div> <?php
        include('View/Admin/Layouts/footer.php');
        ?>