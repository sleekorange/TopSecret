<?php 

    $obj = new user();
    

    if($obj->checkSession()){
  		if (Input::exists("get")) {
          if(isset($_GET['userId']) && isset($_GET['function'])){
	            if($_GET['function'] == "ban"){
		            try {
		                $obj->deleteUser(Input::get('userId'));
		            } catch(Exception $e) {
		                echo $error, '<br>';
		            }
				}

				if($_GET['function'] == "unban"){
		            try {
		                $obj->unDeleteUser(Input::get('userId'));
		            } catch(Exception $e) {
		                echo $error, '<br>';
		            }
				}

        	}
    	}

    	if($obj->getUserLevel() == 1){
	      try {
	          $data = json_decode($obj->getAllUsers());
	      } catch(Exception $e) {
	          echo $error, '<br>';
	      }
  		}
    }



?>


<h1>Users</h1>
<div id="comments" style="margin-top: 10px;">
	<table style="width: 100%">
	<tr>
	<th>id</th>
	<th>username</th>
	<th>Banned</th>
	<th></th>
	</tr>
     <?php 
         for ($i=0; $i < sizeof($data); $i++) {
              echo '<tr>';
              echo '<td>'. $data[$i]->id .'</td>';
              echo '<td>'. $data[$i]->username .'</td>';
              echo '<td>'. $data[$i]->deleted .'</td>';
              echo '<td><a href="?function=ban&userId='.$data[$i]->id.'">Ban</a> / <a href="?function=unban&userId='.$data[$i]->id.'">Unban</a></td>';
              echo '</tr>';
          }        
      ?>
    </table>
</div>