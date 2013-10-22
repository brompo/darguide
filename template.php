    <!DOCTYPE html>
    <html>
    <head>
    	<title>City Guide</title> 
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../css/jquery.lightbox-0.5.css" media="screen">
      <!--  <link href="../bt/css/bootstrap.css" rel="stylesheet" media="screen">  -->
      <!--  <link href="../bt/css/bootstrap-responsive.css" rel="stylesheet"> -->
      <link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="">
      <link href ="../css/style.css" rel ="stylesheet">
      <link type="text/css" rel="stylesheet" href="../css/place.css">
      <link href ="../css/style.css" rel ="stylesheet">

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
        <!-- Main Content Goes here -->
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