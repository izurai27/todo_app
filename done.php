<?php
  require 'functions.php';

  $id = $_GET['id'];
  $status = $_GET['status'];
  // var_dump($_GET);
  // done($id);
  if(done($id,$status)>0){
    echo "
      <script>
        // alert('data berhasil diedit');
        document.location.href = 'index.php';
      </script>
    " ; 
  } else {
    echo "
      <script>
        alert('data gagal diedit');
        document.location.href = 'index.php';
      </script>
    " ; 
  }
?>