<?php
    date_default_timezone_set("Asia/Bangkok");
    $conn = new mysqli('127.0.0.1','root','','job');
    if($conn->set_charset('utf8')== TRUE){
        // ตั่งค่าภาษาในฐานข้อมูลให้ เป็น utf8 สำเร็จหรือไม่ถ้าสำเร็จให้ทำบรรทัดต่อไป
        if($conn->connect_error){
            die('ไม่สามารถเชื่อมต่อฐานข้อมูลได้ <br>'.$conn->connect_error);
            exit(); //ปิดการทำงงานของโปรแกรม
        }
    }else{
        echo 'ตั้งค่าภาษาไม่สำเร็จ';
        exit();
    }
    
?>