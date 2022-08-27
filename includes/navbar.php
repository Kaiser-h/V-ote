<header class="main-header">
  <nav class="navbar navbar-static-top" style="background-color:white;box-shadow: -1px 6px 6px -3px rgba(0,0,0,0.66);
-webkit-box-shadow: -1px 6px 6px -3px rgba(0,0,0,0.66);
-moz-box-shadow: -1px 6px 6px -3px rgba(0,0,0,0.66);">
    <div class="container">
      <div class="navbar-header">
        <a href="#" class="navbar-brand" style="color:black ; font-size: 22px;"><b>ASSAG-VOTE</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <?php
            if(isset($_SESSION['student'])){
              echo "
                <li><a href='index.php'>HOME</a></li>
                <li><a href='transaction.php'>TRANSACTION</a></li>
              ";
            } 
          ?>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu" >
        <ul class="nav navbar-nav">
          <li><a href="logout.php"> <b style="color:black ; font-size: 22px;> <i class=fas fa-sign-out"> </b></i> <b  style="color:#5CA4A9 ; font-size: 22px; " > LOGOUT </b></a></li>  
        </ul>
      </div>
      <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</header>

