<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>
<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "tatcshop";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
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
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="style/home.css">
  <title>Home</title>
</head>

<body>
  <section>
    <div class="color"></div>
    <div class="color"></div>
    <div class="color"></div>
    <header>
      <!-- navbar -->
      <div class="container">
        <input type="checkbox" name="" id="check">

        <div class="logo-container">
          <h3 class="logo">Retial<span>Shop</span></h3>
          <h6 class="name"><?php echo $username; ?></h6>
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
                      <a href="PDcategory.php">จัดการข้อมูลประเภทสินค้า</a>
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
            <a href="#" class="btn transparent">ออกจากระบบ</a>
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

    <div class="row">
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <img src="images/img4.png" alt="" class="rounded float-end " style="width:80px;">
            <h5 class="card-title">สินค้าทั้งหมด</h5>
            <?php
                    $sql = "SELECT * FROM product";
                    $query = $conn->prepare($sql); 
                    $query->execute();
                    $fetch = $query->fetch();
                ?>
            <p class="card-text"><?= $fetch['Pro_amount'] ?></p>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <img src="images/img3.png" alt="" class="rounded float-end " style="width:50px;">
            <h5 class="card-title">ยอดขาย</h5>
            <?php
                      $sql = "SELECT COUNT(*) as sale FROM sale";
                      $query = $conn->prepare($sql); 
                      $query->execute();
                      $fetch = $query->fetch();
                ?>
            <p class="card-text"><?= $fetch['sale'] ?></p>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <img src="images/img2.png" alt="" class="rounded float-end " style="width:80px;">
            <h5 class="card-title">ยอดสั่งซื้อ</h5>
            <?php
                  $sql = "SELECT COUNT(*) as buy FROM buy";
                  $query = $conn->prepare($sql); 
                  $query->execute();
                  $fetch = $query->fetch();
                ?>
            <p class="card-text"><?= $fetch['buy'] ?></p>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card mt-4">
          <div class="card-body">
            <img src="images/img1.png" alt="" class="rounded float-end " style="width:80px;">
            <h5 class="card-title">รายได้เข้าร้านทั้งหมด</h5>
            <?php
                    $sql = "SELECT SUM(Net_price) - SUM(Net_discount) AS Total FROM sale";
                    $query = $conn->prepare($sql); 
                    $query->execute();
                    $fetch = $query->fetch();
                ?>
            <p class="card-text"><?= $fetch['Total'] ?></p>
          </div>
        </div>
      </div>
      <!-- คืนสินค้า -->
      <div class="row">
        <!-- รายการสั่งซื้อล่าสุด -->
        <div class="recentsale col-6">
          <div class="card mt-4">
            <div class="card-body">
              <!-- <img src="images/search.png" alt="" class="rounded float-end " style="width:80px;"> -->
              <div class="card-header py-3">
                <span class=" h3 font-weight-bold">รายการสั่งซื้อล่าสุด</span>
              </div>
              <div class="card-head-body">
                <div class="col mt-4">
                  <span class="h6 " style="margin-left :55px;">พนักงาน</span>
                  <span class="h6" Style="margin-left :190px;">วันที่รับสินค้า</span>
                  <span class="h6" style="margin-left :100px;">สถานะการสั่งซื้อ<span>
                </div>
              </div>
              <div class="card-body">
                <div class="card">
                  <div class="card-text-center">
                    <div class="container mt-4 mb-4">
                      <?php 
                      $sql_buy = "SELECT * FROM buy INNER JOIN employee ON buy.Emp_id = employee.Emp_id";
                      $query = $conn->prepare($sql_buy); 
                      $query->execute();
                      $fetch_all = $query->fetchAll(); // Fetch all rows
                                        
                          foreach ($fetch_all as $row) {
                              $buystatus = $row['Buy_status'];
                                        
                               if ($buystatus == 1) {
                                $echoStatus = "ยกเลิกการสังซื้อ";
                              } elseif ($buystatus == 2) {
                                $echoStatus = "รับสินค้าแต่ไม่ครบ";
                              } else {
                                $echoStatus = "รับสินค้าครบ";
                              }
                                            
                                echo '<span class=" " style="margin-left :0px ;">' . $row['Emp_name'] . '</td>';
                                echo '<span class="" Style="margin-left :120px;">' . $row['Receive_date'] . '</td>';
                                echo '<span class="" style="margin-left :98px;">' . $echoStatus . '</td>';
                                
                         }
                                        
                         while ($fetch = $query->fetchAll()) {
                    ?>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="return col-6">
          <div class="card mt-4">
            <div class="card-body">
              <!-- <img src="images/search.png" alt="" class="rounded float-end " style="width:80px;"> -->
              <div class="card-header ">
                <span class="h3 font-weight-bold">คืนสินค้า</span>
              </div>
              <?php
                   $sql = "SELECT * FROM re_turn inner join product on re_turn.pro_id=product.pro_id";
                   $query = $conn->prepare($sql); 
                   $query->execute();
 
                      while ($fetch = $query->fetch()){
                                                
                ?>
              <p class="card-text mt-3 mb-3">
                <?php echo '<span class="h6 mx-2">' . "<span class='h6 mx-2'>ใบเสร็จ</span>" . $fetch['Sale_id'] . '</span>'; ?>
                <?php echo '<span class="h6 mx-2">' . "<span class='h6 mx-2'>คืน</span>" . $fetch['Pro_name'] . '</span>'; ?>
                <?php echo '<span class="h6 mx-2">' . "<span class='h6 mx-2'>จำนวน</span>" . $fetch['Return_type'] . "<span class='h6 mx-2'>กระบอก</span>" . '</span>'; ?>
                <?php } ?>
              </p>
            </div>
          </div>
        </div>
      </div>

  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>

</html>
