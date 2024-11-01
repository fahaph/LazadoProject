<?php include('partials/header.php'); ?>

<!-- Body -->
<div class="container-sm mt-5">
    <h1>จัดการสินค้า</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addProductModal">เพิ่มสินค้า</button>
    <div class="d-flex float-end me-2">
        <form action="manage_product.php" method="get" class="input-group">
            <input type="text" aria-label="Search" class="form-control" placeholder="ค้นหาสินค้า" id="keyword" name="keyword">
            <button type="submit" class="input-group-text search-icon-class">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>

    <!-- Modal for Add Product -->
    <div class="modal fade" id="addProductModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="add_product.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">เพิ่มสินค้า</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="id" id="order_id">

                        <!-- Product Name field -->
                        <div class="form-group mb-3">
                            <label for="product_name">ชื่อสินค้า</label>
                            <input type="text" class="form-control" placeholder="กรุณาใส่ชื่อสินค้า" name="name" required>
                            <div class="invalid-feedback">
                                กรุณาใส่ชื่อสินค้า
                            </div>
                        </div>

                        <!-- Description field -->
                        <div class="form-group mb-3">
                            <label for="description">รายละเอียด</label>
                            <textarea class="form-control" name="description" placeholder="กรุณาใส่รายละเอียดสินค้า" rows="7"></textarea>
                        </div>

                        <!-- Price field -->
                        <div class="form-group mb-3">
                            <label for="price_product">ราคา</label>
                            <input type="number" class="form-control" placeholder="กรุณาใส่ราคา" name="price" required>
                        </div>

                        <!-- Product Image field -->
                        <div class="form-group mb-3">
                            <label for="product_image" class="form-label">รูปสินค้า</label>
                            <input type="file" class="form-control" name="file" accept="image/gif, image/jpeg, image/png">
                        </div>

                        <!-- Product Category field -->
                        <div class="form-group mb-3">
                            <label for="product_category">หมวดหมู่สินค้า</label>
                            <select class="form-select" aria-label="category" name="category" required>
                                <option value="" selected>เลือกหมวดหมู่สินค้า</option>
                                <option value="1">คีย์บอร์ด</option>
                                <option value="2">เมาส์</option>
                                <option value="3">หูฟัง</option>
                                <option value="4">จอมอนิเตอร์</option>
                                <option value="5">เก้าอี้</option>
                                <option value="6">สตรีมมิ่ง</option>
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิดหน้าต่าง</button>
                        <button type="submit" class="btn btn-primary" name="addProduct">เพิ่มสินค้า</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal for Update Product Details -->
    <div class="modal fade" id="updateProductDetailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateProductDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="update_product.php" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateProductDetailModalLabel">อัปเดตรายละเอียดสินค้า</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="id" id="order_id">

                        <!-- Product Name field -->
                        <div class="form-group mb-3">
                            <label for="product_name">ชื่อสินค้า</label>
                            <input type="text" class="form-control" placeholder="กรุณาใส่ชื่อสินค้า" name="name">
                        </div>

                        <!-- Description field -->
                        <div class="form-group mb-3">
                            <label for="description">รายละเอียด</label>
                            <textarea class="form-control" name="description" placeholder="กรุณาใส่รายละเอียดสินค้า" rows="7"></textarea>
                        </div>

                        <!-- Price field -->
                        <div class="form-group mb-3">
                            <label for="price_product">ราคา</label>
                            <input type="number" class="form-control" placeholder="กรุณาใส่ราคา" name="price">
                        </div>

                        <!-- Discount field -->
                        <div class="form-group mb-3">
                            <label for="price_product">ต้องการให้มีส่วนลดไหม</label>
                            <select class="form-select" aria-label="discount" name="discount" id="discountSelect" onchange="toggleDiscountPrice()">
                                <option value="0">ไม่มีส่วนลด</option>
                                <option value="1">มีส่วนลด</option>
                            </select>
                        </div>

                        <!-- Discounted Price field -->
                        <div class="form-group mb-3">
                            <label for="price_product">ราคาที่ลดแล้ว</label>
                            <input type="number" class="form-control" placeholder="กรุณาใส่ราคาที่ลดแล้ว" name="discounted_price" id="discountedPriceInput" disabled>
                        </div>

                        <!-- Product Image field -->
                        <div class="form-group mb-3">
                            <label for="product_image" class="form-label">รูปสินค้า</label>
                            <img id="product_image_preview" src="" alt="Current Image" class="img-thumbnail mb-2" style="max-width: 200px; display:flex;">
                            <input type="file" class="form-control" name="file" accept="image/gif, image/jpeg, image/png">
                        </div>

                        <!-- Product Category field -->
                        <div class="form-group mb-3">
                            <label for="product_category">หมวดหมู่สินค้า</label>
                            <select class="form-select" aria-label="category" name="category">
                                <option selected>เลือกหมวดหมู่สินค้า</option>
                                <option value="1">คีย์บอร์ด</option>
                                <option value="2">เมาส์</option>
                                <option value="3">หูฟัง</option>
                                <option value="4">จอมอนิเตอร์</option>
                                <option value="5">เก้าอี้</option>
                                <option value="6">สตรีมมิ่ง</option>
                            </select>
                        </div>

                        <!-- Available Item field -->
                        <div class="form-group mb-3">
                            <label for="available">มีสินค้าในสต๊อกไหม</label>
                            <select class="form-select" aria-label="stock" name="available">
                                <option value="1">มีสินค้า</option>
                                <option value="0">สินค้าหมด</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิดหน้าต่าง</button>
                        <button type="submit" class="btn btn-primary">อัปเดตสินค้า</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- Icon หมวดหมู่-->
<section class="container">
    <div class="row text-center">
        <h2 class="text-center mt-5">จัดเรียงตามประเภท</h2>
        <div class="col">
            <div class="category-item m-4 <?php echo ($currentPage === 'manage_product.php' || strpos($currentPage, 'manage_product.php?keyword=') === 0) ? 'active' : ''; ?>"
                onclick="window.location.href='manage_product.php'">
                <i class="bi bi-grid" style="font-size: 2rem;"></i>
                <p>ทั้งหมด</p>
            </div>
        </div>

        <div class="col">
            <div class="category-item m-4 <?php echo ($currentPage === 'manage_product.php?c=keyboard') ? 'active' : ''; ?>"
                onclick="window.location.href='manage_product.php?c=keyboard'">
                <i class="bi bi-keyboard" style="font-size: 2rem;"></i>
                <p>คีย์บอร์ด</p>
            </div>
        </div>
        <div class="col">
            <div class="category-item m-4 <?php echo ($currentPage === 'manage_product.php?c=mouse') ? 'active' : ''; ?>"
                onclick="window.location.href='manage_product.php?c=mouse'">
                <i class="bi bi-mouse" style="font-size: 2rem;"></i>
                <p>เมาส์</p>
            </div>
        </div>
        <div class="col">
            <div class="category-item m-4 <?php echo ($currentPage === 'manage_product.php?c=headset') ? 'active' : ''; ?>"
                onclick="window.location.href='manage_product.php?c=headset'">
                <i class="bi bi-headset" style="font-size: 2rem;"></i>
                <p>หูฟัง</p>
            </div>
        </div>
        <div class="col">
            <div class="category-item m-4 <?php echo ($currentPage === 'manage_product.php?c=monitor') ? 'active' : ''; ?>"
                onclick="window.location.href='manage_product.php?c=monitor'">
                <i class="bi bi-display" style="font-size: 2rem;"></i>
                <p>จอมอนิเตอร์</p>
            </div>
        </div>
        <div class="col">
            <div class="category-item m-4 <?php echo ($currentPage === 'manage_product.php?c=chair') ? 'active' : ''; ?>"
                onclick="window.location.href='manage_product.php?c=chair'">
                <i class="bi bi-chair" style="font-size: 2rem;"><img
                        src="https://www.svgrepo.com/show/281964/desk-chair-chair.svg"
                        style="height: 2.5rem; width: 2.5rem; color:blue;"></i>
                <p>เก้าอี้</p>
            </div>
        </div>
        <div class="col">
            <div class="category-item m-4 <?php echo ($currentPage === 'manage_product.php?c=streaming') ? 'active' : ''; ?>"
                onclick="window.location.href='manage_product.php?c=streaming'">
                <i class="bi bi-broadcast-pin" style="font-size: 2rem;"></i>
                <p>สตรีมมิ่ง</p>
            </div>
        </div>
    </div>

    <div class="row search-container my-4">
        <?php
        $c = '';
        $keyword = '';
        $sql = "SELECT * FROM products ORDER BY available DESC, discount DESC, created_at DESC";

        if (isset($_GET["c"])) {
            $c = $_GET['c'];
        }
        if (isset($_GET["keyword"])) {
            $keyword = $_GET['keyword'];
            $sql = "SELECT * FROM products WHERE name LIKE '%$keyword%' ORDER BY available DESC, discount DESC, created_at DESC";
        }

        if ($c == 'keyboard') {
            $sql = "SELECT * FROM products WHERE category=1 ORDER BY available DESC, discount DESC, created_at DESC";
        } elseif ($c == 'mouse') {
            $sql = "SELECT * FROM products WHERE category=2 ORDER BY available DESC, discount DESC, created_at DESC";
        } elseif ($c == 'headset') {
            $sql = "SELECT * FROM products WHERE category=3 ORDER BY available DESC, discount DESC, created_at DESC";
        } elseif ($c == 'monitor') {
            $sql = "SELECT * FROM products WHERE category=4 ORDER BY available DESC, discount DESC, created_at DESC";
        } elseif ($c == 'chair') {
            $sql = "SELECT * FROM products WHERE category=5 ORDER BY available DESC, discount DESC, created_at DESC";
        } elseif ($c == 'streaming') {
            $sql = "SELECT * FROM products WHERE category=6 ORDER BY available DESC, discount DESC, created_at DESC";
        }

        $result = mysqli_query($conn, $sql);
        $numrows = $result->num_rows;
        ?>
        <h4>ผลลัพธ์การค้นหา: <?php echo $numrows ?> รายการ </h4>
        <div class="container my-5">
            <div class="row">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="col col-md-2 mb-4">
                            <div class="card h-100" style="background-color: rgba(0, 0, 0, 0.02);">
                                <div class="card-body">
                                    <?php
                                    $imageURL = !empty($row['file_name']) ? '../uploads/' . $row['file_name'] : 'https://t3.ftcdn.net/jpg/04/62/93/66/360_F_462936689_BpEEcxfgMuYPfTaIAOC1tCDurmsno7Sp.jpg';
                                    ?>
                                    <img src="<?php echo $imageURL ?>" class="card-img-top mb-3" alt="Image" width="200px" loading="lazy">
                                    <h5 class="card-title" style="font-weight:600; font-size:0.8rem;"><?php echo $row['name']; ?></h5>
                                </div>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <div class="card-text text-danger" style="font-weight: bold; font-size: 1rem;">
                                        <?php
                                        if ($row['available'] == 1) {
                                            if ($row['discount'] == 1 && !empty($row['discounted_price'])) {
                                                echo "<span style='color: green; font-size: 0.9rem; font-weight: bold;'>ลดราคา</span><br>";
                                                echo "฿" . number_format($row['discounted_price'], 2); // แสดงราคาที่ลดแล้ว
                                            } else {
                                                echo "฿" . number_format($row['price'], 2); // แสดงราคาปกติ
                                            }
                                        } else {
                                            echo "<span style='color: red; font-size: 0.9rem; font-weight: bold;'>สินค้าหมด</span>";
                                        }
                                        ?>
                                    </div>
                                    <div class="d-flex justify-content-end ms-auto">
                                        <button type="button" class="btn btn-success btn-vsm me-1"
                                            data-bs-toggle="modal"
                                            data-bs-target="#updateProductDetailModal"
                                            data-id="<?php echo $row['id']; ?>"
                                            data-name="<?php echo $row['name']; ?>"
                                            data-description="<?php echo $row['description']; ?>"
                                            data-price="<?php echo $row['price']; ?>"
                                            data-discount="<?php echo $row['discount']; ?>"
                                            data-discounted_price="<?php echo $row['discounted_price']; ?>"
                                            data-file="<?php echo $row['file_name']; ?>"
                                            data-category="<?php echo $row['category']; ?>"
                                            data-available="<?php echo $row['available']; ?>">
                                            อัปเดต
                                        </button>
                                        <a href="#" class="btn btn-danger btn-vsm delete_product" data-id="<?php echo $row['id']; ?>">ลบ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "ไม่พบข้อมูล";
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php include('partials/footer.php'); ?>