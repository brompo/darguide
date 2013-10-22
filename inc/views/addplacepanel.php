        
<div class="panel panel-primary" id="placespanel">
  <div class="panel-heading"> Places</div>
  <div class="panel-body">
    <a href="admin.php?panel=placepanel">View Places</a>
    <?php

    if(array_key_exists('message', $_GET))
    {
      echo $_GET['message'];
    }

    if(array_key_exists('placeid',$_GET))
    {
     $placeid = $_GET['placeid'];
     $place = $placeDAO->getplacesbyid($placeid);

     $category = $categoryDAO->getcategorybyid($place['category_id']);

     ?>
     <form method="post" action="../inc/BL/placeBL.php" enctype="multipart/form-data">
      <label>Profile Picture:</label>
      <input type="file" name="file" id="file" /></br>

      <input type="text" name="placeid" value="<?php echo $place['id']; ?>" hidden="true" >
      <label>Place Name:</label>
      <input type="text" name="name" id="name" maxlength="50" value="<?php echo $place['name']; ?>" /><br/>
      <label>Category:</label>
      <select name="categoryid" id="categoryid">
       <?php
       $categories = $categoryDAO->getcategories();

       if ($categories != null)
       {
        $length = count($categories);

        foreach($categories as $category)
        {
          ?>
          <option <?php if($place['category_id'] == $category['id']){echo 'selected=\'selected\'';} ?> value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
          <?php
        }
      }
      ?>
    </select><br/>
    <label>Location:</label>
    <select name="locationid" id="locationid">
     <?php
     $locations = $locationDAO->getlocations();
     if ($locations != null)
     {
      foreach($locations as $location)
      {
        ?>
        <option <?php if($place['location_id'] == $location['id']){echo 'selected=\'selected\'';} ?> value="<?php echo $location['id'] ?>"><?php echo $location['name'] ?></option>
        <?php
      }
    }
    ?>
  </select></br>

  <label>Description:</label><textarea name="description" cols="30" rows="7"  id="description" maxlength="200"><?php echo $place['description']; ?></textarea></br>
  <div class="forminput"><label>Service 1:</label><input type="text" name="service1" id="service1" maxlength="100" value="<?php echo $place['service1']; ?>"  ></div>
  <div class="forminput"><label>Service 2:</label><input type="text" name="service2" id="service2" maxlength="100" value="<?php echo $place['service2']; ?>" ></div>
  <div class="forminput"><label>Service 3:</label><input type="text" name="service3" id="service3" maxlength="100" value="<?php echo $place['service3']; ?>"  ></div>
  <div class="forminput"><label>Service 4:</label><input type="text" name="service4" id="service4" maxlength="100" value="<?php echo $place['service4']; ?>" ></div>
  <div class="forminput"><label>Service 5:</label><input type="text" name="service5" id="service5" maxlength="100" value="<?php echo $place['service5']; ?>" >
    <div class="forminput"><label>Nearest Point</label>
      <select name="nearestpoint" id="nearestpoint">
       <?php
       $routelocations = $routeDAO->getplaces();
       if ($routelocations != null)
       {
        foreach($routelocations as $routelocation)
        {
          ?>
          <option <?php if($place['nearestPoint'] == $routelocation['id']){echo 'selected=\'selected\'';} ?> value="<?php echo $routelocation['id'] ?>"><?php echo $routelocation['name'] ?></option>
          <?php
        }
      }
      ?>

    </select></div>
    <label>Direction:</label><textarea name="direction" cols="30" rows="4"  id="direction" maxlength="200"><?php echo $place['direction']; ?></textarea></br>
    <div class="forminput"><label>Working Hours:</label><input type="text" name="workinghours" id="workinghours" maxlength="50" value="<?php echo $place['workingHours']; ?>"  ></div>
    <div class="forminput"><label>Email:</label><input type="text" name="email" id="email" maxlength="50" value="<?php echo $place['email']; ?>"  ></div>
    <div class="forminput"><label>Phone1:</label><input type="text" name="phone1" id="phone1" maxlength="12" value="<?php echo $place['phone1']; ?>" ></div>
    <div class="forminput"><label>Phone2:</label><input type="text" name="phone2" id="phone2" maxlength="12" value="<?php echo $place['phone2']; ?>" ></div>
    <label>Longitude: </label><input type="text" name="longitude" id="longitude" value="<?php echo $place['longitude']; ?>"></input><br/>
    <label>Latitude: </label><input type="text" name="latitude" id="latitude" value="<?php echo $place['latitude']; ?>"></label>
    <label>Please Drag the marker to update your place's location</label><br/>
    <div id="googleMap" style="min-width:400px; max-height:400px;height:100%; width:100%;border:2px solid gray" class="forminput">
    </div>
    <?php if ($_SESSION['userrole'] != "admin"){
      ?>
      <input type="text" hidden="true" value="<?php echo $place['membership']; ?>" name="membership" >
      <?php
    }
    else{
      ?>
      <div class="forminput"><label>Membership:</label>
        <select name="membership">
          <option <?php if($place['membership'] == 0) { echo 'selected=\'selected\'';}  ?> value="0">Ordinary</option>
          <option <?php if($place['membership'] == 1) { echo 'selected=\'selected\'';} ?> value="1">Silver</option>
          <option <?php if($place['membership'] == 2) { echo 'selected=\'selected\'';}  ?> value=2>Gold</option>
        </select>
        <?php }?>
      </div>
      <input name="updatebutton" type="submit" class="btn btn-primary btn-small" value="Update place" id="saveplace" />
    </form>
    <?php

  }
  else
  {
    ?>

    <form method="post" action="../inc/BL/placeBL.php" enctype="multipart/form-data">
      <label>Profile Picture:</label>
      <input type="file" name="file" id="file" /></br>
      <label>Place Name:</label>
      <input type="text" name="name" id="name" maxlength="50"/><br/>

      <label>Category:</label>
      <select name="categoryid" id="categoryid">
       <?php
       $categories = $categoryDAO->getcategories();
       if ($categories != null)
       {
        foreach($categories as $category)
        {
          ?>
          <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
          <?php
        }
      }
      ?>
    </select><br/>
    <label>Location:</label>
    <select name="locationid" id="locationid">
     <?php
     $locations = $locationDAO->getlocations();
     if ($locations != null)
     {
      foreach($locations as $location)
      {
        ?>
        <option value="<?php echo $location['id'] ?>"><?php echo $location['name'] ?></option>
        <?php
      }
    }
    ?>
  </select></br>

  <label>Description:</label><textarea name="description" cols="30" rows="7"  id="description" maxlength="200"></textarea></br>
  <div class="forminput"><label>Service 1:</label><input type="text" name="service1" id="service1" maxlength="100" ></div>
  <div class="forminput"><label>Service 2:</label><input type="text" name="service2" id="service2" maxlength="100"></div>
  <div class="forminput"><label>Service 3:</label><input type="text" name="service3" id="service3" maxlength="100"></div>
  <div class="forminput"><label>Service 4:</label><input type="text" name="service4" id="service4" maxlength="100"></div>
  <div class="forminput"><label>Service 5:</label><input type="text" name="service5" id="service5" maxlength="100">
    <div class="forminput"><label>Nearest Point:</label><input type="text" name="nearestpoint" id="nearestpoint" maxlength="50" ></div>
    <label>Direction:</label><textarea name="direction" cols="30" rows="7"  id="direction" maxlength="200"></textarea></br>
    <div class="forminput"><label>Working Hours:</label><input type="text" name="workinghours" id="workinghours" maxlength="50" ></div>
    <div class="forminput"><label>Email:</label><input type="text" name="email" id="email" maxlength="50" ></div>
    <div class="forminput"><label>Phone1:</label><input type="text" name="phone1" id="phone1" maxlength="12"></div>
    <div class="forminput"><label>Phone2:</label><input type="text" name="phone2" id="phone2" maxlength="12"></div>
    <label>Longitude:</label><input type="text" name="longitude" id="longitude"></input><br/>
    <label>Latitude:</label><input type="text" name="latitude" id="latitude">
    <label>Please Drag the marker to mark your place</label><br/>
    <div id="googleMap" style="min-width:400px; max-height:400px;height:100%; width:100%;border:2px solid gray" class="forminput">
    </div><br/>
    <input name="addbutton" type="submit" class="btn btn-primary" value="Add new place" id="saveplace" />
  </form>
  <?php
}
?>


<script type="text/javascript" src="../js/jquery.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDNNALPaDP5hl7_JxRxkM8k8nJqDzSYPQY&sensor=false">
</script>

<script>

  var myCenter = new google.maps.LatLng(-6.808742,39.270850);
  function initialize()
  {
    var mapProp = {
      center:myCenter,
      zoom:12,
      mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("googleMap")
      ,mapProp);

    var marker = new google.maps.Marker({
      position:myCenter, draggable:true
    });

    marker.setMap(map);

    var infowindow = new google.maps.InfoWindow({
      //content:"Mwananyamala Hospital!"
    });

    infowindow.open(map,marker);

    google.maps.event.addListener(marker,'click',function() {
      map.setZoom(14);
      map.setCenter(marker.getPosition());
    });

    google.maps.event.addListener(map,'click',function(event) {

      //document.getElementById('latitude').innerHTML = event.latLng.lat();
      //document.getElementById('longitude').innerHTML = event.latLng.lng();
     //alert('Lat: ' + event.latLng.lat() + ' and Longitude is: ' + event.latLng.lng());
   });

    google.maps.event.addListener(marker, 'dragend', function(event){

      document.getElementById('latitude').value = event.latLng.lat();
      document.getElementById('longitude').value = event.latLng.lng();
       //alert('Lat: ' + event.latLng.lat() + ' and Longitude is: ' + event.latLng.lng());
   });
  }

  google.maps.event.addDomListener(window, 'load', initialize);

  google.maps.event.addListener(marker,'click',function(event){
    alert("i am here, you clicked me");
  });


</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('form').submit(function(){
      var name = $.trim($('#name').val());
      var service1 = $.trim($('#service1').val());
      var email = $.trim($('#email').val());
      var phone1 = $.trim($('#phone1').val());
      var direction = $.trim($('#direction').val());

      if ((name === '')|| (service1 === '') || (email === '') || (phone1 === ''))
      {
        if(name === '')
        {
          $('#name').addClass('errordisplay');
        }
        else
          {$('#name').removeClass('errordisplay');}
        if(service1 === '')
        {
          $('#service1').addClass('errordisplay');
        }
        else{ $('#service1').removeClass('errordisplay');}

        if(email === '')
        {
          $('#email').addClass('errordisplay');
        }
        else
        {
          $('#email').removeClass('errordisplay');
        }

        if(phone1 === '')
        {
          $('#phone1').addClass('errordisplay');
        }
        else
        {
          $('#phone1').removeClass('errordisplay');
        }
        if(direction === '')
        {
          $('#direction').addClass('errordisplay');
        }
        else
        {
          $('#direction').removeClass('errordisplay');
        }

        alert('fields can not be left empty');
        return false;
      }
    });
      });
      </script>
    </div>
  </div>