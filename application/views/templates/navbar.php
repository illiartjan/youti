<nav id="tf-menu" class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand logo" href="index.html">Awesomeness</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#tf-home">Home</a></li>
                        <li><a href="#tf-service">Services</a></li>
                        <li><a href="<?php echo base_url();?>payment/checkout">Price</a></li>
                        <li><a href="<?php echo base_url()?>/about">About</a></li>
                        <?php if($this->session->userdata('logged_in')) : ?>
                            <li><a href="<?php echo base_url()?>/users/logout">Logout</a></li>
                        <?php else: ?>
                        <li><a href="<?php echo base_url()?>/users/register">Register</a></li>

                        <li><a href="<?php echo base_url()?>/users/login">Login</a></li>
                           <?php endif;?>
                        <li><a href="#tf-contact">Contact</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

<?php if($this->session->flashdata('user_registered')):?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>';?>
<?php endif;?>
