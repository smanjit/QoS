<?php require_once "./connection.php"; ?>
<?php
if(isset($_POST['sbttn']))
{
	$name = trim(htmlspecialchars($_POST['user']));
	$pass = trim(htmlspecialchars($_POST['pass']));
	$cpass = trim(htmlspecialchars($_POST['repass']));
	$md5 = md5($pass);
	
	//checking username in database
	$stmt = $conn->prepare("SELECT * FROM userlog WHERE user = ?");
	$stmt->execute([$name]);
	$user = $stmt->fetch();
	
	//checking for exiting username
	if($name =!$user['user'])
	{
		if($pass == $cpass)
		{   $name = trim($_POST['user']);
			$sql= "INSERT INTO userlog (user,pass) VALUES (:ern, :sword)";
			$ytmt = $conn->prepare($sql);
			$ytmt->bindParam(':ern', $name, PDO::PARAM_STR);
            $ytmt->bindParam(':sword', $md5, PDO::PARAM_STR);
	        $ytmt->execute();
			header('location:../index.php?x=signup sucessfully');
		}
		else {
			header('location:../signup.php?x=password didn\'t match');
		}
	}
	else{
		
		header('location:../signup.php?x=username already exist');
	}
}
else
{
    header('location:../index.php?x=session expire');	
}
exit();
?>