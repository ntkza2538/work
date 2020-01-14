<?php
   require_once('db.php');
   $wr_id = $_GET['vid'];
   $sql = "SELECT * FROM  `work` WHERE wr_id = '".$wr_id."'";
   $rs  = $conn->query($sql);
   $row = $rs->fetch_assoc();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>หางานสงขลา</title>
      <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="node_modules/angular/angular-csp.css">
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
      <!-- Just an image -->
      <!-- navbar -->
      <?php include('includes/navbar.php');?>
      <!-- alert -->
      <!-- Show work -->
      <div class="container">
         <div class="row">
            <div class="col col-sm-12 mt-4">
               <h1 class="my-2"><small></small><u><?php echo $row['position'];?></u></h1>
               <hr>
               <div class="alert alert-success text-dark" style="background-color:#f8f8f8; border-color:#007bff;" role="alert">
                  <h5>
                     <?php echo $row['Company_name'];?><br>
                     <small><i class="fa fa-location-arrow"></i> <?php echo $row['address'];?></small><br>
                     <small><span class="fa fa-tty"></span> <?php echo $row['phone_number'];?></small><br>
                     <small>จำนวน : <?php if($row['Amount_rate']=='ไม่ระบุ'){ echo 'ไม่ระบุ';}else{ echo $row['Amount_rate'].' '.'อัตรา';}?> </small> <br>
                     <small class="text-danger">เงินเดือน : <?php echo $row['salary'];?></small> <br>
                     <small>เพศ : <?php echo $row['sex'];?></small> <br>
                     <small>วุฒิการศึกษา : <?php echo $row['educational_background'];?></small> <br>
                     <small>ที่ปฏิบัติงาน :<?php echo $row['Workplace'];?></small> 
                     <hr>
                     <p class="ml-2">
                     <hr>
                     <div class="show-all-job"role="alert">
                        <?php echo $row['property'];?>
                     </div>
                     </p>
                  </h5>
               </div>
            </div>
            <div class="col col-sm-4">
            </div>
         </div>
      </div>
      <footer class="footer">
         <span> COPYRIGHT © 2018 
         <a href="https://www.facebook.com/WebAppzStory" target="_blank">หางานสงขลา.com</a>
         ALL Right Reserved
         </span>
      </footer>
      <!-- Section On to Top -->
      <div class="to-top">
         <i class="fa fa-angle-up" aria-hidden="true"></i>
      </div>
      <script src="node_modules/jquery/dist/jquery.min.js"></script>
      <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
      <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="assets/js/main.js"></script>
   </body>
</html>