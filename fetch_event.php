<?php 
$page ='dashboard';
$page_title ="Events Details";
if(isset($_GET['fec']))
{
	$efcode= htmlspecialchars($_GET['fec']);
	
}
else{
	header('location:./signout.php');
	exit(0);
}
session_start();

include_once './rectra/classlogin.php';
	$login = new Login();
	if(!$login->isLoggedIn()){
		header('location:./login');
		exit(0);
	}
	
?>

<?php include './rectra/connection.php';?>
<?php 
include_once './rectra/encrypt_decrypt.php';
$efcode = decrypt($efcode);
include_once './rectra/functions.php'; 
gSToken();
$num =2;
$user = $_SESSION['user'];
$sql = "SELECT * FROM `speech` where e_id = ?";
$count = $conn->prepare($sql);
$count ->execute([$efcode]);
$res = $count->fetchAll();
if($res== NULL )
{
	$sql_o='DELETE FROM `event` WHERE `e_id`= ? and user = ?';
 $ftmt_o= $conn->prepare($sql_o);
	$ftmt_o->bindParam(1, $efcode, PDO::PARAM_STR);
	$ftmt_o->bindParam(2, $user, PDO::PARAM_STR);
 $ftmt_o->execute();
	header('location:./');
	exit(0);
}


?>
<?php include_once './elements/header.php'; ?>
<?php include_once './elements/menu.php'; ?>
<?php  include_once './elements/sidebar.php'; ?>
 <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="">
                    <div class="page-header-title">
                        <h4 class="page-title">Dashboard</h4></div>
                </div>
				<div class="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
							<div class="card">
								<?php  foreach($res as $row){ ?>
                                    <div class="card-body">
                                        <h4 class="m-t-0 m-b-30">Speech Name: <?php echo $row['s_name']; ?> <br/><span class="badge"  > <a class="badge-danger badge-pill" href="./rectra/speech_dlt?s=<?php echo encrypt($row['s_id']); ?>&fec=<?php echo encrypt($efcode); ?>">Delete</a></span></h4>
                                        <div class="col-lg-12">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item"><a class="nav-link" id="home-tab-2" data-toggle="tab" href="#home-<?php echo $num; ?>" role="tab" aria-controls="home-2" aria-selected="false"><span class="d-block d-sm-none">Speaker Details</span> <span class="d-none d-sm-block">Speaker Details</span></a></li>
                                                    <li class="nav-item"><a class="nav-link active" id="profile-tab-2" data-toggle="tab" href="#profile-<?php echo $num; ?>" role="tab" aria-controls="profile-2" aria-selected="true"><span class="d-block d-sm-none">Event details</span> <span class="d-none d-sm-block">Event details</span></a></li>
                                                    <li class="nav-item"><a class="nav-link" id="message-tab-2" data-toggle="tab" href="#message-<?php echo $num; ?>" role="tab" aria-controls="message-2" aria-selected="false"><span class="d-block d-sm-none">Repeated words</span> <span class="d-none d-sm-block">Repeated words</span></a></li>
                                                    <li class="nav-item"><a class="nav-link" id="setting-tab-2" data-toggle="tab" href="#setting-<?php echo $num; ?>" role="tab" aria-controls="setting-2" aria-selected="false"><span class="d-block d-sm-none">Mistakes</span> <span class="d-none d-sm-block">Mistakes</span></a></li>
                                                </ul>
                                                <div class="tab-content bg-light">
                                                    <div class="tab-pane fade" id="home-<?php echo $num; ?>" role="tabpanel" aria-labelledby="home-tab-<?php echo $num; ?>">
														<?php 
$sql = "SELECT * FROM `person` where p_id = ?";
$count = $conn->prepare($sql);
$count ->execute([$row['p_id']]);
$sn = $count->fetch();
														?>
                                                        <p><b>Speaker Name:</b><?php echo $sn['p_name']; ?></p>
                                                        
                                                    </div>
                                                    <div class="tab-pane fade show active" id="profile-<?php echo $num; ?>" role="tabpanel" aria-labelledby="profile-tab-<?php echo $num; ?>">
                                                       <?php 
$sql = "SELECT * FROM `event` where e_id = ?";
$count = $conn->prepare($sql);
$count ->execute([$row['e_id']]);
$en = $count->fetch();
															 $day=date('D j', strtotime($en["date"]));
                                                            $suffix=date('S ', strtotime($en["date"]));
                                                            $monyear= date('F, Y', strtotime($en["date"]));
															 $date = $day."<sup>".$suffix."</sup> ".$monyear;
														?>
														<p><b>Event Name:</b><?php echo $en['e_name']; ?></p>
                                                        <p><b>Event date:</b><?php echo $date; ?></p>
														<p><b>Speech time:</b><?php echo $row['time']; ?></p>
                                                    </div>
                                                    <div class="tab-pane fade" id="message-<?php echo $num; ?>" role="tabpanel" aria-labelledby="message-tab-<?php echo $num; ?>">
													<p>	<?php 
$chk_q="SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME ='repeated_word'";
$result=$conn->prepare($chk_q);
 $result->execute();
$ols=$result->fetchAll();
$sql = "SELECT * FROM `repeated_word` where s_id = ?";
$count = $conn->prepare($sql);
$count ->execute([$row['s_id']]);
$rn = $count->fetch();
foreach($ols as $ow)  { if($ow['COLUMN_NAME'] != 's_id' )	{	$text = str_replace('_','',$ow['COLUMN_NAME']);
														if($rn[$text.'_']>0){?>
                                                        <b><?php echo $text; ?></b>: <?php echo $rn[$text.'_'];} }}?> </p>
                                                    </div>
                                                    <div class="tab-pane fade" id="setting-<?php echo $num; ?>" role="tabpanel" aria-labelledby="setting-tab-<?php echo $num; ?>">
<?php 
$sql = "SELECT * FROM `mistake` where s_id = ?";
$count = $conn->prepare($sql);
$count ->execute([$row['s_id']]);
$rn = $count->fetch();
?>
                                                        <p><b>Gramatical Mistake:</b> <?php echo $rn['g_mis']; ?> </p>
                                                        <p><b>Language Mistake:</b> <?php echo $rn['l_mis']; ?></p>
														<p><b>Long Pause:</b> <?php echo $rn['lp_mis']; ?> </p>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                        <!-- end row -->
								<?php $num++; } ?>
								
</div>
                    <!-- container -->
                </div>
                <!-- Page content Wrapper -->
						
            </div>
            </div>
				</div>
            </div>
<?php include_once './elements/footer.php'; ?>