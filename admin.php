<?php include(dirname(__FILE__)."/inc/include/session.php");

if ($_SESSION['userrole'] == "admin" || $_SESSION['userrole'] == "normal" )
{
}
else
{
  header("location:user.php");
}
?>
<DOCTYPE html>
  <html>
  <head>
    <!--  <link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="../css/jquery.lightbox-0.5.css" media="screen">

    <!--  <link href="../bt/css/bootstrap.css" rel="stylesheet" media="screen">  -->
    <!--  <link href="../bt/css/bootstrap-responsive.css" rel="stylesheet"> -->
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="">
    <link href ="css/style.css" rel ="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/admin.css">

  </head>
  <body>
    <?php

    require(dirname(__FILE__)."/inc/DAO/locationDAO.php");
    $locationDAO = new locationDAO();

    require(dirname(__FILE__)."/inc/DAO/categoryDAO.php");
    $categoryDAO = new categoryDAO();

    require (dirname(__FILE__).'/inc/DAO/placeDAO.php');
    $placeDAO = new placeDAO();

    require (dirname(__FILE__).'/inc/DAO/userDAO.php');
    $userDAO = new userDAO();

    require(dirname(__FILE__).'/inc/DAO/routeDAO.php');
    $routeDAO = new routeDAO();

    ?>
    <div class="container contena">

     <!-- Top Menu  -->
     <?php include('inc/include/header.php'); ?>
     <!-- Top Menu  -->

     <!-- Investigate on using Tabs -->
     
     <div class="row">
       <label class=""> Welcome <?php echo $_SESSION['user']['firstname']; ?></label>   
       <div class="col-lg-12">
         <div class="col-lg-4">
          <div class="list-group" >
            <a href="admin.php?panel=profilepanel" class="list-group-item active">Profile</a>
            <?php 
            if($_SESSION["userrole"] == "admin")
            {
              ?>
              <a href="admin.php?panel=userpanel" class="list-group-item">Users
                <?php
                $users = $userDAO->getusers();
                $newusercount = 0;
                foreach ($users as $user) {
                  if($user["status"] == "pending")
                  {
                    $newusercount++;
                  }
                }
                ?>
                <span class="badge"><?php echo $newusercount; ?></span>
              </a>
              <a href="admin.php?panel=categorypanel" class="list-group-item">Categories
              </a>
              <a href="admin.php?panel=locationpanel" class="list-group-item">Locations
                <span class="badge">14</span>
              </a>
              <a href="admin.php?panel=routepanel" class="list-group-item">Routes
                <span class="badge">1</span>
              </a>
              <?php 
            }
            if($_SESSION["userrole"] == "admin" ||
             $_SESSION["userrole"] == "normal")
            {
              ?>
              <a href="admin.php?panel=placepanel" class="list-group-item">Places
                <span class="badge">22</span>
              </a>
              <a href="admin.php?panel=newspanel" class="list-group-item">News
                <span class="badge">14</span>
              </a>
              
              <?php 
            }
            ?>

          </div>
        </div>
        <div class="col-lg-8">
         <?php
         if(array_key_exists('panel', $_GET))
         {
           $url = $_GET['panel'];
           if ($url == "profilepanel"){ include 'inc/views/profilepanel.php';}// Includes profile panel
           elseif($url == "userpanel"){ include 'inc/views/userpanel.php'; } //Includes user panel
          elseif ($url == "edituserpanel") { include 'inc/views/edituserpanel.php'; } // Includes edit user panel
           elseif ($url == "categorypanel") { include 'inc/views/categorypanel.php';} // Includes category panel
           elseif ($url == "locationpanel") { include 'inc/views/locationpanel.php';} // Includes location panel
           elseif ($url == "placepanel") { include 'inc/views/placepanel.php'; } // Includes place panel
           elseif ($url == "addplacepanel") { include 'inc/views/addplacepanel.php'; } // Includes place panel
           elseif ($url == "newspanel") { include 'inc/views/newspanel.php'; } // Includes news panel
           elseif ($url == "routepanel") { include 'inc/views/routepanel.php'; } // Includes route panel
           elseif ($url == "viewroutepanel") { include 'inc/views/viewroutepanel.php'; } // Includes viewroute panel

         }
         else
         {
          include 'inc/views/profilepanel.php';
        }
        ?>
      </div>
    </div>


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </div>


  <!-- Footer  -->
  <?php include('inc/include/footer.php'); ?>
  <!-- Footer  -->

</div>
</body>
</html>