<?php include(dirname(__FILE__)."/inc/include/session.php");?>
    <!DOCTYPE html>
    <html>
    <head>
    	<title>City Guide</title> 
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<!-- Bootstrap -->
      <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen">

      <!--  <link href="../bt/css/bootstrap.css" rel="stylesheet" media="screen">  -->
      <!--  <link href="../bt/css/bootstrap-responsive.css" rel="stylesheet"> -->
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

     ?>

     <div class ="container contena"> 

       <!-- Top Menu  -->
       <?php include('inc/include/header.php'); ?>
       <!-- Top Menu  -->

       <div class="col-lg-12">
       
         <div class="row">
          <h3>About Us</h3>
          <p>
             Dar es salaam is a very exciting typical East African city. Foreigners from abroad 
          land to this city for their activities not only foreigners but also natives, 
            however sometime they found difficult on looking for place and different location in Dar es salaam.
We aim to develop application, into which  user will access  information about Dar es salaam, 
that will focus on Transport, hospitals, entertainment, hotels, police stations.
</p><br/>

             <h4>Who made this site</h4>
          </div><!-- /row-->

          <div class="row">

            <div class="col-lg-4">
              <div class="pictures">
                <img src="../images/6.jpg"></img>
                <h5 class ="name">Abdalah Salim</h5>
                <p>
        My name is Abdallah Salim 
        Currently i am a four year student of ISNE  at St Joseph college of engineering and technology.
        </p>

                </div><!--pictures-->
              </div><!--col-lg-3-->

              <div class="col-lg-4">
                <div class="pictures">
                  <img src="../images/11.jpg"></img>
                  <h5 class ="name">Lilian Machange</h5>
                  <p>
          My name is Lilian Machange
        Currently i am a four year student of ISNE  at St Joseph college of engineering and technology.
                    </p>

                  </div><!--pictures-->
                </div><!--col-lg-3-->

                <div class="col-lg-4">
                  <div class="pictures">
                   <img src="../images/10.jpg"></img>
                   <h5 class ="name">Ludovic Kimolo</h5>
                   <p>
           My name is Ludovic Kimolo 
        Currently i am a four year student of ISNE  at St Joseph college of engineering and technology.
                   </div><!--pictures-->
                 </div><!--col-lg-3-->

               </div><!--row-->
             </div><!-- col-lg-12 -->

             <!-- Footer  -->
             <?php include('inc/include/footer.php'); ?>
             <!-- Footer  -->
           </div> <!-- /contena -->
           <script src="bt/js/jquery.js"></script>
           <script src="bt/js/bootstrap.min.js"></script>
         </body>
         </html>