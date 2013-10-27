
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>        
      </div><!-- modal-header-->
      <div class="modal-body">
        <div class="existingusercontainer">
          <p>Registered User</p>
          <form method="post" action="BL/userBL.php">
            <div class="forminput"><label>Username</label><input type="text" name="username" placeholder="username" />
              <?php
              if($_SESSION['numerrors'] > 0){
                if(array_key_exists('username', $_SESSION['errors']))
                {
                  echo "<font size=\"2\" color=\"#ff0000\">".$_SESSION['errors']['username']."</font>";
                }
              }
              ?></div></br> 
              <label>Password</label><input type="password" name="password" placeholder="password">
              <?php
              if($_SESSION['numerrors'] > 0){
                if(array_key_exists('password', $_SESSION['errors']))
                {
                  echo "<font size=\"2\" color=\"#ff0000\">".$_SESSION['errors']['password']."</font>";
                }
              }
              ?>
            </br>
            <button class="btn btn-primary btn-small" type="submit" name="login">login</button>
            <label name="existinguseroutput" >
             <?php
             if($_SESSION['numerrors'] > 0){
              if(array_key_exists('user', $_SESSION['errors']))
              {
                echo "<font size=\"2\" color=\"#ff0000\">".$_SESSION['errors']['user']."</font>";
              }
            }
            ?>
          </label>
        </form>
      </div><!--existingusercontainer-->
      </div><!-- modal-body-->
      <div class="modal-footer">
        
      </div><!-- modal-footer -->
      </div><!-- modal-content -->
    </div><!-- modal-dialog -->