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
      <?php require_once('includes/navbar.php');?>
      <!-- alert -->
      <?php require_once('includes/alert.php');?>
      <!-- search work -->
      <div class="container mt-2">
         <div class="row">
            <div class="col col-sm-12">
               <h2><span class="fa fa-search"></span>ผลการค้นหา</h2>
            </div>
            <div class="col col-sm-12">
               <form action="search.php" method="get">
                  <div id="custom-search-input">
                     <div class="input-group">
                        <input type="text" name="search" class="search-query form-control" placeholder="ระบุตำแหน่งที่ต้องการสมัคร" value="<?php echo $_GET['search'];?>" />
                        <span class="input-group-btn">
                        <button type="button" disabled>
                        <span class="fa fa-search"></span>
                        </button>
                        </span>
                     </div>
                  </div>
               </form>
            </div>
            <div class="mt-4 col col-sm-6">
               <a href="index.php" class="btn btn-lg btn-primary text-white btn-block"><i class="fa fa-briefcase fa-1x"></i> งานทั้งหมด</a>
            </div>
            <div class="mt-4 col col-sm-6">
            <a href="form_create.php" class="btn btn-lg btn-primary text-white btn-block"><i class="fa fa-plus-circle fa-1x"></i> เพิ่มงาน</a>
            </div>
         </div>
      </div>
      <?php
         require_once('db.php');
         $perpage = 40;
         if( isset($_GET['page']) ){
            $page = $conn->real_escape_string( $_GET['page'] );
         
         }else{
            $page = 1;
         }
         
         $start = ($page -1) * $perpage;
         $search = $_GET['search'];
         $sql = "SELECT * FROM `work` WHERE `position` LIKE '%$search%'  ORDER BY wr_id DESC  limit {$start},{$perpage}";
         $resulsql = $conn->query($sql);
         $datars = $resulsql->num_rows;
         ?>
      <!-- Show work -->
      <section class="container">
         <div class="row">
            <?php if($datars > 0){?>
            <?php
               while($row = $resulsql->fetch_assoc()){
               ?>
            <div class="col col-sm-6 mt-4">
               <div class="show-all-job">
                  <h2><small><span class="fa fa-star fa-1x "></span></small> <a href="Details_work.php?vid=<?php echo $row['wr_id'];?>"><u><?php echo $row['position'];?></u></a></h2>
                  <h3 style="overflow:hidden; height:25px; line-height:25px;"><?php echo $row['Company_name'];?></h3>
                  <div style="overflow:hidden; height:25px; line-height:25px;"><span class="glyphicon glyphicon-map-marker"></span><?php echo $row['address'];?></div>
                  <div><span class="fa fa-tty"></span> <?php echo $row['phone_number'];?></div>
                  <div class="text-danger"><strong>เงินเดือน  : <?php if($row['salary']=='ไม่ระบุ'){echo 'ไม่ระบุ';}else{  $money = $row['salary']; echo $rs1 = number_format($money,2,'.',','); }?></strong></div>
                  <div><strong>วุฒิการศึกษา  : </strong><?php echo $row['educational_background'];?></div>
                  <div><strong>ที่ทำงาน  : </strong><?php echo $row['Workplace'];?></div>
                  <div><i class="fa fa-table"></i> วันที่ประกาศ <strong></strong> <?php $date = date_create($row['Announcement_date']); echo date_format($date,"d/m/y H:i:s");?>&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open"></span> </div>
               </div>
            </div>
            <?php }?>
            <?php
               $sql2 = "SELECT * FROM  `work`WHERE `position` LIKE '%$search%'  ";
               $query2 = $conn->query($sql2);
               $total_record = $query2->num_rows;
               $total_page = ceil($total_record / $perpage);
               ?> 
            <div class="col col-sm-12">
               <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-end">
                     <li class="page-item"><a class="page-link" href="search.php?page=1&search=<?php echo $search;?>">ก่อน</a></li>
                     <?php for($i=1; $i<=$total_page; $i++){?>
                     <li <?php if( $page == $i){?> class="page-item active"<?php }?>>
                        <a class="page-link" href="search.php?page=<?php echo $i; ?>&search=<?php echo $search;?>"><?php echo $i; ?></a>
                     </li>
                     <?php }?>
                     <li class="page-item"><a class="page-link" href="search.php?page=<?php echo $total_page;?>&search=<?php echo $search;?>">ต่อไป</a></li>
                  </ul>
               </nav>
            </div>
            <?php }else{?>
            <div class="col col-sm-12 mt-5">
               <h1 class="text-danger"><span class="fa fa-search"></span>ไม่พบข้อมูลที่ค้นหา</h1>
            </div>
            <br><br><br><br><br><br><br><br>
            <?php }?>
         </div>
      </section>
      <?php require('includes/footer.php');?>
      <script src="node_modules/jquery/dist/jquery.min.js"></script>
      <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
      <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="assets/js/main.js"></script>
   </body>
</html>