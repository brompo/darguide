        <div class="panel panel-primary" id="routepanel">
          <div class="panel-heading"> Routes</div>
          <a href="admin.php?panel=routepanel">Add a route</a><br /><br />
          <?php 
          

        #get places
          if ($_SESSION["userrole"] == "admin")
          {
            $routes = $routeDAO->getroutes();
          }
          else
          {
            //$route = $routeDAO->getplacesbypersonid($_SESSION['id']);
          }
          
          if ($routes != null)
          {
            ?>
            
            <form method="POST" action="../inc/BL/routeBL.php">
              <table class="table table-condensed ">
                <thead>
                  <th></th>
                  <th>Name</th>
                  <th>Point A</th>
                  <th>Point B</th>
                  <th>Price</th>
                </thead>
                <?php

                $index = 0;
                foreach ($routes as $route) {
                  $id = $route['id'];
                  ?>
                  <tr>
                    <td><input type="checkbox" name="routes[]" value="<?php echo $id; ?>"></td>
                    <td><?php echo $route['r_name']; ?></td>
                    <td><?php echo $route['r_pointA']; ?></td>
                    <td><?php echo $route['r_pointB']; ?></td>
                    <td><?php echo $route['r_price']; ?></td>
                    <td><a href="admin.php?panel=routepanel&routeid=<?php echo $id; ?>"><?php echo "Edit"; ?></a></td>
                  </tr>
                  <?php

                }
                ?>
              </table>
              <input type="submit" name="deleteroute" value="Delete" class="btn btn-small btn-primary">
              <?php
            }
            ?>
          </form>
        </div>