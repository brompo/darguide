<div class="panel panel-primary" id="categoriespanel">
  <div class="panel-heading"> Categories</div>
  <div class="panel-body">
    <form method="post" action="../inc/BL/categoryBL.php">
      <div class="input-group ">
       <input type="text" name="categoryname" class="form-control input-small" placeholder="Type a category name" />
       <span class="input-group-btn">
       <input type="submit" value="Add New Category" class="btn btn-primary btn-small" />
       </span>
     </div>
   </form>
   <label><b>Category List:</b>
    <?php
    if(array_key_exists('message', $_GET)){
     echo $_GET['message'];
    }
   ?></label>
   <form method="post" action="inc/BL/categoryBL.php">
    <table class="table table-condensed table-striped">
      <thead>
        <tr style="text-align:left;">
          <th>Check</th>
          <th>Name</th>
        </tr>
      </thead>
      <?php
      $categories = $categoryDAO->getcategories();
      if ($categories != null)
      {
        foreach($categories as $category)
        {
          ?>
          <tr>
            <td><input type="checkbox" name="categories[]" value="<?php echo $category['id']?>"</td>
            <td><?php echo $category['name']?></td>
          </tr>
          <?php
        }
      }
      ?>
    </table>
    <input type="submit" class="btn btn-primary btn-small" value="Delete Categories" />
  </form>
</div><!-- -->
</div>
