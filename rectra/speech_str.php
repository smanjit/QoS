<?php 
session_start();

if(isset($_SESSION['user']) and isset($_SESSION['pass']) ) 
   {
	$user = $_SESSION['user'];
	$pass = $_SESSION['pass'];
	
	
}
else{
	header('location: ../signout');
}
  
?>

<?php include_once './connection.php';
include_once './functions.php';
checkToken( $_POST['user_token'], $_SESSION[ 'sestoken' ], '../signout' );
gSToken();
?>
<?php
if(isset($_POST['speech_submit']))
{    
	$event_id = htmlspecialchars($_POST['event_id']);
    $person_id = htmlspecialchars($_POST['person_id']);
	$sql = 'Select * from event where e_id =?';
	$ftmt= $conn->prepare($sql);
	$ftmt->execute([$event_id] );
	$eres = $ftmt->fetch();
  $sql = 'Select * from person where p_id =?';
	$ftmt= $conn->prepare($sql);
	$ftmt->execute([$person_id] );
	$fres = $ftmt->fetch();
	if($fres !=NULL || $eres !=NULL){
		
	
	 $speech_id = $_POST['speech_id'];
	 $speech_name = $_POST['speech_name'];
		$speech_time = $_POST['speech_time'];
	$sql = 'Select * from userlog where user =?';
	$ftmt= $conn->prepare($sql);
	$ftmt->execute([$user] );
	$res = $ftmt->fetch();
	
	   
	    if($res && ($pass)==$res['pass'])
	    {
		   $sql= "INSERT INTO `speech`(`s_id`, `s_name`,`time`,`e_id`,`p_id`) VALUES (?,?,?,?,?)";
			$ytmt = $conn->prepare($sql);
			$ytmt->bindParam(1, $speech_id, PDO::PARAM_STR);
            $ytmt->bindParam(2, $speech_name, PDO::PARAM_STR);
	        $ytmt->bindParam(3, $speech_time, PDO::PARAM_STR);
			$ytmt->bindParam(4, $event_id, PDO::PARAM_STR);
			$ytmt->bindParam(5, $person_id, PDO::PARAM_STR);
			$ytmt->execute();
			echo '<form method="post" enctype="multipart/form-data" id="passform" action="../strchecker">';
			echo '<input type="hidden" name="speech_id" value="'.$speech_id.'" required>';
			echo '<input type="hidden" name="person_id" value="'.$person_id.'" required>';
			echo '<input type="hidden" name="event_id" value="'.$event_id.'" required>';
			echo tokkenField();
			echo'</form>';
			
			echo'<script type="text/javascript">
  document.getElementById("passform").submit();
</script>';
	    }
	    else{
		   header('location: ../signout');
	        }
	
	}
}
else{
	 header('location: ../signout');
}
?>