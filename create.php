<?php

    if(isset($_POST['submit'])){
        require_once('db.php');
       
        $sex = join(',', $_POST['sex']);
        $Position = $conn->real_escape_string($_POST['Position']);
        $Company_name = $conn->real_escape_string($_POST['Company_name']);
        $address  = $conn->real_escape_string($_POST['address']);
        $phone_number = $conn->real_escape_string($_POST['phone_number']);
         $Amount_rate  = $conn->real_escape_string($_POST['Amount_rate']);
        $salary   = $conn->real_escape_string($_POST['salary']);
        $educational = join(',',$_POST['educational']);
        $Workplace  = $conn->real_escape_string($_POST['Workplace']);
        $property   = $conn->real_escape_string($_POST['property']);
        $today     =date("Y/m/d");
        $sql = "INSERT INTO  `work`(`position`,`sex`,`Company_name`,`address`,`phone_number`,`Amount_rate`,`salary`,`educational_background`,`Workplace`,`property`,`Announcement_date`) 
        VALUES('".$Position."','".$sex."','".$Company_name."','".$address."','".$phone_number ."','".$Amount_rate."','".$salary."','".$educational."','".$Workplace."','".$property."','".$today ."')";
        $rs  = $conn->query($sql) or die ('erro <br>'.$conn->error);
        if($rs){
            echo '<script>';
            echo 'alert("บันทึกข้อมูลสำเร็จ");';
            echo "window.location='index.php';";
            echo '</script>';
          
        }else{
            echo '<script>';
            echo 'alert("บันทึกข้อมูล ไม่สำเร็จ");';
            echo "window.location='form_create.php';";
            echo '</script>';
        }
    
    }

?>