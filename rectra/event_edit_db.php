
<?php include_once './connection.php'; ?>
<?php
session_start();
include_once './classlogin.php';
include_once './encrypt_decrypt.php';
$login = new Login();
if(!$login->isLoggedIn()){
	header('location:./login');
    exit(0);
}
$user = $_SESSION['user'];
if(isset($_POST['event_update'])){
	$e_id=decrypt($_POST['event_id']);
    $e_name=$_POST['name'];
    $e_date=$_POST['event_date'];
    $updt='UPDATE `event` SET `e_name`= ?,`date`= ? WHERE `user` = ? and e_id = ? ';
    $updt_e= $conn->prepare($updt);
    $updt_e->bindParam(1, $e_name, PDO::PARAM_STR);
    $updt_e->bindParam(2, $e_date, PDO::PARAM_STR);
    $updt_e->bindParam(3, $user, PDO::PARAM_STR);
	$updt_e->bindParam(4, $e_id, PDO::PARAM_STR);
    $updt_e->execute();
    header('location:../');
    exit(0);
}
?>