<?php
 session_start();

 // ลบข้อมูล session ทั้งหมด
 session_unset(); 

 // ทำลาย session
 session_destroy();

 // กลับไปหน้า login.php
 header('location: login.php');

 // จบการทำงาน
 exit();
?>