        <div class="panel panel-primary" id="placespanel">
          <div class="panel-heading"> Places</div>
          <a href="admin.php?panel=addplacepanel">Add a place</a><br /><br />
          <?php 
          

        #get places
          if ($_SESSION["userrole"] == "admin")
          {
            $places = $placeDAO->getplaces();
          }
          else
          {
            $places = $placeDAO->getplacesbypersonid($_SESSION['id']);
          }
          
          if ($places != null)
          {
            ?>
            
            <form method="POST" action="../inc/BL/placeBL.php">
              <table class="table table-condensed ">
                <thead>
                  <th></th>
                  <th>Name</th>
                  <th>Status</th>
                </thead>
                <?php

                $index = 0;
                foreach ($places as $place) {
                  $id = $place['id'];
                  ?>
                  <tr>
                    <td><input type="checkbox" name="places[]" value="<?php echo $id; ?>"></td>
                    <td><?php echo $place['name']; ?></td>
                    <td><?php echo $place['status']; ?></td>
                    <td><a href="admin.php?panel=addplacepanel&placeid=<?php echo $id; ?>"><?php echo "Edit"; ?></a></td>
                  </tr>
                  <?php

                }
                ?>
              </table>
              <input type="submit" name="deletebutton" value="Delete" class="btn btn-small btn-primary">
              <?php
            }
            ?>
          </form>
        </div>