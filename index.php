<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('location: admin/home.php');
  	}

    if(isset($_SESSION['voter'])){
      header('location: home.php');
    }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page" style="background-color:#e4eaec"> 
<div class="login-box" style="background-color:white;border:2px solid;border-radius:10px;color:white ; font-size: 22px; font-family:Times;text-align:center;box-shadow: 2px 2px 18px -5px rgba(0,0,0,0.75);
-webkit-box-shadow: 2px 2px 18px -5px rgba(0,0,0,0.75);
-moz-box-shadow: 2px 2px 18px -5px rgba(0,0,0,0.75);">
  	<div class="login-logo" style="color:black;font-size: 25px; font-family:Times;padding-top:2rem;">
		<img src="./images/bbox.jpg" height="100px" width="100px" class="cimage"/>
  		<b>ASSAG ELECTION 2022</b>
  	</div>
  
  	<div class="login-box-body" style="font-size: 22px; font-family:Times" >
    	<p class="login-box-msg" style="color:black ; font-size: 18px; font-family:Times  " >Sign in to start your voting session</p>

    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback" style='padding-bottom:2rem;'>
        		<input type="text" class="form-control" name="voter" placeholder="Student's ID " style='height:5rem;outline:2px solid; font-size:18px;' required>
        		<span class="glyphicon glyphicon-user form-control-feedback" style='padding-top:1rem;'></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Student's ID" style='height:5rem;outline:2px solid; font-size:18px;' required>
            <span class="glyphicon glyphicon-lock form-control-feedback" style='padding-top:1rem;'></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-curve" style="background-color: #17b3a3 ;color:black ; font-size: 16px; font-family:Times; height:5rem;width:15rem; outline:none;" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
      		</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>

<style>
	.cimage{
	display:'block';
	border-radius: 50%;
	
}
</style>
</body>
</html>
