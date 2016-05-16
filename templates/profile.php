<?php 

    $post = new Post();
    $obj = new user();
    

    if($obj->checkSession()){
      try {
          $data = json_decode($post->getUserPosts($obj->getUserIdSession()));
      } catch(Exception $e) {
          echo $error, '<br>';
      }
    }

?>


<h1>Your posts</h1>
<div id="comments" style="margin-top: 10px;">

     <?php 
         for ($i=0; $i < sizeof($data); $i++) {
              echo '<div class="blogPost">';
              echo '<h3>'. $data[$i]->title .'</h3>';
              echo '</span>';
              echo '<p>'. $data[$i]->postText .'</p>';
              echo '<div class="blogPostImg">';
                    $post->showImgs($data[$i]->imgUrl);
              echo '</div>';
              
              echo '</div>';
              echo '<a href="fourth.php?postId='.$data[$i]->id.'">Edit post</a>';
          }        
      ?>
</div>