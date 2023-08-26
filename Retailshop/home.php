<?php
session_start();
include 'connect.php';

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
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
    rel="stylesheet">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="style/home.css">
  <title>Home</title>
</head>

<body>

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
        $sql = "SELECT Emp_name FROM employee WHERE User_name = :username";
        $query = $conn->prepare($sql);
        $query->bindParam(':username', $username);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $empName = $result['Emp_name'];
        } else {
            // หากไม่พบข้อมูลพนักงาน
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


  <!-- สินค้าทั้งหมด -->
  <div class="row">
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <img src="images/package.png" alt="" class="rounded-4 float-end " style="width:80px;">
          <h5 class="card-title">สินค้าทั้งหมด</h5>
          <?php
                    $sql = "SELECT * FROM product";
                    $query = $conn->prepare($sql); 
                    $query->execute();
                    $fetch = $query->fetch();
                ?>
          <p class="card-text"><?= $fetch['Pro_amount'] ?> ชิ้น</p>
        </div>
      </div>
    </div>
    <!-- สินค้าทั้งหมด -->

    <!-- ยอดสั่งซื้อ -->
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <img src="images/order.png" alt="" class="rounded-4 float-end " style="width:80px;">
          <h5 class="card-title">ยอดสั่งซื้อ</h5>
          <?php
                  $sql = "SELECT COUNT(*) as buy FROM buy";
                  $query = $conn->prepare($sql); 
                  $query->execute();
                  $fetch = $query->fetch();
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
          <img src="images/cart.png" alt="" class="rounded-4 float-end " style="width:80px;">
          <h5 class="card-title">ยอดขาย</h5>

          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="">
            วัน
          </button>
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="">
            สัปดาห์
          </button>
          <!-- Button for modal -->
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#month">
            เดือน
          </button>
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#year">
            ปี
          </button>

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
                  <button type="button" class="btn " data-bs-dismiss="">เดือน ...</button>
                  <button type="button" class="btn">เดือน ...</button>
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
                  <button type="button" class="btn" data-bs-dismiss="">ปี ...</button>
                  <button type="button" class="btn">ปี ...</button>
                </div>
              </div>
            </div>
          </div>

          <?php
                      $sql = "SELECT COUNT(*) as sale FROM sale";
                      $query = $conn->prepare($sql); 
                      $query->execute();
                      $fetch = $query->fetch();
                ?>
          <p class="card-text"><?= $fetch['sale'] ?> รายการ</p>
        </div>
      </div>
    </div>
    <!-- ยอดขาย -->

    <!-- รายได้เข้าร้านทั้งหมด -->
    <div class="col-sm-4">
      <div class="card mt-4">
        <div class="card-body">
          <img src="images/bath.png" alt="" class="rounded-4 float-end " style="width:80px;">
          <h5 class="card-title">รายได้เข้าร้านทั้งหมด</h5>
          <?php
                $sql = "SELECT SUM(Net_price) - SUM(Net_discount) AS Total FROM sale";
                $query = $conn->prepare($sql); 
                $query->execute();
                $fetch = $query->fetch();
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
                          $query = $conn->prepare($sql);
                          $query->execute();
                          $result = $query->fetchAll(PDO::FETCH_ASSOC);
                          foreach ($result as $row) {
                          ?>
                      <tr>
                        <td><?php echo $row['Emp_name'] ?></td>
                        <td><?php echo $row['Receive_date']?></td>
                        <td><?php
                                  $buystatus = $row['Buy_status'];

                                  if ($buystatus == 1) {
                                      $echoStatus = "ยกเลิกการสังซื้อ";
                                  } elseif ($buystatus == 2) {
                                      $echoStatus = "รับสินค้าแต่ไม่ครบ";
                                  } else {
                                      $echoStatus = "รับสินค้าครบ";
                                  }

                                  echo $echoStatus;
                                  ?>
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
                           $sql = "SELECT * FROM re_turn inner join product on re_turn.pro_id=product.pro_id";
                           $query = $conn->prepare($sql); 
                           $query->execute();
         
                              while ($fetch = $query->fetch()){
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
