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
<?php 
$array = array();
$column = array();
include_once './functions.php';
checkToken( $_POST['user_token'], $_SESSION[ 'sestoken' ], '../signout' );
if(isset($_POST['repeated_submit'])){
include './connection.php';
$chk_q="SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME ='repeated_word'";
$result= $conn->prepare($chk_q);
$result->execute();
$cols=$result->fetchAll();
$speech_id= e($_POST['speech_id']);
$g_mis= e($_POST['g_mis']);
$lp_mis= e($_POST['lpause']);
$l_mis= e($_POST['lang']);
foreach($cols as $row)
{   
	$row['COLUMN_NAME'] = str_replace("_","",$row['COLUMN_NAME']);
	if($row['COLUMN_NAME']!='sid'){
		$array[] = ','.$_POST[$row['COLUMN_NAME']];
		$column[] = ',`'.$row['COLUMN_NAME'].'_`';
		
	}
	
	
}
echo $sql = "INSERT INTO repeated_word (`s_id`".implode($column).") VALUES ('".$speech_id."'".implode($array).")";
$insert =$conn->prepare($sql);
$insert->execute();
echo "<br>";
echo $mst = "INSERT INTO `mistake`(`s_id`, `g_mis`, `lp_mis`, `l_mis`) VALUES ('".$speech_id."',".$g_mis.",".$lp_mis.",".$l_mis.")";
$insert =$conn->prepare($mst);
$insert->execute();
	header('location: ../');
}
else{
	header('location: ../signout');
}
?>