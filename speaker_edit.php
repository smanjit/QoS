<?php 
$page ='editspeaker';
session_start();
$user = $_SESSION['user'];
if(isset($_GET['p'])){
    $person=$_GET['p'];
}else{
    header('location:./signout.php');
    exit(0);
}
include_once './rectra/classlogin.php';
	$login = new Login();
	if(!$login->isLoggedIn()){
		header('location:./login');
        exit(0);
    }
?>
<?php include_once './elements/header.php'; ?>
<?php include_once './elements/menu.php'; ?>
<?php include_once './elements/sidebar.php'; ?>
<?php include_once './rectra/connection.php';?>
<?php
include_once './rectra/encrypt_decrypt.php';
$person = decrypt($person);
include_once './rectra/functions.php'; 
gSToken();
?>
<?php
$sql = "SELECT * FROM `person` where p_id = ? and user = ?";
$count = $conn->prepare($sql);
$count->bindParam(1, $person, PDO::PARAM_STR);
$count->bindParam(2, $user, PDO::PARAM_STR);
$count ->execute();
$en = $count->fetch();
?>
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="">
                    <div class="page-header-title">
                        <h4 class="page-title">Update Speaker</h4></div>
                </div>
                <div class="page-content-wrapper">
                    <div class="container-fluid">
                        <!-- end row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="m-t-0 m-b-30">Please Insert</h4>
                                        <form class="form-horizontal" role="form" method="post" action="./rectra/person_str_edit">
                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label" for="example-text-input">Name of the Speaker</label>
                                                <div class="col-sm-10">
													<input type=hidden name="person_id" value ="<?php echo encrypt($en['p_id']); ?>"/>
                                                    <input type="text" name="person_name" class="form-control" value="<?php echo $en['p_name']; ?>" placeholder="Enter the name" id="example-text-input" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-10">
                                                    <?php echo tokkenField(); ?>
                                                </div>
                                            </div>
												<div class="col-sm-2">
                                                    <button type="submit" name="person_update"class="btn btn-success waves-effect waves-light m-l-10">Submit</button>
                                                </div>
                                            </div>
                                           
                                        </form>
                                    </div>
                                    <!-- card-body -->
                                </div>
                                <!-- card -->
                            </div>
                            <!-- col -->
                        </div>
                        <!-- End row -->

                    </div>
                    <!-- container -->
                </div>
                <!-- Page content Wrapper -->
            </div>

<?php include_once './elements/footer.php'; ?>