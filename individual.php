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
      <link taype="text/css" href ="css/style.css" rel ="stylesheet">
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

     require(dirname(__FILE__).'/inc/DAO/routeDAO.php');
     $routeDAO = new routeDAO();

     ?>
     <div class ="container contena"> 

       <!-- Top Menu  -->
       <?php include('inc/include/header.php'); ?>

       <!-- Top Menu  -->

       <?php
       if (array_key_exists('placeid', $_GET))
       {
         $placeid = $_GET['placeid'];
       }

       $place = $placeDAO->getplacesbyid($placeid);

       $picture = $pictureDAO->getpicturebyplaceid($placeid);
       $location = $locationDAO->getlocationbyid($place['location_id']);
       $category = $categoryDAO->getcategorybyid($place['category_id']);
       ?>
       <div class="row">
            <div class="col-lg-7 sitemap">
              <a href="index.php">Home </a> > Services > <a href="navigation.php?id=<?php echo $category['id'];?>&name=<?php echo $category['name'];?>"><?php echo $category['name'];?></a> > <?php echo $place['name']; ?>
            </div>
            <div class= "col-lg-4 feature">
              Featured
            </div>
          </div>
       <div class="row">
        <div class="col-lg-8">
          <div class="gallery">
            <img src="images/<?php echo $picture['place_id'].'/'.$picture['name']; ?>" />
          </div>
        </div>
        <div class = "col-lg-4">
         <div class ="row-fluid news">
         <!--This is a new version of the file-->

          <?php 

          $featuredplaces = $placeDAO->getplacesbycategory($place['category_id']);
          $routeplaces = $routeDAO->getplaces();

          if ($featuredplaces != "no places, please add a places"){
            foreach ($featuredplaces as $featuredplace) {
              if($featuredplace['membership'] != 0   && $featuredplace['id'] != $place['id']){
                $picture = $pictureDAO->getpicturebyplaceid($featuredplace['id']);
                $thumbnail = "thumb_".$picture['name'];
                ?>
                <div class="gallerymin">
                  <div class="row">
                    <div class="col-lg-12">
                     <div class="col-lg-5">
                      <a href="individual.php?placeid=<?php echo $featuredplace['id']; ?>"><img src="images/<?php echo $featuredplace['id'].'/'.$thumbnail;?>"></img></a>
                    </div>
                    <div class="col-lg-7"><a href="individual.php?placeid=<?php echo $featuredplace['id']; ?>"><b><?php echo $featuredplace['name']; ?></b></a></div>
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

  <div class ="row-fluid">
    <div class ="col-lg-4 amana">

      <div class ="lates"><?php echo $place['name'];?></div>
    </br>
    <p><?php echo $place['description']; ?></p>

    <h5>Below are services offered by us</h5>

    <ul>
      <li><?php echo $place['service1'];?></li>
      <li><?php echo $place['service2'];?></li>
      <li><?php echo $place['service3'];?></li>
      <li><?php echo $place['service4'];?></li>
      <li><?php echo $place['service5'];?></li>
    </ul>

    Unda suis addidi animus unus ulla mutatas et cum aere undae recepta grandia habendum siccis illi ventis ante est corpora coercuit
    undas partim galeae illis recessit obsistitur pontus feras premuntur

    Tempora montes nullus astra alto iussit formaeque otia fontes pluvialbulas gravitate utque ora homo sublime quia sibi consistere. 
    Tempora montes nullus astra alto iussit formaeque otia fontes pluvialbulas gravitate utque ora homo sublime quia sibi consistere. 


  </div>
  <div class = "col-lg-4 pictures">
    <br/>

    <div id="googleMap" style="width:280px;height:250px;border:2px solid gray"></div>

    <div class="lates">Contact Us</div>
    To get in touch with us please use the following addresses</br></br>

    <b>Physical Address:</b> <?php echo $location['name'];?></br>
    Box 111</br>
    Dar es salaam, Tanzania</br></br>

    <b>Email:</b> <?php echo $place['email']; ?></p>
    <b>Phone:</b> <?php echo $place['phone1']. " / " . $place['phone2'];?><br/>
<input type="text" id="latitude" value="<?php echo $place['latitude']; ?>" hidden="true"><br/>
<input type="text" id="longitude" value="<?php echo $place['longitude']; ?>" hidden="true">

  </div>
  <div class = "col-lg-4">
    <div class="advert">
      <img src="images/171.jpg"></img>
    </div>
    <div class ="lates">Share this on</div>
    <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
      <a class="addthis_button_preferred_1"></a>
      <a class="addthis_button_preferred_2"></a>
      <a class="addthis_button_preferred_3"></a>
      <a class="addthis_button_preferred_4"></a>
      <a class="addthis_button_compact"></a>
      <a class="addthis_counter addthis_bubble_style"></a>
    </div>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5124f20505304da1"></script>
  </div>
  <div class="col-lg-4">
    <br/>
    <br/>
    <br/>
    <div class="routecontainer">
      Find the route to this place<br/>
      <form action="inc/BL/routeBL.php" method="POST">
        <input type="text" name="id" value="<?php echo $place['id']; ?>" hidden="true">
        From:
        <select name="routefrom">
        <option value="" selected="selected">Select an option</option>
         <?php
         if ($routeplaces != null)
         {
          foreach($routeplaces as $routeplace)
          {
            ?>
            <option value="<?php echo $routeplace['id'] ?>"><?php echo $routeplace['name'] ?></option>
            <?php
          }
        }
        ?>
      </select></br>
      To :  <?php echo $place['name']; ?>
      <input type="input" name="routeto" value="<?php echo $place['nearestPoint']; ?>" hidden="true"></br>
      <input type="submit" value="find a route" name="findroute" class="btn btn-small btn-primary">
    </form>
  </div>
  <br/>
  <br/>
  <div class="routeresult">
    <?php 
    if(array_key_exists('deststop', $_GET))
    {
      $from = $_GET['from'];
      $to = $_GET['to'];
      $bus = $_GET['bus'];
      $deststop = $_GET['deststop'];

      $fromplace = $routeDAO->getplacebyid($from);
      $toplace = $routeDAO->getplacebyid($to);
      $busdetails = $routeDAO->getbusdetails($bus);
      $fromstopdetails = $routeDAO->getstopdetail($bus,$from);

      $noofstops = $deststop - $fromstopdetails['stop_no'];
      echo "<b><text style='color:green; margin:10px;' >Direct Route Found</text></b><br/>";
      echo "<b>Route Name: </b>".$busdetails['route_name']."<br/>";
      echo "<b>Bus Starts at : </b>".$busdetails['from']."<br/>";
      echo "<b>Get on at : </b>".$fromplace['name']."<br/>";
      echo "<b>Get off at : </b>".$toplace['name']."<br/>";
      echo "<b>Bus Ends at : </b>".$busdetails['to']."<br/>";
      echo "<b>Number of Stops :</b>".$noofstops."<br/><br/>";


      echo $place['direction'];
    }
    elseif(array_key_exists('deststop1', $_GET)){
      //Get the details for the first route
      $from1 = $_GET['from1'];
      $to1 = $_GET['to1'];
      $bus1 = $_GET['bus1'];
      $deststop1 = $_GET['deststop1'];

      $fromplace1 = $routeDAO->getplacebyid($from1);
      $toplace1 = $routeDAO->getplacebyid($to1);
      $busdetails1 = $routeDAO->getbusdetails($bus1);
      $fromstopdetails1 = $routeDAO->getstopdetail($bus1,$from1);

      $noofstops1 = $deststop1 - $fromstopdetails1['stop_no'];

      //Get details for the second route


      $from2 = $_GET['from2'];
      $to2 = $_GET['to2'];
      $bus2 = $_GET['bus2'];
      $deststop2 = $_GET['deststop2'];


      $fromplace2 = $routeDAO->getplacebyid($from2);
      $toplace2 = $routeDAO->getplacebyid($to2);
      $busdetails2 = $routeDAO->getbusdetails($bus2);
      $fromstopdetails2 = $routeDAO->getstopdetail($bus2,$from2);

    

      $noofstops2 = $deststop2 - $fromstopdetails2['stop_no'];
      echo "<b><text style='color:green; margin:10px;' >Multiple Routes Found</text></b><br/>";
      echo "<b>First Route Name: </b>".$busdetails1['route_name']."<br/>";
      echo "<b>Bus Starts at : </b>".$busdetails1['from']."<br/>";
      echo "<b>Get on at : </b>".$fromplace1['name']."<br/>";
      echo "<b>Get off at : </b>".$toplace1['name']."<br/>";
      echo "<b>Bus Ends at : </b>".$busdetails1['to']."<br/>";
      echo "<b>Number of Stops :</b>".$noofstops1."<br/>";

      echo "<b><text style='color:green; margin:10px;margin-top:20px;margin-bottom:20px' >Then</text></b><br/>";

      echo "<b>Second Route Name: </b>".$busdetails2['route_name']."<br/>";
      echo "<b>Bus Starts at : </b>".$busdetails2['from']."<br/>";
      echo "<b>Get on at : </b>".$fromplace2['name']."<br/>";
      echo "<b>Get off at : </b>".$toplace2['name']."<br/>";
      echo "<b>Bus Ends at : </b>".$busdetails2['to']."<br/>";
      echo "<b>Number of Stops :</b>".$noofstops2."<br/><br/>";

      echo $place['direction'];

    }
    elseif(array_key_exists('error', $_GET))
    {
      echo "<b>Error: </b><text style='color:red'>".$_GET['error']."</text><br/>";
    }
    else{
      echo $place['direction'];
    }
   ?>
    }
 </div>
</div>
</div>

<!-- Footer  -->
<?php include('inc/include/footer.php'); ?>
<!-- Footer  -->
</div>

<script src="bt/js/jquery.js"></script>
<script src="bt/js/bootstrap.min.js"></script>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDNNALPaDP5hl7_JxRxkM8k8nJqDzSYPQY&sensor=false">
</script>

<script>
function initialize()
{

var latitude = document.getElementById('latitude').value;
var longitude = document.getElementById('longitude').value;
var mapProp = {
  center:new google.maps.LatLng(latitude,longitude),
  zoom:13,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };
var map = new google.maps.Map(document.getElementById("googleMap")
  ,mapProp);


var mylatlong = new google.maps.LatLng(latitude, longitude);
var marker = new google.maps.Marker({
  position: mylatlong, map: map, 
});

var infowindow = new google.maps.InfoWindow({
      content:"Mwananyamala Hospital!"
    });
//marker.siteMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
</body>
</html>