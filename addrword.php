<?php 
$page ='addrword';
session_start();

include_once './rectra/classlogin.php';
	$login = new Login();
	if(!$login->isLoggedIn())
		header('location:./login');
	
?>
<?php 
if(isset($_POST['repeated_submit']))
{
    include_once './rectra/checkcol.php';
}

?>
<?php include_once './elements/header.php'; ?>
<?php include_once './elements/menu.php'; ?>
<?php include_once './elements/sidebar.php'; ?>
<?php include './rectra/connection.php';?>
<?php 
$chk_q="SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME ='repeated_word'";
$result= $conn->prepare($chk_q);
$result->execute();
$cols=$result->fetchAll();
include_once './rectra/functions.php'; 
gSToken();

if(isset($_SESSION['msg']))
{
	$msg = trim(htmlspecialchars($_SESSION['msg']));
}
?>
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="">
                    <div class="page-header-title">
                        <h4 class="page-title">ADD Repeated Words</h4></div>
                </div>
				<div class="page-content-wrapper">
                    <div class="container-fluid">
						<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="m-t-0 m-b-30">Repeated Words   </h4><P style="color: firebrick"><?php if(isset($msg)){ echo $msg; unset($_SESSION[ 'msg' ]); } ?></P>
                                        <div class="">
                                            <div class="row text-center">
                                                <?php foreach ($cols as $row){ $rword = str_replace("_","",$row['COLUMN_NAME']);
												if($rword=='sid'){
													continue;
												}
												?>
                                                <div class="col-lg-2 col-md-5 m-b-10">
                                                    <button type="button"  class="btn btn-primary waves-effect waves-light" ><?php echo $rword; ?></button>
                                                </div>
												<?php }?>
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="m-t-0 m-b-30">Please Insert</h4>
                                        <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label" for="example-text-input">Word</label>
                                                <div class="col-sm-10">
													<input type="text" name="repeated_words" class="form-control" placeholder="Enter the word" id="example-text-input" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-10">
                                                    <?php echo tokkenField(); ?>
                                                </div>
                                            </div>
												<div class="col-sm-2">
                                                    <button type="submit" name="repeated_submit"class="btn btn-success waves-effect waves-light m-l-10">Submit</button>
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