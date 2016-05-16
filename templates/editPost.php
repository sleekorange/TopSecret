<?php 

	require_once 'functions/token.php';

    $post = new Post();
    $obj = new user();   

    if($obj->checkSession()){
        if (Input::exists("post")) {
            if(verifyToken()){
                echo "found token";
                if(isset($_SESSION["postId"])){
                	try {
	                    $post->updatePost(Input::get('title'), Input::get('content'), $obj->getUserIdSession(), $_SESSION["postId"]);
	                    unset($_SESSION['postId']);
	                    header('Location: /topsecret/third.php');
	                } catch(Exception $e) {
	                    echo $error, '<br>';
	                }
                }

            } else {
                echo "no token";
            }
        } else if (Input::exists("get")) {
        	
	        	try {
	                    $data = json_decode($post->getPost(Input::get('postId'), $obj->getUserIdSession()));
	                    $_SESSION["postId"] = Input::get('postId');
	                } catch(Exception $e) {
	                    echo $error, '<br>';
	                }
	        
        } else {
        	header('Location: /topsecret/');
        }

    } else {
        header('Location: /topsecret/');
    }

    $token = setToken();


?>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'#postContent', height : "110" });</script>
    <script>tinymce.init({selector: '.commentContent',height: 50,toolbar: ' bold italic', statusbar: false, menubar:false});</script>

 	<h1>Edit post</h1>
    
    <div class="postDiv">
     	<form class="form-horizontal" action="" method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" value="<?php echo $data[0]->title ?>">
            </div>
            <div class="form-group">
                <label for="content">Message</label>
            	<textarea class="form-control" name="content" id="postContent"><?php echo $data[0]->postText ?></textarea>
            </div>
            <input type="hidden" value="<?php echo $token ?>" name="token">
        	<button type="submit" class="btn btn-success" >Submit</button>
    	 </form>
     </div>