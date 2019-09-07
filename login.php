<?php 
$page='login';
session_start();
?>
<?php include_once './elements/header.php'; ?>
<?php
$er=1;
if(isset($_POST['sbtn']))
{   include_once './rectra/classlogin.php';
	$login = new Login();
	if($login->isLoggedIn())
		header('location:./');
	else
		$er=0;
}
?>
<?php include_once './rectra/functions.php';

	gSToken();
?>
<?php include_once './elements/login.php'; ?>
<?php include_once './elements/footer.php'; ?>