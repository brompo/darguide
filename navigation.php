    <?php include(dirname(__FILE__)."/inc/include/session.php");?>
    <!DOCTYPE html>
    <html>
    <head>
    	<title>City Guide</title> 
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<!-- Bootstrap -->
      <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen">

      <!--  <link href="bt/css/bootstrap.css" rel="stylesheet" media="screen">  -->
      <!--  <link href="bt/css/bootstrap-responsive.css" rel="stylesheet"> -->
      <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="">
      <link href ="css/style.css" rel ="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/place.css">
    </head>
    <body>
     <?php

     require(dirname(__FILE__)."/inc/DAO/locationDAO.php");
     $locationDAO = new locationDAO();

     require(dirname(__FILE__)."/inc/DAO/categoryDAO.php");
     $categoryDAO = new categoryDAO();

     require(dirname(__FILE__)."/inc/DAO/placeDAO.php");
     $placeDAO = new placeDAO();

     require(dirname(__FILE__)."/inc/DAO/pictureDAO.php");
     $pictureDAO = new pictureDAO();

     ?>

     <div class ="container contena"> 

       <!-- Top Menu  -->
       <?php include('inc/include/header.php'); ?>
       <!-- Top Menu  -->

       <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-7 sitemap">
              <a href="index.php">Home </a> > Services > <?php echo $_GET['name']."s";?>
            </div>
            <div class= "col-lg-4 feature">
              Featured
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8">
              <div class="row">
                <!--  Images at the Left side of the page  -->
                <div class="col-sm-4 col-sm-4 col-sm-push-7 banner">
                  <img src="images/13.jpg"></img>
                  <img src="images/9.jpg"></img>
                  <img src="images/8.jpg"></img>
                </div>

                <div class="col-sm-7 col-sm-7 col-sm-pull-3 list">
                  <div class="page">
                    <?php
                    if (array_key_exists('name', $_GET))
                    {
                      echo $_GET['name']."s List";
                    }
                    ?></div>
                    <?php 

                    $places = $placeDAO->getplacesbycategory($_GET['id']);


                    if ($places != "no places, please add a places")
                    {
                      foreach($places as $place)
                      {
                        $picture = $pictureDAO->getpicturebyplaceid($place['id']);
                        $thumbnail = "thumb_".$picture['name'];
                        ?>
                        <div class ="row-fluid news">
                          <div class ="pic">
                            <img src="images/<?php echo $place['id'].'/'.$thumbnail; ?>"></img>
                          </div>
                          <div class ="para">
                            <b><?php echo $place['name'];?></b>
                            <p><?php echo $place['description'];?>  <a href ="individual.php?placeid=<?php echo $place['id']; ?>">readmore...</a></p>
                          </div>
                        </div>

                        <?php
                      }
                    }
                    ?>
                  </div>

                </div>

              </div>

              <!-- Featured side of the page-->
              <div class="col-lg-4">
                <div>
                  <div class ="row-fluid col-lg-12 featured">

                  <?php 
                    if ($places != "no places, please add a places"){
                      foreach ($places as $place) {
                        if($place['membership'] != 0 ){
                          $picture = $pictureDAO->getpicturebyplaceid($place['id']);
                          $thumbnail = "thumb_".$picture['name'];
                          ?>
                          <div class="gallerymin">
                            <div class="row">
                              <div class="col-lg-12">
                               <div class="col-lg-5">
                                <a href="individual.php"><img src="images/<?php echo $place['id'].'/'.$thumbnail;?>"></img></a>
                              </div>
                              <div class="col-lg-7"><a href="individual.php?placeid=<?php echo $place['id']; ?>"><b><?php echo $place['name']; ?></b></a></div>
                            </div><!-- col-lg-12 -->
                          </div><!-- row -->
                        </div><!-- gallerymin -->

                        <?php 
                      }
                    }
                  }
                  ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer  -->
      <?php include('inc/include/footer.php'); ?>
      <!-- Footer  -->

    </div>
    <script src="bt/js/jquery.js"></script>
    <script src="jquery/jquery.js"></script>


    <script src="bt/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="jquery/cycle.js"></script>


    <script type="text/javascript">
      $(document).ready(function() {
        $('.banner').cycle({ });

      });
    </script>
  </body>
  </html>