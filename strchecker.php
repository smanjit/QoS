<?php 
$page ='selspeaker';
session_start();
//include_once './rectra/classlogin.php';
//	$login = new Login();
//	if(!$login->isLoggedIn())
//		header('location:./login');


$speech_id = htmlspecialchars($_POST['speech_id']);
?>
<?php include './rectra/connection.php';
$chk_q="SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME ='repeated_word'";
$result= $conn->prepare($chk_q);
$result->execute();
$cols=$result->fetchAll();
include_once './rectra/functions.php';
//checkToken( $_POST['user_token'], $_SESSION[ 'sestoken' ], './signout' );
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
                        <h4 class="page-title">Repeated Words</h4></div>
                </div>
				<div class="page-content-wrapper">
                    <div class="container-fluid">
						<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="m-t-0 m-b-30">Repeated Words   </h4>
                                        <div class="">
                                            <form  role="form" method="post" action="./rectra/mistk_str">
												<div class="col-lg-12 col-md-5 m-b-20">
                                                <?php foreach ($cols as $row){ $rword = str_replace("_","",$row['COLUMN_NAME']);
												if($rword=='sid'){
													continue;
												}
												
                                                    $text = str_replace('_', '', $row['COLUMN_NAME']);
           echo '<button type="button" class="btn btn-primary waves-effect waves-light" onclick="myFunction'.$text.'()" style="margin-right: 15px; margin-bottom: 15px">'.$text.'<br><input type="text" value= 0 size="1"  name="'.$text.'" id="'.$text.'" readonly>';
                                                
												 }?>
													</div>
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
                                        <h4 class="m-t-0 m-b-30">Mistakes</h4>
                                        
                                            <div class="col-lg-11 col-md-3 m-b-5">
                                                    <button type="button"  onclick="myFunctionlpause()" class="btn btn-primary waves-effect waves-light" >Long Pause<br><input name='lpause' type="text" value ='0' size='1' id="lpause" readonly></button>
                                                
											
                                                    <button type="button"  onclick="myFunctionlang()" class="btn btn-primary waves-effect waves-light" >Language Mistake<br><input name="lang" type="text" value ='0' size='1' id="lang" readonly></button>
                                                
											
                                                    <button type="button"  onclick="myFunctiong_mis()" class="btn btn-primary waves-effect waves-light" >Gramitical Mistake<br><input name='g_mis' type="text" value ='0' size='1' id="g_mis" readonly></button>
                                                </div>
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-10">
													<input type="hidden" name="speech_id" value="<?php echo $speech_id; ?>">
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
<script>
	
	
	var addlpause = (function () {
             var counter = 0;
             return function () {return counter += 1;}
             })(); 
	function myFunctionlpause(){
                     document.getElementById("lpause").value = addlpause();
                    }
	
	var addlang = (function () {
             var counter = 0;
             return function () {return counter += 1;}
             })(); 
	function myFunctionlang(){
                     document.getElementById("lang").value = addlang();
                    }
	
	var addg_mis = (function () {
             var counter = 0;
             return function () {return counter += 1;}
             })(); 
	function myFunctiong_mis(){
                     document.getElementById("g_mis").value = addg_mis();
                    }
	<?php
 foreach ($cols as $row)
    {   
        if($row['COLUMN_NAME'] != 's_id')
        {  
			$text = str_replace('_', '', $row['COLUMN_NAME']);
			?>
			var add<?php echo $text; ?> = (function () {
             var counter = 0;
             return function () {return counter += 1;}
             })();
			
	function myFunction<?php echo $text; ?>(){
                     document.getElementById("<?php echo $text; ?>").value = add<?php echo $text; ?>();
                    }
           
  <?php       
		}
    }
	?>

</script>

<?php include_once './elements/footer.php'; ?>