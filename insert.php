<?php
  require 'functions.php';
  $tasks = query_data("SELECT * FROM tbl_todo");

  if(isset($_POST['submit'])){
    
    $newTask = $_POST['newTask'];
    $completed_status = '0';
    // $priority = count($tasks)+1;
    
    $insert_data = "INSERT INTO tbl_todo
                    VALUES ('', '$newTask', '$completed_status')";
    
    $insert = insert_data($insert_data);
    if($insert>0){
      var_dump($insert);
      echo "
            <script>
              document.location.href = 'index.php';
            </script>
          " ; 
    } else {
      echo "
            <script>
              alert('fail adding task');
              document.location.href = 'index.php';
            </script>
          " ; 
    }
    



    $tasks = query_data("SELECT * FROM tbl_todo");
  }
?>