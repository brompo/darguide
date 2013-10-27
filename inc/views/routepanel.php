<div class="panel panel-primary" id="profilepanel">
  <div class="panel-heading">
    Routes</div>
    <div class="panel-body">
      <?php
      //if the person wants to edit a certain route 
      if(array_key_exists('routeid', $_GET))
      {
        $id = $_GET['routeid'];
        $route = $routeDAO->getroutebyid($id);
        ?>
        <a href="admin.php?panel=viewroutepanel">Back</a>
        <form method="POST" action="BL/routeBL.php">
          <input type="text" value="<?php echo $id;?>" hidden="true" name="routeid">
          <label>Route Name:</label><input type="text" name="routename" value="<?php echo $route['r_name']?>" maxlength="30"><br/>
          <label>Route Point A:</label><input type="text" name="routepointA" value="<?php echo $route['r_pointA']?>" maxlength="30"><br/>
          <label>Route Point B:</label><input type="text" name="routepointB" value="<?php echo $route['r_pointB']?>" maxlength="30"><br/>
          <label>Route Price:</label><input type="text" name="routeprice" value="<?php echo $route['r_price']?>" maxlength="10"><br/>
          <label>Transport Type:</label><input type="text" name="transtype" value="<?php echo $route['transType']?>" maxlength="15"><br/>
          <label>Route Distance:</label><input type="text" name="routedistance" value="<?php echo $route['r_distance']?>" maxlength="10"><br/>
          <input type="submit" name="updateroute" value="Update route" class="btn btn-primary btn-small">
        </form>
        <?php
      }
      //if no route is specified, 
      else
      {
        ?>
        <a href="admin.php?panel=viewroutepanel">View Routes</a>
        <form method="POST" action="BL/routeBL.php">
          <label>Route Name:</label><input type="text" name="routename" maxlength="30"><br/>
          <label>Route Point A:</label><input type="text" name="routepointA" maxlength="30"><br/>
          <label>Route Point B:</label><input type="text" name="routepointB" maxlength="30"><br/>
          <label>Route Price:</label><input type="text" name="routeprice" maxlength="10"><br/>
          <label>Transport Type:</label><input type="text" name="transtype" maxlength="15"><br/>
          <label>Route Distance:</label><input type="text" name="routedistance" maxlength="10"><br/>
          <input type="submit" name="addroute" value="Add route" class="btn btn-primary btn-small">
        </form>
        <?php
      }
      ?>
    </div>
  </div>