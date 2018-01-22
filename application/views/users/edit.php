<div class="user-Form">
    <div class="container container-user-Form">
        <?php echo validation_errors();?>
        <?php echo form_open_multipart('users/update');?>
        <h1 class="text-center"><?=$title;?></h1>
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
            <div class="col-lg-4 mb-4" style="top:20px">
                <div class="control-group form-group">
                    <label>Your old Profile Picture:</label>
                    <div class="profile-picture">
                        <img class="userprofile-picture" src="<?php echo site_url();?>assets/images/profiles/<?php echo$user[0]['userprofile']?>">
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-6"><div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name"  value="<?php echo$user[0]['name']?>">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $user[0]['id']?>">
                </div>
                <div class="form-group">
                    <label>Zipcode</label>
                    <input type="text" class="form-control" name="zipcode"  value="<?php echo$user[0]['zipcode']?>">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" readonly class="form-control" name="username"  value="<?php echo$user[0]['username']?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email"  value="<?php echo$user[0]['email']?>">
                </div>

                <div class="form-group">
                    <label>Biography</label>
                    <textarea class="form-control" rows="5" name="biography" id="comment"  value=""><?php echo $user[0]['biography']?></textarea>
                </div>
            </div>
            <div class="col-sm-6"><div class="form-group">
                    <label>Youtube Channel</label>
                    <input type="text" class="form-control" name="youtubchannel"  value="<?php echo$user[0]['youtubeChannel']?>">
                </div>
                <div class="form-group">
                    <label>Twitter Account</label>
                    <input type="text" class="form-control" name="twitteraccount"  value="<?php echo$user[0]['twitterAccount']?>">
                </div>
                <div class="form-group">
                    <label>Instagramm Account</label>
                    <input type="text" class="form-control" name="instagramaccount"  value="<?php echo$user[0]['instagramAccount']?>">
                </div>
                <div class="form-group">
                    <label>Your Own Blog Site</label>
                    <input type="text" class="form-control" name="ownblog"  value="<?php echo$user[0]['ownBlog']?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-danger float-left">Cancel</button>
            </div>
            <div class="col-sm-6">
                <a href="<?php echo base_url();?>users/index"><button type="submit" class="btn btn-success float-right">Edit</button></a>
            </div>
        </div>
    </div>
</div>
    <?php echo form_close();?>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profil_picture')
                        .attr('src', "")
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#changePassword" ).click(function(event) {

            $(".changePasswordShow").toggle();

        });


    </script>

