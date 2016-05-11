<?php

class Post {
    private $_db;

    public function __construct() {
        
    }

    public function create($title, $post, $userId) {
        global $oDb;       
        $post = $post . $img;
        $oQuery = $oDb->prepare("INSERT INTO Posts (title, postText, userId, deleted) VALUES( :sTitle, :sPost, :sUserId, 0)");
        $oQuery->bindValue(':sTitle', $title);
        $oQuery->bindValue(':sPost', $post);
        $oQuery->bindValue(':sUserId', $userId);
        $oQuery->execute();
        $iRowsInsertedId = $oDb->lastInsertId();

        mkdir("uploads/post_".$iRowsInsertedId);
        $this->uploadImg($iRowsInsertedId);
    

        $oQuery = $oDb->prepare("UPDATE Posts SET imgUrl = 'uploads/post_' :sId WHERE id = :sId");
        $oQuery->bindValue(':sId', $iRowsInsertedId);
        $oQuery->execute();
    }

    public function getAll() {
        global $oDb;
        $oQuery = $oDb->prepare("SELECT *, (SELECT COUNT(*) FROM Comments WHERE postId = Posts.id) AS commentsCount FROM Posts");
        $oQuery->execute();
        $aResults = $oQuery->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($aResults);
    }

    function showImgs($path){
        $files = glob($path."/*.*");
        for ($i=0; $i<count($files); $i++) {
            $image = $files[$i];
            //print $image ."<br />";
            echo '<img src="'.$image .'" alt="Random image" />'."<br /><br />";
        }
    }

    public function uploadImg($postId){
        $target_dir = "uploads/post_". $postId ."/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
            echo "Sorry, only JPG, JPEG & PNG files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}


?>