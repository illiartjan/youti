<?php echo form_open('users/login');?>
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
                                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" required autofocus>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <div class="login-dialog-link">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                                 <br>
                                <a href="<?php base_url()?>passwordforgotten">Password Forgotten</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
