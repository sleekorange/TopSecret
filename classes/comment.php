<?php

class Comment {
    private $_db;

    public function __construct() {
        
    }

    public function create($userId, $postId, $comment) {
        global $oDb;       
        $oQuery = $oDb->prepare("INSERT INTO Comments (postId, userId, commText) VALUES( :sPostId, :sUserId, :sCommText)");
        $oQuery->bindValue(':sPostId', $postId );
        $oQuery->bindValue(':sUserId', $userId);
        $oQuery->bindValue(':sCommText', $comment);
        $oQuery->execute();
    }

    public function getAll($postId) {
        global $oDb;
        $oQuery = $oDb->prepare("SELECT commText, userTable.firstName AS name FROM Comments INNER JOIN Users userTable ON Comments.userId = userTable.id WHERE postId = :sPostId");
        $oQuery->bindValue(':sPostId', $postId );
        $oQuery->execute();
        $aResults = $oQuery->fetchAll(PDO::FETCH_ASSOC);
        $iRowsInserted = $oQuery->rowCount();

        //$aResults[0]['count'] = $iRowsInserted;
        return json_encode($aResults);
    }

  
}


?>