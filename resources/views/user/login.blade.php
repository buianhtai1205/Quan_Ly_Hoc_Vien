<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://kit.fontawesome.com/c0564c5ed5.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="login-div">
    <div class="logo">
        <div class="title">ASM School</div>
        <div class="sub-title">Page Management for University</div>
    </div>
    <div class="fields">
        <form action="">
            <div class="form-line">
                <div class="radio-button-group">
                    <input type="radio" name="object" checked="checked" value="Student" id="Student" />
                    <label for="Student">Student</label>
                    <input type="radio" name="object" value="Teacher" id="Teacher" />
                    <label for="Teacher">Teacher</label>
                    <input type="radio" name="object"  value="AcademicStaff" id="Academic" />
                    <label for="Academic">Academic</label>
                </div>
            </div>
            <div class="username">
                <i class="fa-solid fa-user"></i>
                <input type="username" placeholder="Enter your username">
            </div>
            <div class="password">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="Enter your password">
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">Save login for the next time</label>
            </div>

            <div class="forgot-pass">
                <i class="fa-solid fa-hand-point-right"></i>
                <a href="">Quên mật khẩu</a>
            </div>
            <button class="login-btn">
                Login
            </button>
        </form>

    </div>
</body>

</html>
