<?php 
$page ='selspeaker';
session_start();
include_once './rectra/classlogin.php';
	$login = new Login();
	if(!$login->isLoggedIn())
		header('location:./login');


$event_id = htmlspecialchars($_POST['event_id']);
$person_id = htmlspecialchars($_POST['person_id']);
?>
<?php include './rectra/connection.php';
include_once './rectra/functions.php';
checkToken( $_POST['user_token'], $_SESSION[ 'sestoken' ], './signout' );
gSToken();
?>
<?php include_once './elements/header.php'; ?>
<?php include_once './elements/menu.php'; ?>
<?php include_once './elements/sidebar.php'; ?>
<div class="content-page">
<div class="content">
                <div class="">
                    <div class="page-header-title">
                        <h4 class="page-title">Speech</h4></div>
                </div>
                <div class="page-content-wrapper">
                    <div class="container-fluid">
                        <!-- end row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="m-t-0 m-b-30">Add Speech</h4>
                                        <form class="form-horizontal" role="form" method="post" action="./rectra/speech_str.php">
                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label" for="example-text-input">Name of the Speech</label>
                                                <div class="col-sm-10">
													<input type=hidden name="speech_id" value ="<?php echo unique_id('speech', 's_id', 12); ?>"/>
                                                    <input type="text" name="speech_name" class="form-control" placeholder="Speech name" id="example-text-input" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label" for="example-email">Time</label>
                                                <div class="col-sm-10">
                                                    <input type="time" name="speech_time" class="form-control" id="example-text-input" required>
													<input type="hidden" name="event_id" class="form-control" value="<?php echo $event_id; ?>" required>
													<input type="hidden" name="person_id" class="form-control" value="<?php echo $person_id; ?>" required>
													<?php echo tokkenField(); ?>
                                                </div>
                                            </div>
                                             
											<div class="form-group row">
												<div class="col-sm-2">
                                                    <button type="submit" name="speech_submit" class="btn btn-success waves-effect waves-light m-l-10">Start</button>
                                                </div>
                                            
											</div>
                                        </form>
                                    </div>
                                    <!-- card-body -->
                                </div>
                                <!-- card -->
                            </div>
                            <!-- col -->

                        <!-- End row -->

                    </div>
                    <!-- container -->
                </div>
                <!-- Page content Wrapper -->
            </div>
<?php include_once './elements/footer.php'; ?>