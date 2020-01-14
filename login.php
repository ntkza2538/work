<?php
   require_once('db.php');
   $sql ="SELECT * FROM work";
   $result = $conn->query($sql);
   while($rs = $result->fetch_assoc()){
      $money = $rs['salary'];
      echo  number_format($money,2,'.',',');
   }

?>