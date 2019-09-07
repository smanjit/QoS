<?php 
$page ='dashboard';
$page_title ="welcome";
session_start();

include_once './rectra/classlogin.php';
	$login = new Login();
	if(!$login->isLoggedIn())
		header('location:./login');
	
?>
<?php include_once './elements/header.php'; ?>
<?php include_once './elements/menu.php'; ?>
<?php include_once './elements/sidebar.php'; ?>
<?php include './rectra/connection.php';?>
<?php 
include_once './rectra/encrypt_decrypt.php';
include_once './rectra/functions.php'; 
gSToken();
$user = $_SESSION['user'];
$sql = "SELECT COUNT(*) FROM `event` where user = ?";
$count = $conn->prepare($sql);
$count ->execute([$user]);
$res = $count->fetch();
$tevent= $res['COUNT(*)'];
$sql = "SELECT COUNT(*) FROM `person` where user = ?";
$count = $conn->prepare($sql);
$count ->execute([$user]);
$res = $count->fetch();
$tspeaker = $res['COUNT(*)'];

?>
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
                            <div class="col-sm-6 col-lg-3">
                                <div class="card text-center">
                                    <div class="card-heading">
                                        <h4 class="card-title text-muted font-weight-light mb-0">Total Events</h4></div>
                                    <div class="card-body p-t-10">
                                        <h2 class="m-t-0 m-b-15"><i class="mdi  text-danger m-r-10"></i><b><?php echo $tevent; ?></b></h2>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card text-center">
                                    <div class="card-heading">
                                        <h4 class="card-title text-muted font-weight-light mb-0">Total Speakers</h4></div>
                                    <div class="card-body p-t-10">
                                        <h2 class="m-t-0 m-b-15"><i class="mdi text-primary m-r-10"></i><b><?php echo $tspeaker; ?></b></h2>
                                        
                                    </div>
                                </div>
                            </div>
 <?php
$sql = "SELECT * FROM `event` where user = ?";
$count = $conn->prepare($sql);
$count ->execute([$user]);
$res = $count->fetchAll();						
?>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="m-t-0">Events List</h4>
                                                <ul class="list-group">
													<?php foreach($res as $row){ ?>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><a href="./fetch_event?fec=<?php echo encrypt($row['e_id']); ?>"><?php echo $row['e_name']; ?></a><span class="badge"  ><a href="./event_edit?e=<?php echo encrypt($row['e_id']); ?>" class="badge-primary badge-pill" style="margin-right: 10px;">Edit</a> <a class="badge-danger badge-pill" href="./rectra/event_dlt?e=<?php echo encrypt($row['e_id']); ?>">Delete</a></span> </li>
                                                    <?php } ?>
                                                </ul>
                                </div>
                            </div>
<?php
$sql = "SELECT * FROM `person` where user = ?";
$count = $conn->prepare($sql);
$count ->execute([$user]);
$res = $count->fetchAll();						
?>
							</div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="m-t-0">Speakers list</h4>
                                         <ul class="list-group">
                                                    <?php foreach($res as $row){ ?>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center"><?php echo $row['p_name'] ?><span class="badge"  ><a href="speaker_edit?p=<?php echo encrypt($row['p_id']); ?>" class="badge-primary badge-pill" style="margin-right: 10px;">Edit</a></span> </li>
                                                    <?php } ?>
                                         </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
						<!-- Inline Form -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="m-t-0 m-b-30">Event start</h4>
										
                                        <form class="form-inline" role="form" method="post" enctype="multipart/form-data" action="./event">
									       <?php echo tokkenField(); ?>
                                            <button type="submit" class="btn btn-success waves-effect waves-light m-l-10">Start Event</button>
                                        </form>
											
                                    </div>
                                    <!-- card-body -->
                                </div>
                                <!-- card -->
                            </div>
                            <!-- col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- container -->
                </div>
                <!-- Page content Wrapper -->
            </div>
            </div>
<?php include_once './elements/footer.php'; ?>