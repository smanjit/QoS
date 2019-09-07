<?php include_once './elements/header.php'; ?>
<body>
    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card card-pages">
            <div class="card-body">
                <h3 class="text-center m-t-0 m-b-15"><a href="index.html" class="logo logo-admin"><span>Web</span>Admin</a></h3>
                <h4 class="text-muted text-center m-t-0"><b>Sign Up</b></h4>
				<h5 class="text-muted text-center m-t-0"><b><font color="#F70004" ><?php
					if(array_key_exists('x', $_GET) && $_GET['x'] != NULL)
					{
						$x = trim(htmlspecialchars($_GET['x']));
						switch($x)
						{
							case "password didn't match":
							case "username already exist":
							case "session expire":
							case "sucessfully signout":
								echo $x;
								break;
							default:
								header("location:./index");
						}
					}
					
					
					?></font></b></h5>
                <form class="form-horizontal m-t-20" method="post" enctype="multipart/form-data" action="./rectra/signupp">
<!--
                    <div class="form-group">
                        <div class="col-12">
                            <input class="form-control" type="email" required="" placeholder="Email">
                        </div>
                    </div>
-->
                    <div class="form-group">
                        <div class="col-12">
                            <input class="form-control" name="user" type="text" required="" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <input class="form-control" name="pass" type="password" required="" placeholder="Password">
                        </div>
                    </div>
					<div class="form-group">
                        <div class="col-12">
                            <input class="form-control" name="repass" type="password" required="" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <!--<div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox" checked="checked">
                                <label for="checkbox-signup">I accept <a href="#">Terms and Conditions</a></label>
                            </div>-->
                        </div>
                    </div>
                    <div class="form-group text-center m-t-40">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" name="sbttn" type="submit">Register</button>
                        </div>
                    </div>
                    <div class="form-group m-t-30 m-b-0">
                        <div class="col-sm-12 text-center"><a href="./login" class="text-muted">Already have account?</a></div>
                    </div>
                </form>
            </div>
        </div>
<?php include_once './elements/footer.php'; ?>