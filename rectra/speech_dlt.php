<?php include_once "connection.php"; ?>
<?php include_once './encrypt_decrypt.php'; ?>
<?php
session_start();
if(isset($_SESSION['user']) and isset($_SESSION['pass']) ) 
{
	$user = $_SESSION['user'];	
}
else{
	header('location: ../signout');
    exit(0);
}
if(isset($_GET['fec']) and isset($_GET['s']))
{
	$efcode= htmlspecialchars($_GET['fec']);
	$s_id= htmlspecialchars($_GET['s']);
}
else{
	header('location:../signout');
	exit(0);
}
if(isset($_GET['s']))
    {
        $id=decrypt($_GET['s']);
        
        // delete speech from speech table
        $sql_sDel='DELETE FROM `speech` WHERE `s_id`= ?';
        $ftmt_sDel= $conn->prepare($sql_sDel);
        $ftmt_sDel->execute([$id] );
        
        // delete from mistake table
        $sql_mDel='DELETE FROM `mistake` WHERE `s_id`= ?';
        $ftmt_mDel= $conn->prepare($sql_mDel);
        $ftmt_mDel->execute([$id] );
        
        //delete from repeted word table
        $sql_rDel='DELETE FROM `repeated_word` WHERE `s_id`= ?';
        $ftmt_rDel= $conn->prepare($sql_rDel);
        $ftmt_rDel->execute([$id] );
        
        header('location:../fetch_event?fec='.$efcode);
		exit(0);
    }
?>