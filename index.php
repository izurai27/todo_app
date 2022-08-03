<?php
  
  require 'functions.php';
  
  $status='all';

  if(isset($_POST['all'])){
    $status = 'all';
  };

  if(isset($_POST['active'])){
    $status = '0';
  };
  if(isset($_POST['complete'])){
    $status = '1';
  };

  if(isset($_POST['clear'])){
    deleteComplete();
    $status = 'all';
  };

  $queryString = $status=='all'? "SELECT * FROM tbl_todo" : "SELECT * FROM tbl_todo WHERE completed_status=$status";
  
  $tasks = query_data($queryString);
  $left = status(0);
  $count_left = count($left);
 
 
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
  <!-- <div class='js'>js</div> -->
  <div class="bg"></div>
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
            
            <a href='hapus.php?id=<?= $task["id"]; ?>'><img class='delete' src='./images/icon-cross.svg' alt=""></a>
          </li>
        <?php endforeach; ?>
      <!-- end display all tasks -->

      <li class='bottom'>
        <span> <?= $count_left ?> items left </span>
        <div > 
          <form class='action' action='' method='post'>
            <?php if($status=='all'): ?>
              <button class='actionbtn filter' name='all'>All</button>
              <button class='actionbtn' name='active'>Active</button>
              <button class='actionbtn' name='complete'>Completed</button>
            
            <?php elseif($status=='1'): ?>
              <button class='actionbtn ' name='all'>All</button>
              <button class='actionbtn' name='active'>Active</button>
              <button class='actionbtn filter' name='complete'>Completed</button> 
            
            <?php elseif($status=='0'): ?>
              <button class='actionbtn ' name='all'>All</button>
              <button class='actionbtn filter' name='active'>Active</button>
              <button class='actionbtn' name='complete'>Completed</button>
            <?php endif ?>
          </form>    
        </div>
        <form class='action' action='' method='post'>
          <button class='actionbtn' name='clear'>Clear Completed</button>
        </form>
      </li>
    </ul>

   
  </main>
</body>
</html>