<div class="panel panel-primary" id="profilepanel">
  <div class="panel-heading">
    News
  </div>
  <div class="panel-body">
<?php 
  if(array_key_exists('message', $_GET)){
    $message = $_GET['message'];
?>
<label><?php echo $message; ?></label>
<?php

  }
    ?>
  
    <form method="POST" action="BL/newsBL.php">
    <label>Heading: </label><input type="text" name="heading" maxlength="35"><br />
    <label>Description: </label><textarea name="description" cols="35" rows="5" maxlength="250"></textarea><br />
    <label>Link: </label><input type="text" name="link" maxlength="50"><br />
    <input type="submit" value="Add news" name="addnews" class="btn btn-primary btn-small">
    </form>
  </div>
</div>