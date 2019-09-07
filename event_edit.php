<?php include_once "./rectra/connection.php"; ?>
<?php 
$page ='dashboard';
$page_title ="Events Update";
if(isset($_GET['e']))
{
	$efcode= htmlspecialchars($_GET['e']);
}
else{
	header('location:./signout.php');
	exit(0);
}
session_start();

include_once './rectra/classlogin.php';
	$login = new Login();
	if(!$login->isLoggedIn()){
		header('location:../login');
		exit(0);
	}
?>
<?php include './connection.php';?>
<?php 
include_once './rectra/encrypt_decrypt.php';
$efcode = decrypt($efcode);
include_once './rectra/functions.php'; 
gSToken();
$num =2;
$user = $_SESSION['user'];
?>
<?php include_once './elements/header.php'; ?>
<?php include_once './elements/menu.php'; ?>
<?php  include_once './elements/sidebar.php'; ?>
<?php 
    $sql = "SELECT * FROM `event` where e_id = ? and user = ? ";
    $count = $conn->prepare($sql);
				$count->bindParam(1, $efcode, PDO::PARAM_STR);
				$count->bindParam(2, $user, PDO::PARAM_STR);
    $count ->execute();
    $en = $count->fetch();
?>
 <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="">
                    <div class="page-header-title">
                        <h4 class="page-title">UPDATE</h4></div>
                </div>
				<div class="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
							<div class="card">
								   <div class="card-body">
                                        <h4 class="m-t-0 m-b-30">EVENT</h4>
                                        <div class="col-lg-12">
                                                <ul class="nav nav-tabs nav-justified" role="tablist">
                                                    <li class="nav-item"><a class="nav-link active" id="profile-tab-2" data-toggle="tab" href="#profile-<?php echo $num; ?>" role="tab" aria-controls="profile-2" aria-selected="true">
														<span class="d-block d-sm-none">Event details</span> 
														<span class="d-none d-sm-block">Event details</span></a></li>
                                              </ul>
                                                <div class="tab-content bg-light">                       
                                                        <form class="form-horizontal" role="form" method="post" action="./rectra/event_edit_db">
																																																												<input type=hidden name="event_id" value ="<?php echo encrypt($en['e_id']);  ?>"/>
                                                            <p><b>Event Name:</b> <input type="text"  id="example-text-input" class="form-control" name="name" value="<?php echo $en['e_name']; ?>" placeholder="event name" required></p>
                                                            <p><b>Event date:</b><input type="date" name="event_date" class="form-control" id="example-text-input" value="<?php echo $en['date']; ?>" required></p>
																																																													<div class="col-sm-2">
																																																													<button type="submit" name="event_update"class="btn btn-success waves-effect waves-light m-l-10">Update</button>
																																																													</div>
																																																								</form>
                                                        
                                                </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php include_once './elements/footer.php'; ?>