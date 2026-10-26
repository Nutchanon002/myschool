<?php

   session_start();
   require_once('../config.php'); // เรียกใช้งานไฟล์ config.php

   //ตรวจสอบว่ามีการ login หรือไม่
   if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin' ){
       
     header('location: ../login.php'); // ถ้าไม่ได้ login หรือไม่ใช่ admin ให้กลับไปที่หน้า login.php
     exit();

   }

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My school: Administrator</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
    <!--font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min,css" integrity="sha512-kfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjaXtEKNasOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    
    <!--css stylesheet-->
    <link rel="stylesheet" href="admin-style.css">

</head>
<body>
    <div class="warpper">
         <!--menu bar-->
        <aside id="sidebar" class="expand">
            <div class="d-flex">
                <button id="toggle-btn" type="button">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">My school</a>
                </div>
            </div>

          <!--Start in menu bar-->
            <ul class="sidebar-nav">

                <!--เมนูจัดการ profile-->
                <li class="sidebar-item">
                  <a id="profile" href="#" class="sidebar-link" onclick="load_content('profile');">
                    <i class = "fa-solid  fa-user"></i>
                    <span>Profile</span>
                  </a>
                </li>
                <!--End of เมนูจัดการโปรไฟล์-->

                <!--เมนูจัดการ ข่าวประกาศ-->
                <li class="sidebar-item">
                  <a id="news" href="#" class="sidebar-link" onclick="load_content('news');">
                    <i class = "fa-solid  fa-bullhorn"></i>
                    <span>ข่าวประกาศ</span>
                  </a>
                </li>
                <!--End of เมนูข่าวประกาศ-->

                <!--เมนูงานทะเบียน-->
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#personnel" aria-expanded="false" aria-controls="personnel">
                    <i class = "fa-solid  fa-users-between-lines"></i>
                    <span>งานทะเบียน</span>
                  </a>
                     <ul id="personel" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                           <a id="teacher" href="#" class="sidebar-link" onclick="load_content('teacher');">
                              <i class="fa-solid fa-person-chalkboard"></i>
                              <span>คุณครู</span>
                           </a>
                        </li>
                        <li class="sidebar-item">
                           <a id="student" href="#" class="sidebar-link" onclick="load_content('student');">
                              <i class="fa-solid fa-child-reaching"></i>
                              <span>นักเรียน</span>
                           </a>
                        </li>
                        <li class="sidebar-item">
                           <a id="parent" href="#" class="sidebar-link" onclick="load_content('parent');">
                              <i class="fa-solid fa-user-tie"></i>
                              <span>ผู้ปกครอง</span>
                           </a>
                        </li>
                     </ul>
                </li>
                <!--End of เมนูงานทะเบียน-->

                <!--เมนูจัดการวิชาการ-->
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#academic" aria-expanded="false" aria-controls="academic">
                    <i class = "fa-solid  fa-book-bookmark"></i>
                    <span>งานวิชาการ</span>
                  </a>
                     <ul id="academic" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                           <a id="subject" href="#" class="sidebar-link" onclick="load_content('subject');">
                              <i class="fa-solid fa-book"></i>
                              <span>วิชา</span>
                           </a>
                        </li>
                        <li class="sidebar-item">
                           <a id="schedule" href="#" class="sidebar-link" onclick="load_content('schedule');">
                              <i class="fa-solid fa-calendar-days"></i>
                              <span>ตารางสอน</span>
                           </a>
                        </li>
                        <li class="sidebar-item">
                           <a id="grade" href="#" class="sidebar-link" onclick="load_content('grade');">
                              <i class="fa-solid fa-list-check"></i>
                              <span>ผลการเรียน</span>
                           </a>
                        </li>
                     </ul>
                </li>
                <!--End of เมนูจัดการวิชาการ-->

                <!--เมนูงานอาคาร-->
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="building" aria-expanded="false" aria-controls="building">
                    <i class = "fa-solid  fa-building-flag"></i>
                    <span>อาคารเรียนเเละสถานที่</span>
                  </a>
                     <ul id="building" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                           <a id="room" href="#" class="sidebar-link" onclick="load_content('room');">
                              <i class="fa-solid fa-person-shelter"></i>
                              <span>ห้องเรียน</span>
                           </a>
                        </li>
                        <li class="sidebar-item">
                           <a id="building" href="#" class="sidebar-link" onclick="load_content('building');">
                              <i class="fa-solid fa-building"></i>
                              <span>อาคารเรียน</span>
                           </a>
                        </li>
                        <li class="sidebar-item">
                           <a id="equipment" href="#" class="sidebar-link" onclick="load_content('equipment');">
                              <i class="fa-solid fa-computer"></i>
                              <span>สื่อทัศนูปกรณ์</span>
                           </a>
                        </li>
                     </ul>
                </li>
                <!--End of เมนูงานอาคาร-->
            </ul>


            <!--logout-->
            <div class="sidebar-footer">
              <a href="../logout.php" class="sidebar-link">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
              </a>
            </div>
            <!--End of logout-->
        </aside>
        
      <!-- End of menu bar-->
        
        <!--Main content-->
        <div class="main-content p-3 ">
          <div class="text-center">Main Content</div>
        </div>
        <!--End of Main content-->
    </div>


  <!--jQuery-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!--Bootstrap JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!--Admin Script-->
  <script src="adminScript.js"></script>
  
</body>
</html>


