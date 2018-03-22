

<?php

$connect = mysqli_connect("localhost","root","");

    mysqli_select_db($connect,"langzeppelin") or die("Database does not exist");
    $userquery = mysqli_query($connect,"SELECT * FROM words ORDER BY RAND()");
    $data = array();
      while($row = mysqli_fetch_assoc($userquery)) {
      $data[]=$row;
    }
    $connect->close();

   // $_POST['data'];
?>
<script src="js/jquery.min.js"></script>
<script>
var allwords;
$(document).ready(function(){
  $(function(){
    jQuery.ajax({
      type: "POST",
      data:  data,

      success: function(data){
          allwords=data;
          console.log(allwords);
      }
    });
  });
});  
</script>
