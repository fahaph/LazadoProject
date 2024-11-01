<?php
session_start();
include '../connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="../user/partials/LAZADO.png">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        * {
            font-family: "Noto Sans Thai", "Helvetica Neue", sans-serif;
        }

        .alert-container {
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 9999;
            /* ให้มันอยู่ด้านบนสุด */
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100 min-vw-100">
        <div class="row w-100">
            <!-- Left side: Image -->
            <div class="col-md-7 d-none d-md-flex align-items-center">
                <img src="https://dlcdnrog.asus.com/rog/media/156718576721.webp"
                    alt="Sign Up Image" class="img-fluid rounded-end w-100">
            </div>
            <div class="col-md-5 d-md-flex align-items-center justify-content-center">
                <div class="container p-4" style="width: 60%; max-width: 60%; min-width: 350px;">
                    <h2 class="text-center mb-3">เข้าสู่ระบบ</h2>

                    <!-- form -->
                    <form action="login_db.php" method="POST">
                        <div class="mb-2">
                            <label for="username" class="form-label">ชื่อผู้ใช้งาน</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="ชื่อผู้ใช้งาน">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="รหัสผ่าน">
                                <span class="input-group-text">
                                    <i class="fa fa-eye" id="togglePassword"></i>
                                </span>
                            </div>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-danger">เข้าสู่ระบบ</button>
                        </div>
                    </form>
                    <div class="text-center">
                        <p class="mb-0">ยังไม่มีบัญชี? <a href="signup.php" class="text-primary">สร้างบัญชี</a>
                        </p>
                    </div>
                    <div class="text-center">
                        <p class="mb-0">หรือ <a href="../user/index.php" class="text-primary">เข้าใช้งานโดยไม่เข้าสู่ระบบ</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
</body>

</html>