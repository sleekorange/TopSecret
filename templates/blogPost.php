<?php
    require_once 'functions/token.php';

    $post = new Post();
    $obj = new user();   

    if($obj->checkSession()){
        if (Input::exists()) {
            if(verifyToken()){
                echo "found token";
                try {
                    $post->create(Input::get('title'), Input::get('content'), $obj->getUserIdSession());
                    header('Location: /topsecret/');
                } catch(Exception $e) {
                    echo $error, '<br>';
                }
            } else {
                echo "no token";
            }
        }

    } else {
        header('Location: /topsecret/');
    }

    $token = setToken();
?>


	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'#postContent', height : "110" });</script>
    <script>tinymce.init({selector: '.commentContent',height: 50,toolbar: ' bold italic', statusbar: false, menubar:false});</script>

 	<h1>Write a post</h1>
    
    <div class="postDiv">
     	<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title">
            </div>
            <div class="form-group">
                <label for="content">Message</label>
            	<textarea class="form-control" name="content" id="postContent">Write your message here...</textarea>
            </div>
            <div class="form-group">
                <label for="fileToUpload">Upload image</label>
                <input class="form-control" type="file" name="fileToUpload">
            </div>
            <input type="hidden" value="<?php echo $token ?>" name="token">
        	<button type="submit" class="btn btn-success" >Submit</button>
    	 </form>
     </div>
  




