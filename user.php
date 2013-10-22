<?php require_once(dirname(__FILE__)."/inc/include/session.php");?>

<!DOCTYPE html>
<html>
<head>
 <title>City Guide</title> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" type="text/css" href="../css/jquery.lightbox-0.5.css" media="screen">
 <!--  <link href="../bt/css/bootstrap.css" rel="stylesheet" media="screen">  -->
 <!--  <link href="../bt/css/bootstrap-responsive.css" rel="stylesheet"> -->
 <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="">
 <link type="text/css" href ="css/style.css" rel ="stylesheet">
 <link type="text/css" rel="stylesheet" href="css/place.css">
 <link href ="css/style.css" rel ="stylesheet">

</head>
<body>
  <?php

  require(dirname(__FILE__)."/inc/DAO/locationDAO.php");
  $locationDAO = new locationDAO();

  require(dirname(__FILE__)."/inc/DAO/categoryDAO.php");
  $categoryDAO = new categoryDAO();

  require(dirname(__FILE__)."/inc/DAO/placeDAO.php");
  $placeDAO = new placeDAO();

  ?>
  <div class ="container contena"> 

    <!-- Top Menu  -->
    <?php include('inc/include/header.php'); ?>
    <!-- Top Menu  -->

    <!-- Main Content -->
    
    <div class="row">

      <div class="col-lg-6" >
        <div class="existingusercontainer">
          <p>Registered User</p>
          <form method="post" action="inc/BL/userBL.php">
            <div class="forminput"><label>Username</label><input type="text" name="username" placeholder="username" />
              <?php
              if (array_key_exists('numerrors', $_SESSION))
              {
              if($_SESSION['numerrors'] > 0){
                if(array_key_exists('username', $_SESSION['errors']))
                {
                  echo "<font size=\"2\" color=\"#ff0000\">".$_SESSION['errors']['username']."</font>";
                }
              }
              }
              ?></div></br> 
              <label>Password</label><input type="password" name="password" placeholder="password">
              <?php
                        if (array_key_exists('numerrors', $_SESSION))
              {
              if($_SESSION['numerrors'] > 0){
                if(array_key_exists('password', $_SESSION['errors']))
                {
                  echo "<font size=\"2\" color=\"#ff0000\">".$_SESSION['errors']['password']."</font>";
                }
              }
            }
              ?>
            </br>
            <button class="btn btn-primary btn-small" type="submit" name="login">login</button>
            <label name="existinguseroutput" >
             <?php
                       if (array_key_exists('numerrors', $_SESSION))
              {
             if($_SESSION['numerrors'] > 0){
              if(array_key_exists('user', $_SESSION['errors']))
              {
                echo "<font size=\"2\" color=\"#ff0000\">".$_SESSION['errors']['user']."</font>";
              }
            }
          }
            ?>
          </label>
        </form>
      </div><!--existingusercontainer-->
    </div><!--col-lg-6 -->
    <div class="col-lg-5 col-lg-offset-1">
      <div class="newusercontainer">
        <p>New User</p>
        <form method="post" action="inc/BL/userBL.php">
          <div class="forminput"><label>First Name</label><input type="text" name="firstname" placeholder="firstname" maxlength="20">
            <?php 
          if (array_key_exists('numerrors', $_SESSION))
              {
            if($_SESSION['numerrors'] > 0){
              if(array_key_exists('firstname', $_SESSION['errors']))
              {
                echo "<font size=\"2\" color=\"#ff0000\">".$_SESSION['errors']['firstname']."</font>";
              }
            }
          }
            ?>
          </div>
          <div class="forminput"><label>Middle Name</label><input type="text" name="middlename" placeholder="middlename" maxlength="20">
            <?php 
          if (array_key_exists('numerrors', $_SESSION))
              {
            if($_SESSION['numerrors'] > 0){
              if(array_key_exists('middlename', $_SESSION['errors']))
              {
                echo "<font size=\"2\" color=\"#ff0000\">".$_SESSION['errors']['middlename']."</font>";
              }
            }
          }
            ?>
          </div>
          <div class="forminput"><label>Last Name</label><input type="text" name="lastname" placeholder="lastname" maxlength="20">
            <?php 
          if (array_key_exists('numerrors', $_SESSION))
              {
            if($_SESSION['numerrors'] > 0){
              if(array_key_exists('lastname', $_SESSION['errors']))
              {
                echo "<font size=\"2\" color=\"#ff0000\">".$_SESSION['errors']['lastname']."</font>";
              }
            }
          }
            ?>
          </div>
          <div class="forminput"><label>Gender</label><input type="text" name="gender" placeholder="gender">
            <?php 
          if (array_key_exists('numerrors', $_SESSION))
              {
            if($_SESSION['numerrors'] > 0){
              if(array_key_exists('gender', $_SESSION['errors']))
              {
                echo "<font size=\"2\" color=\"#ff0000\">".$_SESSION['errors']['gender']."</font>";
              }
            }
          }
            ?>
          </div>
          <div class="forminput"><label>Username</label><input type="text" name="newusername" placeholder="username">
            <?php 
          if (array_key_exists('numerrors', $_SESSION))
              {
            if($_SESSION['numerrors'] > 0){
              if(array_key_exists('newusername', $_SESSION['errors']))
              {
                echo "<font size=\"2\" color=\"#ff0000\">".$_SESSION['errors']['newusername']."</font>";
              }
            }
          }
            ?>
          </div>
          <div class="forminput"><label>Password</label><input type="password" name="newpassword" placeholder="password">
            <?php 
          if (array_key_exists('numerrors', $_SESSION))
              {
            if($_SESSION['numerrors'] > 0){
              if(array_key_exists('newpassword', $_SESSION['errors']))
              {
                echo "<font size=\"2\" color=\"#ff0000\">".$_SESSION['errors']['newpassword']."</font>";
              }
            }
          }
            ?>
          </div>
          <button type="submit" name="newuser" class="btn btn-primary btn-small"> Add New User </button>
          <label name="newuseroutput">
            <?php
                      if (array_key_exists('numerrors', $_SESSION))
              {
            if($_SESSION['numerrors'] > 0){
              if(array_key_exists('registerError', $_SESSION['errors']))
              {
                echo "<font size=\"2\" color=\"#ff0000\">".$_SESSION['errors']['registerError']."</font>";
              }
            }
          }
            ?>
          </label>
        </form>
      </div> <!--newusercontainer-->
    </div><!--col-lg-6-->
  </div><!--row-->

  <!-- Main Content -->

  <!-- Footer  -->
  <?php include('inc/include/footer.php'); ?>
  <!-- Footer  -->

</div>
<script src="bt/js/jquery.js"></script>
<script src="js/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery.lightbox-0.5.js"></script>

<script src="bt/js/bootstrap.min.js"></script>
<script type="text/javascript" src="jquery/cycle.js"></script>
</body>
</html>