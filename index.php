<?php include(dirname(__FILE__)."/inc/include/session.php");?>
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
      <link href ="css/style.css" rel ="stylesheet">
      <link type="text/css" rel="stylesheet" href="../css/place.css">
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

      require (dirname(__FILE__)."/inc/DAO/newsDAO.php");
      $newsDAO = new newsDAO();

      ?>
      <div class ="container contena"> 

        <!-- Top Menu  -->
        <?php include('inc/include/header.php'); ?>
        <!-- Top Menu  -->

        <div class="row">
         <div class="col-lg-4">
           <div class="maingallery">
            <img src="images/68.jpg"></img>
            <img src="images/43.jpg"></img>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="maingallery">
            <img src="images/43.jpg"></img>
            <img src="images/34.jpg"></img>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="maingallery">
            <img src="images/70.jpg"></img>
            <img src="images/44.jpg"></img>
          </div>
        </div>

      </div>

      <div class = "row-fluid">

       <div class = "col-lg-7">
        <div class="latest"><h4>Latest news </h4></div>
        

          <?php

          $listofnews = $newsDAO->getnews();
          if ($listofnews != null)
          {
            foreach ($listofnews as $news) {
              ?>
              <div class ="row-fluid news">
              <div class="para">
              <h5><b><?php echo $news['heading']?></b></h5>
                <p><?php echo $news['description'];?><a href="<?php echo $news['link']?>" target="_blank">...... read more</a></p>
              </div>
              </div>
              <?php

            }
          }

          ?>
<!--
         <div class ="pic">
          <img src="images/6.jpg"></img>
      </div>
      <div class ="para">
          <p>Aethere hominum, origo secant siccis lacusque aeris carentem parte matutinis fulminibus zephyro
           hominum, origo secant siccis lacusque aeris carentem parte matutinis fulminibus zephyro. </p>
       </div>
     
   
   <div class ="row-fluid news">
    <div class ="pic">
     <img src="images/6.jpg"></img>
   </div>
   <div class ="para">
     <p>Aethere hominum, origo secant siccis lacusque aeris carentem parte matutinis fulminibus zephyro
      hominum, origo secant siccis lacusque aeris carentem parte matutinis fulminibus zephyro. </p>
    </div>
  </div>
  <div class ="row-fluid news">
   <div class ="pic">
    <img src="images/6.jpg"></img>
  </div>
  <div class ="para">
    <p>Aethere hominum, origo secant siccis lacusque aeris carentem parte matutinis fulminibus zephyro
     hominum, origo secant siccis lacusque aeris carentem parte matutinis fulminibus zephyro. </p>
   </div>
 </div>
 <div class ="row-fluid news">
  <div class ="pic">
   <img src="images/6.jpg"></img>
 </div>
 <div class ="para">
   <p>Aethere hominum, origo secant siccis lacusque aeris carentem parte matutinis fulminibus zephyro
    hominum, origo secant siccis lacusque aeris carentem parte matutinis fulminibus zephyro. </p>
  </div>
</div>
<div class ="row-fluid news">
 <div class ="pic">
  <img src="images/6.jpg"></img>
</div>
<div class ="para">
  <p>Aethere hominum, origo secant siccis lacusque aeris carentem parte matutinis fulminibus zephyro
   hominum, origo secant siccis lacusque aeris carentem parte matutinis fulminibus zephyro. </p>
 </div>
</div>
-->
</div>

<div class = "col-lg-5">
 <div class ="hot-places"><h4>Hot places in Dar es salaam</h4></div>
 <div class="hot-gallery">


  <a href="../images/60.jpg" ><img src="../images/thumb_60.jpg"></img></a>
  <a href="../images/61.jpg"><img src="../images/thumb_61.jpg"></img></a>
  <a href="../images/62.jpg" ><img src="../images/thumb_62.jpg"></img></a>
  <a href="../images/63.jpg"><img src="../images/thumb_63.jpg"></img></a>
  <a href="../images/64.jpg" ><img src="../images/thumb_64.jpg"></img></a>
  <a href="../images/65.jpg"><img src="../images/thumb_65.jpg"></img></a>
  <a href="../images/66.jpg" ><img src="../images/thumb_66.jpg"></img></a>
  <a href="../images/67.jpg"><img src="../images/thumb_67.jpg"></img></a>
  <a href="../images/68.jpg" ><img src="../images/thumb_68.jpg"></img></a>
  <a href="../images/69.jpg"><img src="../images/thumb_69.jpg"></img></a>
   <a href="../images/66.jpg" ><img src="../images/thumb_66.jpg"></img></a>
  <a href="../images/67.jpg"><img src="../images/thumb_67.jpg"></img></a>
  <a href="../images/68.jpg" ><img src="../images/thumb_68.jpg"></img></a>
  <a href="../images/69.jpg"><img src="../images/thumb_69.jpg"></img></a>
   <a href="../images/69.jpg"><img src="../images/thumb_69.jpg"></img></a>



</div>

</div>
</div>

<!-- Footer  -->
<?php include('inc/include/footer.php'); ?>
<!-- Footer  -->

</div>
<script src="bt/js/jquery.js"></script>
<script src="js/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery.lightbox-0.5.js"></script>

<script src="bt/js/bootstrap.min.js"></script>
<script type="text/javascript" src="jquery/cycle.js"></script>

<script type="text/javascript">
 $(document).ready(function() {
  $('.maingallery').cycle({ });

});


 $(function() {
  $('.hot-gallery a').lightBox();
});

</script>


</body>
</html>