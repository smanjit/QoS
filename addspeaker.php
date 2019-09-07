<?php 
$page ='addspeaker';
session_start();

include_once './rectra/classlogin.php';
	$login = new Login();
	if(!$login->isLoggedIn())
		header('location:./login');
	
?>
<?php include_once './elements/header.php'; ?>
<?php include_once './elements/menu.php'; ?>
<?php include_once './elements/sidebar.php'; ?>
<?php include_once './rectra/connection.php';?>
<?php 
include_once './rectra/functions.php'; 
gSToken();
?>
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="">
                    <div class="page-header-title">
                        <h4 class="page-title">ADD Speaker</h4></div>
                </div>
                <div class="page-content-wrapper">
                    <div class="container-fluid">
                        <!-- end row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="m-t-0 m-b-30">Please Insert</h4>
                                        <form class="form-horizontal" role="form" method="post" action="./rectra/person_str">
                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label" for="example-text-input">Name of the Speaker</label>
                                                <div class="col-sm-10">
													<input type=hidden name="person_id" value ="<?php echo unique_id('person', 'p_id', 12); ?>"/>
                                                    <input type="text" name="person_name" class="form-control" placeholder="Enter the name" id="example-text-input" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-10">
                                                    <?php echo tokkenField(); ?>
                                                </div>
                                            </div>
												<div class="col-sm-2">
                                                    <button type="submit" name="person_submit"class="btn btn-success waves-effect waves-light m-l-10">Submit</button>
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