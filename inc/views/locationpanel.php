
        <div class="panel panel-primary" id="locatiosnpanel">
          <div class="panel-heading"> Locations</div>
          <div class="panel-body">
            <!-- Locations start here-->
              <form method="post" action="../inc/BL/locationBL.php" class="form-inline ">
                <div class="input-group">
                 <input type="text" name="locationname" class="form-control input-small" placeholder="Type a location name" >
                 <span class="input-group-btn">
                 <input type="submit" class="btn btn-primary btn-small" value="Add New Location">
                 </span>
               </div>
             </form>
             <label><b>Locations List:</b>
              <?php
              if(array_key_exists('message1', $_GET))
              {
               echo $_GET['message1'];
             }
             ?>
           </label>
           <form method="post" action="inc/BL/locationBL.php">
            <table class="table table-condensed table-striped">
              <thead>
                <tr style="text-align:left;">
                  <th>Check</th>
                  <th>Name</th>
                </tr>
              </thead>
              <tbody>
                <?php $locations = $locationDAO->getlocations();

                if ($locations != null)
                {
                  foreach($locations as $location)
                  {
                    ?>
                    <tr>
                      <td><input type="checkbox" name="locations[]" value="<?php echo $location['id'] ?>" /> </td> 
                      <td><?php echo $location['name']?></td>

                    </tr>

                    <?php
                  }
                }
                ?>
              </tbody>
            </table>
            <input type="submit" class="btn btn-primary btn-small" value="Delete Locations" /> 
          </form>
          <!-- End of Form-->
        <!-- Locations end here-->
      </div>
      </div> <!-- Locations Panel -->