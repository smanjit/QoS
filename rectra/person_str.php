<?php 
session_start();

if(isset($_SESSION['user']) and isset($_SESSION['pass']) ) 
   {
	$user = $_SESSION['user'];
	$pass = $_SESSION['pass'];
	
	
}
else{
	header('location: ../signout');
   exit(0);
}
  
?>

<?php include_once './connection.php';
include_once './functions.php';
checkToken( $_POST['user_token'], $_SESSION[ 'sestoken' ], '../signout' );
gSToken();
?>
<?php
if(isset($_POST['person_submit']))
{
	 $person_id = $_POST['person_id'];
	 $person_name = $_POST['person_name'];
	$sql = 'Select * from userlog where user =?';
	$ftmt= $conn->prepare($sql);
	$ftmt->execute([$user] );
	$res = $ftmt->fetch();
	
	   
	    if($res && ($pass)==$res['pass'])
	    {
		   $sql= "INSERT INTO `person`(`p_id`, `p_name`, `user`) VALUES (?,?,?)";
			$ytmt = $conn->prepare($sql);
			$ytmt->bindParam(1, $person_id, PDO::PARAM_STR);
            $ytmt->bindParam(2, $person_name, PDO::PARAM_STR);
			$ytmt->bindParam(3, $user, PDO::PARAM_STR);
	        $ytmt->execute();
			echo '<form method="post" enctype="multipart/form-data" id="passform" action="../">';
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