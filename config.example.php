<?php

// ตั้งค่าให้ host
$_host = "xxx";
$_user = "xxx";
$_password = "xxx";
$_db = "myschool";

// สร้างการเชื่อมต่อ ไว้ในค่าตัวเเปร $conn
$conn = new mysqli($_host,$_user,$_password,$_db);

// ตรวจสอบว่าการเชื่อมต่อสำเร็จหรือไม่
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว:" . $conn->connect_error);
}

//ตั้งค่าภาษาให้กับฐานข้อมูล เป็น utf8
$conn->set_charset("utf8");
?>