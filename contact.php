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
        <link type="text/css" href="css/style.css" rel ="stylesheet">
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

          <div class ="row col-lg-12">
            <div class ="col-lg-6">

                <h5 class="header-about">Thanks for visiting us</h5>
                Aethere hominum, origo secant siccis lacusque aeris carentem parte matutinis fulminibus zephyro
                hominum, origo secant siccis lacusque aeris carentem parte matutinis fulminibus zephyro.
                Aethere hominum, origo secant siccis lacusque aeris carentem parte matutinis fulminibus zephyro
                hominum, origo secant siccis lacusque aeris carentem parte matutinis fulminibus zephyro.<br><br>
                <h5 class ="physical">Physical address</h5>
                St Joseph College Of Engineering</br>
                P.O.BOX 1212</br>
                Dar Es Salaam</br>
                Tanzania<br><br>
                <h5 class ="quick">Quick address</h5>
                <b>Facebook:</b>city@facebook</br>
                <b>Twitter:</b>city@twitter</br>
                <b>Youtube:</b>city@youtube</br>

            </div>
            <div class ="col-lg-5 col-lg-offset-2">
                <h5 class="comment">Leave Us Massage</h5>
                <form method="POST" action="contact-form-submission.php" class="form-horizontal">  
                    <div class="control-group">  
                        <label class="control-label" for="input1">Name</label>  
                        <div class="controls">  
                            <input type="text" name="contact_name" id="input1" placeholder="Your name">  
                        </div>  
                    </div>  
                    <div class="control-group">  
                        <label class="control-label" for="input2">Email Address</label>  
                        <div class="controls">  
                            <input type="text" name="contact_email" id="input2" placeholder="Your email address">  
                        </div>  
                    </div>  
                    <div class="control-group">  
                        <label class="control-label" for="input3">Message</label>  
                        <div class="controls">  
                            <textarea name="contact_message" id="input3" rows="8" cols="20" placeholder="The message you want to send to me."></textarea>  
                        </div>  
                    </div>  
                    <div class="form-actions">  
                        <input type="hidden" name="save" value="contact">  
                        <button type="submit" class="btn btn-primary">Send</button>  
                    </div>  
                </form>  
            </div>
        </div>


        <!-- Footer  -->
        <?php include('inc/include/footer.php'); ?>
        <!-- Footer  -->
    </div>
    <script src="bt/js/jquery.js"></script>
    <script src="bt/js/bootstrap.min.js"></script>
</body>
</html>