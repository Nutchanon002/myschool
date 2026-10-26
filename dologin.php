<?php
session_start(); // เริ่มต้นการทำงานของ session
require_once('config.php'); // เรียกใช้งานไฟล์ config.php

// ตรวจสอบว่ามีการส่งข้อมูลด้วยวิธี POST มาหรือไม่?
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $email = htmlspecialchars($_POST['email']); // รับค่า email ลบตัวอักษรพิเศษเเละช่องว่างออก
  $_password = trim($_POST['password']); // รับค่า password ลบช่องว่างออก

   // ใช้คำสั่ง prepare เพื่อป้องกันข้อมูลที่อาจจะถูก SQL Injection
   $stmt = $conn->prepare('SELECT * FROM account WHERE email = ? '); // ค้นหาข้อมูลจากตาราง account ที่มี gmail ตรงกับที่กรอกมา
   $stmt->bind_param("s",$email); // กำหนดค่าตัวเเปร email ในตำเเหน่ง ? ในคำสั่ง SQL ก่อนหน้า --> "s" หมายถึง ชนิดข้อมูลเป็น string
   $stmt->execute(); // ประมวลผลคำสั่ง SQL
   $result = $stmt->get_result(); // ดึงข้อมูลที่ได้จากการประมวลผลคำสั่ง SQL

   // ตรวจสอบว่าพบข้อมูลหรือไม่?
   if ($result->num_rows === 1){
   $row = $result->fetch_assoc(); // ดึงข้อมูลมา 1 เเถว

   // ตรวจสอบรหัสผ่าน
    if (password_verify($_password,$row['password'])){
   // Set ให้ค่าตัวเเปร session
       $_SESSION['user_id'] =$row['id'];
       $_SESSION['email'] =$row['email'];
       $_SESSION['fullname'] =$row['fullname'];
       $_SESSION['role'] =$row['role'];

        switch($row['role']){
            case 'admin':
                header('location: admin/index.php'); // ถ้าเป็น admin ให้ไปที่หน้า admin/index.php
                break;
            case 'teacher':    
                header('location: teacher/index.php'); // ถ้าเป็น teacher ให้ไปที่หน้า teacher/index.php
                break;
            case 'student':    
                header('location: student/index.php'); // ถ้าเป็น student ให้ไปที่หน้า student/index.php
                break;
            default:
                header('location: login.php?err=1'); // ถ้าไม่ได้กำหนด role ให้กลับไปที่หน้า login.php พร้อมส่งค่า err=1
                break;
        }     
    }
    else{
        header('location: login.php?err=1'); // ถ้ารหัสผ่านไม่ตรงกับฐานข้อมูลให้กลับไปที่หน้า login พร้อมคำว่า err=1
    }
   }
   else{
        header('location: login.php?err=1'); // ถ้าไม่พบให้กลับไปที่หน้า login พร้อมค่า  err=1
   }
}
else{
  header('location: login.php'); // ถ้าไม่ได้ส่งข้อมูลด้วยวิธี POST ให้ไปที่หน้า login.php


}

?>