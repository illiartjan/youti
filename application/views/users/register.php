<div class="user-Form">
<?php echo validation_errors();?>
<?php echo form_open_multipart('users/register');?>
<!-- Page Content -->
<div class="container container-user-Form">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3"><?=$title;?></h1>

    <div class="row">
        <div class="col-lg-4 mb-4">

            <div class="control-group form-group">
                <label>Your Profile Picture:</label>
                <input type='file' name="userfile" onchange="readURL(this);" />
                <div class="profile-picture">
                    <img  id="profil_picture" src="#" alt="your image" />
                </div>
            </div>

        </div>
    </div>
    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
        <div class="col-lg-6 mb-4">

                <div class="control-group form-group">
                    <div class="controls">
                        <label>Full Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Zip Code:</label>
                        <input type="text" class="form-control" name="zipcode" placeholder="Zipcode">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Username:</label>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>E-Mail:</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Confirm Password:</label>
                        <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
                    </div>
                </div>
        </div>
        <div class="col-lg-6 mb-4">
            <form name="sentMessage" id="contactForm" novalidate>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Biographie:</label>
                        <textarea class="form-control" rows="5" name="biography" id="comment" placeholder="About you"></textarea>
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Your Youtube Channel:</label>
                        <input type="text" class="form-control" name="youtubchannel" placeholder="Your Youtube Channel">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Your Twitter Channel:</label>
                        <input type="text" class="form-control" name="twitteraccount" placeholder="Your Twitter Account">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Your Instagramm Channel</label>
                        <input type="text" class="form-control" name="instagramaccount" placeholder="Your Instagram Account">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Your own Blog:</label>
                        <input type="text" class="form-control" name="ownblog" placeholder="Your own Blog Site">
                    </div>
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Register</button>
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>

<?php echo form_close();?>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profil_picture')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

