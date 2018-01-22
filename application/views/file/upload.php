<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <style>
        h1, h2 { font-family: Arial, sans-serif; font-size: 25px; }
        h2 { font-size: 20px; }

        label { font-family: Verdana, sans-serif; font-size: 12px; display: block; }
        input { padding: 3px 5px; width: 250px; margin: 0 0 10px; }
        input[type="file"] { padding-left: 0; }
        input[type="submit"] { width: auto; }

        #files { font-family: Verdana, sans-serif; font-size: 11px; }
        #files strong { font-size: 13px; }
        #files a { float: right; margin: 0 0 5px 10px; }
        #files ul { list-style: none; padding-left: 0; }
        #files li { width: 280px; font-size: 12px; padding: 5px 0; border-bottom: 1px solid #CCC; }
    </style>
<h1>Upload File</h1>
<form method="post" action="" id="upload_file">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="" />

    <label for="userfile">File</label>
    <input type="file" name="userfile" id="userfile" size="20" />

    <input type="submit" name="submit" id="submit" />
</form>
<h2>Files</h2>
<div id="files"></div>
<a href="<?php echo base_url()?>payment/checkout" class="btn btn-info" role="button">Payment Options</a>
