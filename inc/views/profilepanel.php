<div class="panel panel-primary" id="profilepanel">
          <div class="panel-heading">
           <?php echo $_SESSION['user']['firstname']; ?>'s Profile</div>
          <div class="panel-body">
          <?php
?>
       <label>Firstname: </label><?php  echo $_SESSION['user']['firstname'] ."<br/>"; ?>
       <label>Middlename: </label><?php  echo $_SESSION['user']['middlename'] ."<br/>"; ?>
       <label>Lastname: </label><?php  echo $_SESSION['user']['lastname'] ."<br/>"; ?>
       <label>Username: </label><?php  echo $_SESSION['user']['username'] ."<br/>"; ?>
       <label>User role: </label><?php  echo $_SESSION['user']['userole'] ."<br/>"; ?>
       <label>Gender: </label><?php  echo $_SESSION['user']['gender'] ."<br/>"; ?>
       <label>Status: </label><?php  echo $_SESSION['user']['status'] ."<br/>"; ?>
          <?php
          ?>
              

          </div>
        </div>