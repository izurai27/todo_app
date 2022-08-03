<?php
  
  require 'functions.php';
 
  $tasks = query_data("SELECT * FROM tbl_todo");
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <title>To Do App</title>
</head>
<body>
  <main>
    <div class="title"> 
      <h1>TODO</h1>  
      <img src='./images/icon-sun.svg'>
    </div>
    <form action="insert.php" method="post">
      <input class='inputData' type="text" name="newTask" placeholder="Create a new todo..." autofocus autocomplete="off">
      <button type='submit' name='submit' class='submit'></button>
    </form>
    <ul>
      <!-- display all the tasks -->
        <?php foreach($tasks as $task): ?>
          <li>  
            <?php if($task["completed_status"]==1): ?>
              <a  class='blank' href='done.php?id=<?=$task["id"]; ?>&status=<?= $task["completed_status"]; ?>'><img class='check show' src='./images/icon-check.svg' alt=""></a>
              <span class='list_item stroke'><?= $task["list_item"]; ?></span>
            <?php else: ?>
              <a  class='blank'  href='done.php?id=<?=$task["id"]; ?>&status=<?= $task["completed_status"]; ?>'><img class='check' src='./images/icon-check.svg' alt=""></a>
              <span class='list_item'><?= $task["list_item"]; ?></span>
            <?php endif ?>
            
            <!-- <a class='blank' href='done.php?id=<?= $task["id"]; ?>&status=<?= $task["completed_status"]; ?>'><img class='check' src='./images/icon-check.svg' alt=""></a>
            
            <span class='list_item'><?= $task["list_item"]; ?></span> -->
            <a href='hapus.php?id=<?= $task["id"]; ?>'><img class='delete' src='./images/icon-cross.svg' alt=""></a>
          </li>
        <?php endforeach; ?>
      <!-- end display all tasks -->
    </ul>

    <!-- <div class='action'> 
      <span>All</span>
      <span>Active</span>
      <span>Completed</span>
    
    </div>

    <p>Drag and drop to reorder list</p> -->


  </main>
<script src='app.js'></script>
</body>
</html>