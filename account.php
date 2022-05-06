<?php
session_start();
include 'functions.php';
template_header('Product');
?>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('imgs/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2">&nbsp;</span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-intro">
    	<div class="container">
    		<div class="row no-gutters">
                <?php

 if(isset($_SESSION['id'])) //check if user is logged in and display buttons
    {
    ?>
                <div class="col-md-4 d-flex">
    				<div class="intro d-lg-flex w-100 ftco-animate">
    					<div class="icon">
    						<span class="flaticon-support"></span>
    					</div>
    					<div class="text">
    						<a href="user_search.html" class="btn btn-info btn-block">User Search</a>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4 d-flex">
    				<div class="intro color-1 d-lg-flex w-100 ftco-animate">
    					<div class="icon">
    						<span class="flaticon-cashback"></span>
    					</div>
    					<div class="text">
    						<a href="logout.php" class="btn btn-info btn-block">Sign Out of Your Account</a>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4 d-flex">
    				<div class="intro color-2 d-lg-flex w-100 ftco-animate">
    					<div class="icon">
    						<span class="flaticon-free-delivery"></span>
    					</div>
    					<div class="text">
    						<a href="index.php" class="btn btn-info btn-block">Return to home page</a>
    					</div>
    				</div>
    			</div>

<?php  }else{ // if user is not logged in then display these buttons?> 
                
                <div class="col-md-6 d-flex">
    				<div class="intro d-lg-flex w-100 ftco-animate">
    					<div class="icon">
    						<span class="flaticon-support"></span>
    					</div>
    					<div class="text">
    						<h2>Click here to Log in</h2>
    						<a href="login.php" class="btn btn-info btn-block">Log In</a>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-6 d-flex">
    				<div class="intro color-1 d-lg-flex w-100 ftco-animate">
    					<div class="icon">
    						<span class="flaticon-cashback"></span>
    					</div>
    					<div class="text">
    						<h2>Click here to register</h2>
    						<a href="register.php" class="btn btn-info btn-block">Create New Account</a>
    					</div>
    				</div>
    			</div>
<?php } ?>
    			
    		</div>
    	</div>
    </section>



<?=template_footer()?>