<?php
if ($_SESSION['userrole'] == "admin")
{
  ?>
        <div class="panel panel-primary" id="userspanel">
          <div class="panel-heading"> Users</div>
          <div class="panel-body"> 
          <form method="POST" action="../inc/BL/userBL.php">
          <table class="table table-condensed">
          <thead>
            <th></th>
          	<th>Username</th>
          	<th>Role</th>
          	<th>Firstname</th>
          	<th>Lastname</th>
          	<th>Gender</th>
          	<th>Status</th>
          </thead>
          <?php 
            $users =  $userDAO->getusers();
            if ($users != null)
            {
            	foreach ($users as $user) {
           
            		?>
                


            		<tr>
            		<td><input type="checkbox" name="users[]" value="<?php echo $user['id']?>"></td>
            			<td><?php echo $user['username']; ?></td>
            			<td><?php echo $user['userole']; ?></td>
            			<td><?php echo $user['firstname']; ?></td>
            			<td><?php echo $user['lastname']; ?></td>
            			<td><?php echo $user['gender']; ?></td>
            			<td><?php echo $user['status']; ?></td>
            			<td><a href="admin.php?panel=edituserpanel&id=<?php echo $user['id'];?>">Edit</a></td>
            		</tr>
            		<?php
            	}
            }
          ?>
          </table>
          <input type="submit" value="delete" class="btn btn-primary btn-small" name="deletebutton">
          </form>
          </div>
        </div>
  <?php
}
?>
