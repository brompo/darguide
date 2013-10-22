<?php
if ($_SESSION['userrole'] == "admin")
{
  ?>
        <div class="panel panel-primary" id="userspanel">
          <div class="panel-heading"> Users</div>
          <div class="panel-body"> 
          <a href="admin.php?panel=userpanel">Back</a>
          <form method="POST" action="../inc/BL/userBL.php">
        
         
          <?php 

            $id = $_GET['id'];
            $user =  $userDAO->getuserbyuserid($id)

?>
<input type="text" hidden="true" name="id" value="<?php echo $id; ?>">
          <label>Firstname: </label><?php echo $user['firstname']; ?><br/>
          <label>Middlename: </label><?php echo $user['middlename']; ?><br />
          <label>Lastname: </label><?php echo $user['lastname']; ?><br/>
          <label>Gender: </label><?php echo $user['gender']; ?><br/>
          <label>Username: </label><?php echo $user['username']; ?><br/>
          <label>Role: </label><select name="userrole">
          <option <?php if($user['userole']== "normal"){ echo 'selected=\'selected\'';} ?> value="normal">Normal</option>
          <option <?php if($user['userole']== "admin"){ echo 'selected=\'selected\'';} ?>value="admin">Admin</option>
          <option <?php if($user['userole']== "guest"){ echo 'selected=\'selected\'';} ?>value="guest">Guest</option>
          </select>
          
      
          <input type="submit" value="Approve" class="btn btn-primary btn-small" name="approve">
          </form>
          </div>
        </div>
  <?php
}
?>