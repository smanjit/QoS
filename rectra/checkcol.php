<?php
include './rectra/connection.php';
$flag=0;
if(isset($_POST['repeated_submit']))
{
    $word= trim( htmlspecialchars($_POST['repeated_words']));
    
    if($word==null || $word=='')
     {  
		unset($_SESSION[ 'msg' ]);
        $_SESSION['msg'] = "Don't manupilate my code"; 
		header("location:./addrword");
         exit(0);
     }
	else{
		$word =  str_replace(' ','',$word);
	$word = $word."_";
$chk_q="SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME ='repeated_word'";
$result=$conn->prepare($chk_q);
 $result->execute();
$cols=$result->fetchAll();
 
    foreach ($cols as $row)
    {   
        if($row['COLUMN_NAME'] == $word)
        {
            $flag=1;
            break;
        }
    }
    if ($flag !=1)
    {
      $inst="ALTER TABLE `repeated_word` ADD $word INT(3) NULL DEFAULT '0'";
      $stmt = $conn->prepare($inst);
      $stmt->execute();
		$_SESSION['msg'] = "Word has been added! Thank you!";
      header("location:./addrword");
      exit(0);
    }
    else{
		unset($_SESSION[ 'msg' ]);
		$_SESSION['msg'] = "Word already exists";
     header("location:./addrword");
      exit(0); 
    }
}
}
else{
	unset($_SESSION[ 'msg' ]);
	$_SESSION['msg'] = "dont try";
	header("location:./addrword");
      exit(0);
}
?>