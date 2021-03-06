<?php 
$page ='selspeaker';
session_start();
include_once './rectra/classlogin.php';
	$login = new Login();
	if(!$login->isLoggedIn())
		header('location:./login');


$event_id = htmlspecialchars($_POST['event_id']);
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
            <!-- Start content -->
            <div class="content">
                <div class="">
                    <div class="page-header-title">
                        <h4 class="page-title">Speaker</h4></div>
                </div>
                <div class="page-content-wrapper">
                    <div class="container-fluid">

<?php 
$user = $_SESSION['user'];
$chk_q="SELECT * FROM person where user = ?";
$result= $conn->prepare($chk_q);
$result->execute([$user]);
$colm=$result->fetchAll();
?>
                      <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="m-t-0 m-b-30">Select Speaker</h4>
                                        <form class="form-horizontal" role="form" method="post" action="./speech.php">
                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label" for="example-text-input">Select Speaker </label>
                                                <div class="col-sm-10">
													<select name="person_id" class="form-control" id="example-text-input" required>
														<?php foreach($colm as $row){ ?>
														<option value='<?php echo $row['p_id']; ?>'><?php echo $row['p_name']; ?></option>
														<?php } ?>
													</select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-10">
                                                   <input type="hidden" name ='event_id' value="<?php echo $event_id; ?>">
													<?php echo tokkenField(); ?>
                                                </div>
                                            </div>
                                             
											
												<div class="col-sm-2">
                                                    <button type="submit" name="person_selected"class="btn btn-success waves-effect waves-light m-l-10">Selected</button>
                                                </div>
                                            
                                           
                                        </form>
                                    </div>
                                    <!-- card-body -->
                                </div>
                                <!-- card -->
                            </div>
                        </div>
                        <!-- End row -->

                    </div>
                    <!-- container -->
                </div>
                <!-- Page content Wrapper -->
            </div>

<?php include_once './elements/footer.php'; ?>