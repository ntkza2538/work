<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>หางานสงขลา</title>
      <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/plugins/select2/select2.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
      <!-- Just an image -->
      <!-- navbar -->
      <?php require_once('includes/navbar.php');?>
      <!-- alert -->
      <?php require_once('includes/alert.php');?>
      <!-- search work -->
      <section class="container mt-4">
         <div class="row">
            <div class="col col-sm-12 border broder p-4">
               <h4>แบบฟอร์มเพิ่มงาน</h4>
               <hr>
               <form id="frm" action ="create.php" method="post">
                  <div class="form-group">
                     <label>Sex</label>
                     <select class="form-control select2" name="sex[]" id="sex" multiple="multiple" data-placeholder="Select a Tags" style="width: 100%;" required> 
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                        <option value="ไม่ระบุ">ไม่ระบุ</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="exampleInputEmail1">Position</label>
                     <input type="text" class="form-control" name ='Position'id="Position" aria-describedby="Position" required>
                  </div>
                  <div class="form-group">
                     <label for="exampleInputPassword1">Company name</label>
                     <input type="text" class="form-control" name="Company_name" id="Company_name" required>
                  </div>
                  <div class="form-group">
                     <label for="validationTextarea">Address</label>
                     <textarea class="form-control" name="address" id="address" placeholder="" required></textarea>
                  </div>
                  <div class="form-group">
                     <label for="exampleInputPassword1">Phone number</label>
                     <input type="text" name="phone_number" id="phone_number" class="form-control" data-inputmask='"mask": "999 999-9999"' data-mask required>     
                  </div>
                  <div class="form-group">
                     <label for="exampleInputPassword1">Amount rate</label>
                     <input type="text" class="form-control" name="Amount_rate" id="Amount_rate" required>
                  </div>

                  <div class="form-group">
                     <label>Salary</label>
                     <select class="form-control select2" name="salary" id="salary" multiple="multiple" data-placeholder="Select a Tags" style="width: 100%;" required>
                        <option value="ไม่ระบุ">ไม่ระบุ</option>
                        <option value="ตามตกลง">ตามตกลง</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <label>Educational</label>
                     <select class="form-control select2" name="educational[]" id="educational" multiple="multiple" data-placeholder="Select a Tags" style="width: 100%;" required>
                        <option value="ประถม">ประถม</option>
                        <option value="มัธยมต้น">มัธยมต้น</option>
                        <option value="มัธยมปลาย">มัธยมปลาย</option>
                        <option value="ปวช">ปวช</option>
                        <option value="ปวส">ปวส</option>
                        <option value="ปริญาตรี">ปริญาตรี</option>
                        <option value="ปริญาโท">ปริญาโท</option>
                        <option value="ปริญาเอก">ปริญาเอก</option>
                        <option value="ไม่ระบุ">ไม่ระบุ</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="exampleInputPassword1">Workplace</label>
                     <input type="text" class="form-control" name="Workplace" id="Workplace"  required>
                  </div>
                  <div class="form-group">
                     <label for="validationTextarea">Property</label>
                     <textarea class="form-control" name="property" id="property" placeholder="" required></textarea>
                  </div>
                  <input class="btn btn-primary " type="submit" name="submit" id="submit" value="บันทึก">

               </form>
            </div>
            <div class="col col-sm-4">
            </div>
         </div>
      </section>
      <?php require('includes/footer.php');?>

      <script src="node_modules/jquery/dist/jquery.min.js"></script>
      <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
      <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="assets/plugins/input-mask/jquery.inputmask.js"></script>
      <script src="assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
      <script src="assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
      <script src="assets/plugins/ckeditor/ckeditor.js"></script> 
      <script src="assets/plugins/select2/select2.full.min.js"></script>
      <script src="assets/js/main.js"></script>      
      <script>
         $('.select2').select2()
         // input mask phone number
             //Datemask dd/mm/yyyy
         $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
         //Datemask2 mm/dd/yyyy
         $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
         //Money Euro
         $('[data-mask]').inputmask()
         // CKEDIT
         // CKEDITOR.replace( 'property' );
         
         CKEDITOR.replace('property');
         function CKupdate() {
             for (instance in CKEDITOR.instances)
                 CKEDITOR.instances[instance].updateElement();
         }       
      </script>
   </body>
</html>