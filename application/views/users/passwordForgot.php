
<?php echo form_open('users/resetPassword');?>
<div class="container" style="margin-top: 10%; margin-bottom:17%">
    <div class="col-md-12">
        <div class="modal-dialog login-dialog">
            <div class="modal-content login-dialog-inner">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign In</h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <input type="text" name="usernameEmail" class="form-control" placeholder="Username or Username" required autofocus>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-primary btn-block">Send new Password</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>


