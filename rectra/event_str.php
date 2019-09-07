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
if(isset($_POST['event_selected']))
{
    $event_id =trim(htmlspecialchars($_POST['event_id']));
	$sql = 'Select * from event where e_id =?';
	$ftmt= $conn->prepare($sql);
	$ftmt->execute([$event_id] );
	$res = $ftmt->fetch();
  
	if($res !=NULL)
	{
		echo '<form method="post" enctype="multipart/form-data" id="passform2" action="../selspeaker">';
		echo '<input type="hidden" name="event_id" value="'.$event_id.'" required>';
			echo tokkenField();
			echo'</form>';
			
			echo'<script type="text/javascript">
  document.getElementById("passform2").submit();
</script>';
	}
	else{
		header('location: ../signout');
	}
}

else if(isset($_POST['event_submit']))
{
	 $event_id = $_POST['event_id'];
	 $event_name = $_POST['event_name'];
	 $event_date = $_POST['event_date'];
	$sql = 'Select * from userlog where user =?';
	$ftmt= $conn->prepare($sql);
	$ftmt->execute([$user] );
	$res = $ftmt->fetch();
	
	   
	    if($res && ($pass)==$res['pass'])
	    {
		   $sql= "INSERT INTO `event`(`e_id`, `e_name`, `date`, `user`) VALUES (?,?,?,?)";
			$ytmt = $conn->prepare($sql);
			$ytmt->bindParam(1, $event_id, PDO::PARAM_STR);
            $ytmt->bindParam(2, $event_name, PDO::PARAM_STR);
			$ytmt->bindParam(3, $event_date, PDO::PARAM_STR);
			$ytmt->bindParam(4, $res['user'], PDO::PARAM_STR);
	        $ytmt->execute();
			echo '<form method="post" enctype="multipart/form-data" id="passform" action="../selspeaker">';
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
else{
	header('location: ../signout');
}
?>

