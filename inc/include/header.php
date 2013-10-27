
<div class="navbar navbar-inner container">
  <a class="navbar-brand" href="index.php">City Guide</a>
  <ul class="nav navbar-nav">
    <li class="dropdown">
      <a href="" class="dropdown-toggle" data-toggle="dropdown">Services <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <?php 
        $categories = $categoryDAO->getcategories();
        if($categories != null)
        {
          foreach($categories as $category)
          {
            ?>
            <li><a href="navigation.php?id=<?php echo $category['id'];?>&name=<?php echo $category['name'];?>"><?php echo $category['name'];?></a></li>
            <?php
          }
        }
        ?>
      </ul>
    </li>
    <li><a href="about.php">About Us</a></li>
    <li><a href="contact.php">Contact Us</a></li>
  </ul>
  <form class="navbar-form col-lg-2">
    <input type="text" class="form-control" style="width:150px" placeholder="Search">
  </form>
  <?php if($_SESSION['userrole'] == "admin" || $_SESSION['userrole'] == "normal")
  {
    ?>
  <ul class="nav navbar-nav pull-right">
  <li><a href="admin.php" class="pull-right">Admin</a></li>
  </ul>
  <?php
  }
  if($_SESSION['userrole'] == "admin" || $_SESSION['userrole'] == "normal"){ 
    echo "<a class='navbar-link pull-right' href='inc/BL/userBL.php'>Logout</a>";
  } 
  else {
    echo "<a class='navbar-link pull-right' href='user.php'>Login</a>";
    } ?>

</div>