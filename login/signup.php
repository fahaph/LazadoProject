<?php
session_start();
include '../connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
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
    <div class="container min-vh-100 min-vw-100 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <!-- Left side: Image -->
            <div class="col-md-7 d-none d-md-flex align-items-center">
                <img src="https://static1.xdaimages.com/wordpress/wp-content/uploads/2022/07/ROG-Phone-6-series-wallpapers-featured.jpg" alt="Sign Up Image"
                    class="img-fluid rounded-end w-100">
            </div>

            <!-- Form -->
            <div class="col-md-5 d-md-flex align-items-center justify-content-center">
                <div class="container p-4 mx-auto" style="width: 60%; max-width: 60%; min-width: 350px;">
                    <h2 class="text-center mb-3">สร้างบัญชี</h2>
                    <form action="signup_db.php" method="POST">
                        <div class="mb-2">
                            <label for="fname" class="form-label">ชื่อ-สกุล</label>
                            <input type="text" class="form-control" id="fname" name="fullname" placeholder="ชื่อ-สกุล" required>
                        </div>
                        <div class="mb-2">
                            <label for="address" class="form-label">ที่อยู่</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="ที่อยู่" required>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">อีเมล</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="อีเมล" required>
                        </div>
                        <div class="mb-2">
                            <label for="username" class="form-label">ชื่อผู้ใช้งาน</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="ชื่อผู้ใช้งาน" required>
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="รหัสผ่าน" required>
                                <span class="input-group-text">
                                    <i class="fa fa-eye" id="togglePassword"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="c-password" class="form-label">ยืนยันรหัสผ่าน</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="c-password" name="c-password"
                                    placeholder="ยืนยันรหัสผ่าน" required>
                                <span class="input-group-text">
                                    <i class="fa fa-eye" id="toggleConfirmPassword"></i>
                                </span>
                            </div>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">สร้างบัญชี</button>
                        </div>
                    </form>
                    <div class="text-center">
                        <p class="mb-0">มีบัญชีอยู่แล้ว? <a href="login.php" class="text-danger">เข้าสู่ระบบ</a></p>
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