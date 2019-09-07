<?php require_once "./connection.php"; ?>
<?php
session_start();
if(isset($_POST['sbtn']))
{
	echo $name = trim($_POST['user']);
	echo $pass = trim($_POST['pass']);
	$md5 = md5($pass);
	
	//checking username in database
	$stmt = $conn->prepare("SELECT * FROM userlog WHERE user = ?");
	$stmt->execute([$name]);
	$user = $stmt->fetch();
	
	//verifying password
	if($user && $md5==$user['pass'])
	{
		$_SESSION["username"]= $name;
		header('location:../dashboard');
	}
	else{
		session_destroy();
		header('location:../index.php?x=username or password didn\'t match');
	}
}
else
{
    session_destroy();
	header('location:../index.php?x=session expire');	
}
exit();
?>