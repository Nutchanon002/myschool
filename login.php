<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authenticaion Page</title>
    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <!-- css stylesheet -->
    <link rel="stylesheet" href="login-style.css">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="registration.php" method="post">
                <h1>ลงทะเบียนสมาชิกใหม่</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>หรือใช้อีเมลในการลงทะเบียน</span>
                <div class="infield">
                    <input type="text" placeholder="ชื่อ-นามสกุล" name="fullname" required>
                    <label></label>
                </div>
                <div class="infield">
                    <input type="email" placeholder="Email" name="email" required>
                    <label></label>
                </div>
                <div class="infield">
                    <input type="password" placeholder="รหัสผ่าน" name="password" required>
                    <label></label>
                </div>
                <div class="infield">
                    <select name="role" id="role" required>
                        <option value="" disabled selected>-- ประเภทสมาชิก --</option>
                        <option value="teacher">คุณครู</option>
                        <option value="student">นักเรียน</option>
                    </select>
                </div>
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="dologin.php" method="post" autocomplete="off">
                <h1>เข้าสู่ระบบ</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>หรือระบุอีเมลและรหัสผ่าน</span>
                <div class="infield">
                    <input type="email" placeholder="Email" name="email">
                    <label></label>
                </div>
                <div class="infield">
                    <input type="password" placeholder="Password" name="password">
                    <label></label>
                </div>
                <?php
                    if (isset($_GET['err'])) {
                        echo "<span class='error'>*อีเมลหรือรหัสผ่านไม่ถูกต้อง!</span>";
                    }
                ?>
                <a href="password_recovery.php" class="forgot">ลืมรหัสผ่าน?</a>
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container" id="overlayCon">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>ยินดีต้อนรับ!</h1>
                    <p>หากมีบัญชีในระบบนี้แล้ว <br>กรุณากรอกข้อมูลเพื่อเข้าสู่ระบบ</p>
                    <button>Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>ยังไม่เป็นสมาชิก!</h1>
                    <p>หากยังไม่มีบัญชีในระบบนี้ <br>กรุณาลงทะเบียนสมาชิกใหม่ก่อน</p>
                    <button>Sign Up</button>
                </div>
            </div>
            <button id="overlayBtn"></button>
        </div>
    </div>

    
    <!-- js code -->
    <script>
        const container = document.getElementById('container');
        const overlayCon = document.getElementById('overlayCon');
        const overlayBtn = document.getElementById('overlayBtn');
        overlayBtn.addEventListener('click', () => {
            container.classList.toggle('right-panel-active');
        });
    </script>

</body>
</html>
