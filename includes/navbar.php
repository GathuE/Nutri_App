<div>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="index" style="cursor:pointer;color:#fff;font-size:14px;">Site Name</a><br>
        <a class="btn" style="color:#138ea4;font-size:11px;font-weight:bold;margin-left:20px;border-color:#138ea4;" href="#">Read Our Articles</a>
        <button class="navbar-toggler"  style="color:#fff;background-color:#fff;" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon" ></span></button>
          <?php if (!isset($_SESSION['logged_in'])) { ?>
            <div class="collapse navbar-collapse" id="navcol-1">
              
              <span class="navbar-text actions ml-auto">
                <a class="btn btn-light action-button" style="background-color:#138ea4;color:#fff;" role="button" href="login" >Log In</a>
              </span>
            </div>
          <?php } else { ?>
            <div class="collapse navbar-collapse" id="navcol-1">
              <div class="dropdown ml-auto">
                <button class="btn dropdown-toggle action-button" style="background-color:#421966;border-color:#138ea4;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $_SESSION['username']; ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="details">Edit Profile</a>
                  <a class="dropdown-item" href="downloads.php">Downloads</a>
                  <a class="dropdown-item" href="classes/logout">Logout</a>
                </div>
                </div>
              </div>
                  
              
              <?php } ?>
        </div>
    </nav>          
</div>


