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
if(isset($_GET['e']))
{
	$efcode= htmlspecialchars($_GET['e']);
	
}
else{
	header('location:../signout');
	exit(0);
}
if(isset($_GET['e']))
    {
// delete event from event 
        $id=decrypt($_GET['e']);
        $sql='DELETE FROM `event` WHERE `e_id`= ? and user = ?';
        $ftmt= $conn->prepare($sql);
		$ftmt->bindParam(1, $id, PDO::PARAM_STR);
		$ftmt->bindParam(2, $user, PDO::PARAM_STR);
        $ftmt->execute();
        
// fetch speech from event id
        $sql_s = 'Select * from speech where e_id = ? ';
        $ftmt_s= $conn->prepare($sql_s);
        $ftmt_s->execute([$id]);
        $res_s = $ftmt_s->fetch();
        
        
        // delete speech from speech table
        $sql_sDel='DELETE FROM `speech` WHERE `s_id`= ?';
        $ftmt_sDel= $conn->prepare($sql_sDel);
        $ftmt_sDel->execute([$res_s['s_id']] );
        
        // delete from mistake table
        $sql_mDel='DELETE FROM `mistake` WHERE `s_id`= ?';
        $ftmt_mDel= $conn->prepare($sql_mDel);
        $ftmt_mDel->execute([$res_s['s_id']] );
        
        //delete from repeted word table
        $sql_rDel='DELETE FROM `repeated_word` WHERE `s_id`= ?';
        $ftmt_rDel= $conn->prepare($sql_rDel);
        $ftmt_rDel->execute([$res_s['s_id']] );
        
        header('location:../');
		exit(0);
    }
?>