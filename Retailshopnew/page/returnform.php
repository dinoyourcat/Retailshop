<?php
session_start();
include '../controller/connect.php';
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

$username = $_SESSION['username'];
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../style/returnform.css">
  <title>Return Form</title>
</head>

<body>
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
          <a href="login.php" class="btn transparent">ออกจากระบบ</a>
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
  <div class="boxOne p-3 mb-5 bg-light-subtle text-emphasis-light border border-dark-subtle rounded-3 ">
    <h6 class="text-center">TATC SHOP
      <span>
        <h2 class="mt-2">ใบคืนสินค้า</h2>
      </span>
    </h6>
    <?php   
      $select = isset($_GET['Sale_id'])? $_GET['Sale_id']:"";
      // echo $select;
      $sql = "SELECT * FROM sale INNER JOIN customer ON sale.Cust_id = customer.Cust_id WHERE sale.Sale_id = '$select'";
      
      $result = $conn->query($sql);
      // echo $sql;
      $row = mysqli_fetch_array($result);
      $custId = $row['Cust_id']
    ?>
    <p class="saledetail text-center">รหัสการขาย</p>
    <div class="datetime text-end">
      <p class="time"></p>
      <p class="date"></p>
      <p class="text-end">รหัสลูกค้า <span class="text-secondary"><?php echo $row['Cust_id'] ?></span><span>ชื่อ - นามสกุล</span>
        <span class="text-secondary"><?php echo $row['Cust_name']." ".$row['Cust_lastName'] ?></span>
      </p>
      <div class="line bg-secondary"></div>
    </div>
    <table class="table table-borderless">
      <thead>
        <tr>
          <th scope="col" class="text-start">ชื่อสินค้า</th>
          <th scope="col" class="text-center">ราคาหน่วยละ</th>
          <th scope="col" class="text-end">จำนวนสินค้าที่คืน</th>
        </tr>
      </thead>
      <tbody>
      <?php 
          $sql = "SELECT * FROM sale INNER JOIN re_turn ON sale.Sale_id = re_turn.Sale_id INNER JOIN product ON re_turn.Pro_id = product.Pro_id WHERE sale.Cust_id = '$custId' and sale.Sale_id = '$select'";
          $result = $conn->query($sql);
          $sum_price = 0;
          // echo $sql;
          
          while($row = mysqli_fetch_array($result)){
            $sum_price += $row['Pro_salePrice'];
            $comment = $row['Comment'];
        ?>
        <tr>
          <td class="text-start"><?php echo $row['Pro_name']; ?></td>
          <td class="text-center"><?php echo $row['Pro_salePrice']; ?></td>
          <td class="text-end"><?php echo $row['Return_type']; ?></td>
        </tr>
        <?php }?>
      </tbody>
    </table>
    <div class="line bg-secondary"></div>
    <table class="table table-borderless">
      <thead>
        <tr>
          <th scope="col" class="text-start">หมายเหตุ</th>
          <td class="text-end"><?php echo @$comment ?></td>
        </tr>
        <tr>
          <th scope="col" class="text-start">ราคาสุทธิ</th>
          <td class="text-end"><?php echo @$sum_price ?></td>
        </tr>
      </thead>
    </table>
    <div class="line bg-secondary"></div>
    <p class="thanks text-center">ขอบพระคุณที่ไว้ใจให้ TATC SHOP บริการคุณ</p>



  </div>
  <!-- endreceipt -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="js/main.js" defer></script>

</body>

</html>