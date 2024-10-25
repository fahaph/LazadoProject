<?php
session_start();
require("../../connect.php");
$user_id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id=$user_id";
$result = mysqli_query($conn, $sql) or die('connection failed');
$row = $result->fetch_assoc();
?>

<div class="container ms-1" style="border-radius: 5px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>ข้อมูลส่วนตัว</h4>
        <button class="btn btn-edit">แก้ไขข้อมูลส่วนตัว</button>
    </div>

    <div class="user-info d-flex align-items-center">
        <div>
            <h5><?php echo $row['fullname']; ?></h5>
            <p><?php echo $row['email']; ?></p>
        </div>
    </div>

    <div class="row text-center my-4">
        <div class="col-md-4">
            <div class="status-card">
                <p>0</p>
                <span>เสร็จสิ้น</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="status-card">
                <p>0</p>
                <span>จัดส่งแล้ว</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="status-card">
                <p>0</p>
                <span>รอดำเนินการ</span>
            </div>
        </div>
    </div>
</div>