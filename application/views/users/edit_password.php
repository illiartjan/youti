
<?php echo form_open('users/updatePassword');?>
<div class="container" style="margin-top: 10%; margin-bottom:17%">
    <div class="col-md-12">
        <div class="modal-dialog login-dialog">
            <div class="modal-content login-dialog-inner">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Password</h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <input type="password" name="oldpassword" class="form-control" placeholder="Old Password" required autofocus>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="New Password" required autofocus>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password2" class="form-control" placeholder="Confirm Password" required autofocus>
                            </div>
                            <div class="login-dialog-link">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>







