<?php
  $conn = mysqli_connect("localhost","root","","todo");

  
  function query_data($query){
    global $conn;
    $result = mysqli_query($conn,$query);
  
    $tasks = [];
    while($task = mysqli_fetch_assoc($result)){
      $tasks[] = $task;
    }

    return $tasks;

  }

  function insert_data($data){
    global $conn;
    mysqli_query($conn,$data);
    return mysqli_affected_rows($conn);
  }

  function hapus($id){
    global $conn;
    $del = "DELETE FROM tbl_todo WHERE id = $id" ;
    mysqli_query($conn,$del);
    return mysqli_affected_rows($conn);
  }

  function done($id,$status){
    global $conn;
    
    
    mysqli_query($conn,"UPDATE tbl_todo SET completed_status = !$status WHERE id = $id");

    return mysqli_affected_rows($conn);
  }

?>