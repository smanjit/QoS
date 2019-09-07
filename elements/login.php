<body>
    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card card-pages">
            <div class="card-body">
                <h3 class="text-center m-t-0 m-b-15"><a href="index.html" class="logo logo-admin"><span>GMT</span>Checker</a></h3>
                <h4 class="text-muted text-center m-t-0"><b>Sign In</b></h4>
				
				<h5 class="text-muted text-center m-t-0"><b><font color="#F70004" ><?php
					   if($er==0)
		                  $login->showErrors();
					?></font></b></h5>
                <form class="form-horizontal m-t-20" enctype="multipart/form-data" method="post" action="<?php $_SERVER['PHP_SELF'] ?> ">
                    <div class="form-group">
                        <div class="col-12">
                            <input class="form-control" name="user" type="text" required="" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <input class="form-control" name="pass" type="password" required="" placeholder="Password">
							<?php echo tokkenField(); ?>
						</div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup">Remember me</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-40">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" name="sbtn" type="submit">Log In</button>
                        </div>
                    </div>
                    <div class="form-group row m-t-30 m-b-0">
                        <div class="col-sm-7"><a href="./signup" class="text-muted"><i class="fa fa-lock m-r-5"></i>Create New Account</a></div>
<!--                        <div class="col-sm-5 text-right"><a href="pages-register.html" class="text-muted">Create an account</a></div>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
    