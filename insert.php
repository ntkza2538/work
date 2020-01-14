<?php
    require('db.php');
    $data = json_decode(file_get_contents("php://input"));
    if(count($data) > 0){
        $fullname = $conn->real_escape_string($data->fullname);
        $email    = $conn->real_escape_string($data->email);
        $phone    = $conn->real_escape_string($data->phone);
        $sql      ="INSERT INTO customer (fullname,email,phone) VALUES ('".$fullname."','".$email."','".$phone."')";
        if($result = $conn->query($sql)or die('err')){
            echo "data insert";
        }else{
            echo "error";
        }

    }
?>