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

<!doctype html>
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
  <link rel="stylesheet" href="style/invoice.css">
  <title>Invoice</title>
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

        <h6 class="name" text="yellow-500"><?php echo $empName; ?></h6>
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

  <!-- receipt -->
  <div class="boxOne p-3 mb-5 bg-light-subtle text-emphasis-light border border-primary-subtle rounded-4 ">
    <div class="wrapper">
      <div class="border-design top row">
        <div class="c1 col-sm-6"></div>
        <div class="c2 col-sm-6"></div>
        <div class="c3 col-sm-6"></div>
        <div class="c4 col-sm-6"></div>
        <div class="c5 col-sm-6"></div>
      </div>
    </div>
    <h1 class="tatcshop text-start">TATC SHOP
    </h1>
    <h2 class="mt-2 text-end">ใบเสร็จ</h2>
    <p class="saledetail text-end">รหัสการขาย Null</p>
    <div class="datetime text-end">
      <p class="time"></p>
      <p class="date"></p>
      <p class="text-end">รหัสพนักงาน <span class="text-secondary"> null </span><span>ชื่อ - นามสกุล</span>
        <span class="text-secondary"> null </span>
      </p>
      <div class="border-design bottom row">
        <div class="c1"></div>
        <div class="c2"></div>
        <div class="c3"></div>
        <div class="c4"></div>
        <div class="c5"></div>
      </div>
      <div class="line bg-secondary"></div>
    </div>
    <table class="table table-borderless">
      <thead>
        <tr>
          <th scope="col" class="text-center">ตัวแทนจำหน่าย</th>
          <th scope="col" class="text-center">รหัสสินค้า</th>
          <th scope="col" class="text-center">ชื่อสินค้า</th>
          <th scope="col" class="text-center">ราคาต่อหน่วย</th>
          <th scope="col" class="text-center">จำนวน</th>
          <th scope="col" class="text-center">ราคารวม</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center">null</td>
          <td class="text-center">null</td>
          <td class="text-center">null</td>
          <td class="text-center">null</td>
          <td class="text-center">null</td>
          <td class="text-center">null</td>
        </tr>
      </tbody>
    </table>
    <div class="line bg-secondary"></div>
    <table class="table table-borderless">
      <thead>
        <tr>
          <th scope="col" class="text-end">ราคาสุทธิ</th>
          <td class="text-end table-primary">null</td>
        </tr>
      </thead>
    </table>
    <div class="line bg-secondary"></div>
    <p class="thanks text-center">ขอบพระคุณที่ไว้ใจให้ TATC SHOP บริการคุณ</p>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <button class="btn btn-danger me-md-2" type="button">ย้อนกลับ</button>
    </div>


  </div>
  <!-- endreceipt -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="js/main.js" defer></script>

</body>

</html>