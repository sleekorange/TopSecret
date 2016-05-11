<?php
    $comment = new Comment();
    $post = new Post();
    $obj = new user();

    if (Input::exists()) {
        try {
            $comment->create($obj->getUserId(), Input::get('postId') , Input::get('comment'));
        } catch(Exception $e) {
            echo $error, '<br>';
        }
    }

	try {
        $data = json_decode($post->getAll());       
    } catch(Exception $e) {
        echo $error, '<br>';
    }
?>


	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({selector: '.commentContent',height: 30,toolbar: ' bold italic', statusbar: false, menubar:false});</script>

     <h1>Posts</h1>

     <?php 
        if($obj->checkSession()){
          echo '<a href="second.php">Write a post</a>';
        }
      
      ?>
	 <div id="comments" style="margin-top: 10px;">

     <?php 
         for ($i=0; $i < sizeof($data); $i++) {
              try {
                  $comments = json_decode($comment->getAll($data[$i]->id));       
              } catch(Exception $e) {
                  echo $error, '<br>';
              }

              echo '<div class="blogPost">';
              echo '<h3>'. $data[$i]->title .'</h3>';
              echo '<span class="postCreator">Userid: ';
              echo $data[$i]->userId;
              echo '</span>';
              echo '<p>'. $data[$i]->postText .'</p>';
              echo '<div class="blogPostImg">';
                    $post->showImgs($data[$i]->imgUrl);
              echo '</div>';
              echo '<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse'.$data[$i]->id.'" aria-expanded="false" aria-controls="collapse'.$data[$i]->id.'    ">
                    <i class="fa fa-comment-o" aria-hidden="true"></i> Comments ('.$data[$i]->commentsCount.')</a>';
              echo '</div>';
                echo '<div class="collapse" id="collapse'.$data[$i]->id.'">';
                if($obj->checkSession()){
                echo '<form class="form-horizontal" action="" method="POST">
                        <div class="form-group">
                        <label for="comment">Comment</label>
                        <input type="hidden" value="'.$data[$i]->id.'" name="postId">
                        <textarea class="form-control commentContent" name="comment">Write your comment here...</textarea>
                        </div>
                        <button type="submit" class="btn btn-success" >Submit</button>';
                echo '</form>';
                } 
                echo '<div class="commentsDiv">';
                for ($j=0; $j < sizeof($comments); $j++) {
                      
                      echo '<div class="commentBox">';
                      echo '<p><b>'.$comments[$j]->name.'</b></p>';
                      echo $comments[$j]->commText;
                      echo '</div>';

                }
                echo '</div>';
                echo '</div>';

          }        
      ?>
	 </div>




