
<?php include_once './connection.php'; ?>
<?php include_once './encrypt_decrypt.php'; ?>
<?php
session_start();
include_once './classlogin.php';
$login = new Login();
if(!$login->isLoggedIn()){
	header('location:./login');
    exit(0);
}
if(isset($_SESSION['user']) and isset($_SESSION['pass']) ) 
{
	$user = $_SESSION['user'];	
}
else{
	header('location: ../signout');
    exit(0);
}
if(isset($_POST['person_update'])){
	$p_id=decrypt($_POST['person_id']);
    $p_name=$_POST['person_name'];
    $updt='UPDATE `person` SET `p_name`= ? WHERE `user` = ? and p_id = ? ';
    $updt_e= $conn->prepare($updt);
    $updt_e->bindParam(1, $p_name, PDO::PARAM_STR);
    $updt_e->bindParam(2, $user, PDO::PARAM_STR);
    $updt_e->bindParam(3, $p_id, PDO::PARAM_STR);
	$updt_e->execute();
    header('location:../');
    exit(0);
}
?>