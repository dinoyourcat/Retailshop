<?php
session_start();
include '../controller/connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
  <link
    href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="../style/homestyle.css">
  <title>Home</title>
</head>

<body>
  <!-- navbar -->
  <header>
    <!-- navbar -->
    <div class="container">
      <input type="checkbox" name="" id="check">

      <div class="logo-container">
        <h3 class="logo">Retial<span>Shop</span></h3>

        <?php
            if (!isset($_SESSION['username'])) {
                header("Location: login.php");
                exit();
            }

            $username = $_SESSION['username'];

            // ดึงข้อมูลพนักงานจากฐานข้อมูล
            $sql = "SELECT * FROM employee WHERE User_name = '$username'";
            $query = mysqli_query($conn, $sql); // ใช้ mysqli_query แทน execute
            $result = mysqli_fetch_assoc($query); // ใช้ mysqli_fetch_assoc แทน fetch_assoc

            if ($result) {
                $empId = $result['Emp_id'];
                $empName = $result['Emp_name'];
            } else {
                // หากไม่พบข้อมูลพนักงาน
                $empId = "Unknown";
                $empName = "Unknown";
            }
            ?>

        <h6 class="name"><?php echo $empName; ?></h6>
      </div>

      <div class="nav-btn">
        <div class="nav-links">
          <ul>
            <li class="nav-link" style="--i: .6s">
              <a href="home.php">หน้าแรก</a>
            </li>

            <li class="nav-link" style="--i: .85s">
              <a href="#">จัดการข้อมูลทั่วไป</a>
              <div class="dropdown">
                <ul>
                  <li class="dropdown-link">
                    <a href="province.php">จัดการข้อมูลจังหวัด</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="employee.php">จัดการข้อมูลพนักงาน</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="supplier.php">จัดการข้อมูลตัวแทนจำหน่าย</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="customer.php">จัดการข้อมูลลูกค้า</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="product.php">จัดการข้อมูลสินค้า</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="procat.php">จัดการข้อมูลประเภทสินค้า</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="shelf.php">จัดการข้อมูลชั้นวางสินค้า</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-link" style="--i: 1.1s">
              <a href="#">การจัดการสินค้า<i class="fas fa-caret-down"></i></a>
              <div class="dropdown">
                <ul>
                  <li class="dropdown-link">
                    <a href="sale.php">ขายสินค้า</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="buy.php">ซื้อสินค้าเข้าร้าน</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="return.php">คืนสินค้า</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>

        <div class="log-out" style="--i: 1.8s">
          <a href="#" onclick="location='login.php'" class="btn transparent">ออกจากระบบ</a>
        </div>
      </div>

      <div class="hamburger-menu-container">
        <div class="hamburger-menu">
          <div></div>
        </div>
      </div>
    </div>
  </header>
  <!-- end navbar -->

  <!-- สินค้าทั้งหมด -->
  <div class="row">
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <img src="../images/package.png" alt="" class="rounded-4 float-end " style="width:80px;">
          <h5 class="card-title">สินค้าทั้งหมด</h5>

          <?php
                  $sql = "SELECT COUNT(*) as productamount FROM product";
                  $query = mysqli_query($conn, $sql);
                  $fetch = mysqli_fetch_assoc($query);
                ?>
          <p class="card-text"><?= $fetch['productamount'] ?> รายการ</p>
        </div>
      </div>
    </div>
    <!-- สินค้าทั้งหมด -->

    <!-- ยอดสั่งซื้อ -->
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <img src="../images/order.png" alt="" class="rounded-4 float-end " style="width:80px;">
          <h5 class="card-title">ยอดสั่งซื้อ</h5>
          <?php
                 $sql = "SELECT COUNT(*) as buy FROM buy";
                 $query = mysqli_query($conn, $sql);
                 $fetch = mysqli_fetch_assoc($query);
                ?>
          <p class="card-text"><?= $fetch['buy'] ?> ออเดอร์</p>
        </div>
      </div>
    </div>
    <!-- ยอดสั่งซื้อ -->

    <!-- ยอดขาย -->
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <img src="../images/cart.png" alt="" class="rounded-4 float-end " style="width:80px;">
          <h5 class="card-title">ยอดขาย</h5>
          <?php 
          //คำนวนยอดขายรายวัน
          if (isset($_POST['dayCal'])) {
            // วันที่ปัจจุบัน
            $current_date = date("Y-m-d");
        
            // SQL Query สำหรับคำนวณยอดขายรายวันปัจจุบัน
            $sql = "SELECT SUM(Net_price) AS total_sales 
                    FROM sale 
                    WHERE DATE(Sale_date) = '$current_date'";
        
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $total_sales = $row['total_sales'];
        }
        //คำนวนยอดขายรายวัน

        //คำนวนยอดขายรายอาทิต
        if (isset($_POST['weekCal'])) {
          // คำนวณยอดขายรายสัปดาห์ปัจจุบัน
          $current_week_start = date('Y-m-d', strtotime('this week'));
          $current_week_end = date('Y-m-d', strtotime('this week +6 days'));
      
          $sql = "SELECT SUM(Net_price) AS total_sales FROM sale WHERE Sale_date BETWEEN '$current_week_start' AND '$current_week_end'";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          $total_sales = $row['total_sales'];
        }
        //คำนวนยอดขายรายอาทิต
          ?>
          <form method="post">
            <button type="submit" class="btn" data-bs-toggle="modal" data-bs-target="" name="dayCal">
              วัน
            </button>

            <button type="submit" class="btn" data-bs-toggle="modal" data-bs-target="" name="weekCal">
              สัปดาห์
            </button>
            <!-- Button for modal -->
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#month">
              เดือน
            </button>
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#year">
              ปี
            </button>
          </form>

          <!-- Modal month -->
          <div class="modal fade" id="month" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">กรุณาเลือกเดือนที่ต้องการ</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="" class="col-form-label">Month :</label>
                    <select class="form-select" aria-label="Default select example" name="empstatus"
                      value="<?php echo $row['Emp_status']; ?>">
                      <?php
                            if ($row['Emp_status'] == 1) {
                            ?>
                      <option selected value="1">เข้าระบบได้</option>
                      <option value="2">ไม่อนุญาตให้เข้าระบบ</option>
                      <?php
                            } else {
                            ?>
                      <option selected value="2">ไม่อนุญาตให้เข้าระบบ</option>
                      <option value="1">เข้าระบบได้</option>
                      <?php
                            }
                            ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal year -->
          <div class="modal fade" id="year" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">กรุณาเลือกปีที่ต้องการ</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="" class="col-form-label">Year :</label>
                    <select class="form-select" aria-label="Default select example" name="empstatus"
                      value="<?php echo $row['Emp_status']; ?>">
                      <?php
                            if ($row['Emp_status'] == 1) {
                            ?>
                      <option selected value="1">เข้าระบบได้</option>
                      <option value="2">ไม่อนุญาตให้เข้าระบบ</option>
                      <?php
                            } else {
                            ?>
                      <option selected value="2">ไม่อนุญาตให้เข้าระบบ</option>
                      <option value="1">เข้าระบบได้</option>
                      <?php
                            }
                            ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ยอดขายรายวัน -->
          <?php if (isset($total_sales)): ?>
          <h6 class="mt-3"></h6>
          <h6>วันที่ <?= $current_date ?></h6>
          <p class="card-text"><?= number_format($total_sales, 2) ?> บาท</p>
          <?php endif; ?>
          <!-- ยอดขายรายวัน -->

          <!-- ยอดขายรายอาทิตย์ -->
          <?php if (isset($total_sales)): ?>
          <p>ยอดขายรายสัปดาห์ปัจจุบัน: <?= number_format($total_sales, 2) ?> บาท</p>
          <?php endif; ?>
          <!-- ยอดขายรายอาทิตย์ -->
          <?php
                      $sql = "SELECT COUNT(*) as sale FROM sale";
                      $query = mysqli_query($conn, $sql);
                      $fetch = mysqli_fetch_assoc($query);
                ?>

        </div>
      </div>
    </div>
    <!-- ยอดขาย -->

    <!-- รายได้เข้าร้านทั้งหมด -->
    <div class="col-sm-4">
      <div class="card mt-4">
        <div class="card-body">
          <img src="../images/bath.png" alt="" class="rounded-4 float-end " style="width:80px;">
          <h5 class="card-title">รายได้เข้าร้านทั้งหมด</h5>
          <?php
                $sql = "SELECT SUM(Net_price) - SUM(Net_discount) AS Total FROM sale";
                $query = mysqli_query($conn, $sql);
                $fetch = mysqli_fetch_assoc($query);
                // echo number_format($fetch['Total'], 2); 
            ?>
          <p class="card-text"><?= number_format($fetch['Total'], 2) ?> บาท</p>
        </div>
      </div>
    </div>
    <!-- รายได้เข้าร้านทั้งหมด -->
  </div>

  <div class="row">
    <!-- รายการสั่งซื้อล่าสุด -->
    <div class="recentsale col-6">
      <div class="card mt-4">
        <div class="card-header py-3">
          <span class=" h3 font-weight-bold">รายการสั่งซื้อล่าสุด</span>
        </div>
        <div class="card-body">
          <!-- <img src="images/search.png" alt="" class="rounded float-end " style="width:80px;"> -->
          <div class="card-body">
            <div class="card">
              <div class="card-text-center">
                <div class="container mt-4 mb-4">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">พนักงาน</th>
                        <th scope="col">วันที่รับสินค้า</th>
                        <th scope="col">สถานะการสั่งซื้อ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    $sql = "SELECT buy.*, employee.Emp_name FROM buy INNER JOIN employee ON buy.Emp_id = employee.Emp_id ORDER BY Receive_date DESC LIMIT 8";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()): ?>
                      <tr>
                        <td><?php echo $row['Emp_name'] ?></td>
                        <td><?php echo $row['Receive_date'] ?></td>
                        <td><?php
                            if ($row['Buy_status'] !== false) {
                              $buystatus = $row['Buy_status'];
                              if ($buystatus == 1) {
                                $echoStatus = "ยกเลิกการสั่งซื้อ";
                              } elseif ($buystatus == 2) {
                                $echoStatus = "รับสินค้าแต่ไม่ครบ";
                              } else {
                                $echoStatus = "รับสินค้าครบ";
                              }
                              echo $echoStatus;
                            } else {
                              echo "ไม่มีสถานะการสั่งซื้อ";
                            }
                            ?>
                        </td>
                      </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- รายการสั่งซื้อล่าสุด -->

    <!-- คืนสินค้า -->
    <div class="return col-6">
      <div class="card mt-4">
        <div class="card-header py-3">
          <span class=" h3 font-weight-bold">รายการสินค้า</span>
        </div>
        <div class="card-body">
          <div class="card">
            <div class="card-text-center">
              <div class="container mt-4 mb-4">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">เลขที่ใบเสร็จ</th>
                      <th scope="col">สินค้าที่คืน</th>
                      <th scope="col">จำนวน</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                           $sql = "SELECT * FROM re_turn INNER JOIN product ON re_turn.pro_id = product.pro_id";
                           $query = mysqli_query($conn, $sql);
         
                           while ($fetch = mysqli_fetch_assoc($query)) {
                          ?>
                    <tr>
                      <td>
                        <?php echo $fetch['Sale_id'] . '</span>'; ?>
                      </td>
                      <td>
                        <?php echo $fetch['Pro_name'] . '</span>'; ?>
                      </td>
                      <td>
                        <?php echo $fetch['Amount'] . "<span class='h6 mx-2'>กระบอก</span>" . '</span>'; ?>
                      </td>
                    </tr>
                    <?php
                          }
                          ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- คืนสินค้า -->
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>

</html>
