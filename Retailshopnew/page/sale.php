<!DOCTYPE html>
<html lang="en">


<?php

include "../controller/sale.php";

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="../style/sale.css">
  <title>Sale</title>
</head>

<body>

  <header>
    <!-- navbar -->
    <div class="container">
      <input type="checkbox" name="" id="check">

      <div class="logo-container">
        <h3 class="logo">Retial<span>Shop</span></h3>
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
  <?php
  session_start();
  $action_button = false;
  if (isset($_POST['search'])) {
    $custId = $_POST['Cust_id'];
    $custName = $_POST['Cust_name'];
    // $_SESSION['Cust_id'] = $custId;
    // $_SESSION['Cust_name'] = $custName;
    if ($custId != "") {
      $sql = "SELECT * FROM customer WHERE Cust_id = '$custId'";
    } else if ($custId == "") {
      if ($custName != "") {
        $sql1 = "SELECT * FROM customer WHERE Cust_name LIKE '%$custName%'";
        $result = $conn->query($sql1);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows == 1) {
          $sql = "SELECT * FROM customer WHERE Cust_name LIKE '%$custName%'";
        } else {
          $sql = "SELECT * FROM customer WHERE Cust_lastName LIKE '%$custName%'";
        }
      }
    }

    $query = $conn->query($sql);
    $row = mysqli_fetch_array($query);
  }

  $sql = $conn->query("SELECT COUNT(Cust_id) + 1 AS count_id FROM sale");
  $row_c_s = mysqli_fetch_array($sql);
  $count = $row_c_s['count_id'];
  if (isset($_POST['startSale'])) {
    $custId = $_POST['Cust_id'];
    echo $custId;
    $dateTime = $_POST['dateTime'];
    if ($custId == "") {
      echo $custId;
    } else {
      $insert = $conn->query("INSERT INTO sale VALUES('SA00$count','$custId','$dateTime','','','0')");
    }
  }
  ?>
  <?php
  if (isset($_POST['reset'])) {
    session_destroy();
    session_unset();
  }
  ?>
  <div class="boxOne shadow-lg p-3 mb-5 ">
    <p>ขายสินค้า</p>
    <h5>ข้อมูลลูกค้า</h5>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <div class="date row">
        <div class=" col">
          <label class="mb-2" for="">รหัสลูกค้า</label>
          <input type="text" class="form-control" value="<?php echo @$row['Cust_id'] ?>" name="Cust_id" placeholder="">
        </div>
        <div class="col1 col">
          <label class="mb-2" for="">ชื่อ-นามสกุล</label>
          <input type="text" class="form-control" value="<?php echo @$row['Cust_name'] . " " . @$row['Cust_lastName'] ?>" name="Cust_name" placeholder="">
        </div>
        <div class=" col">
          <button type="submit" class="button btn btn-outline-warning" name="search">ค้นหา</button>
        </div>
      </div>
      <h5 style="margin-top: 10px;">ข้อมูลการขาย</h5>
      <div class="date row">
        <div class="col">
          <label class="mb-2" for="">วันที่</label>
          <input type="date" value="<?php echo date('Y-m-d') ?>" name="dateTime" readonly class="form-control" placeholder="">
        </div>
        <div class=" col1 col">
          <label class="mb-2" for="">รหัสการขาย</label>
          <input type="text" class="form-control" name="Sale_id" readonly value="<?php echo "SA00$count" ?>" placeholder="">
        </div>
        <div class=" col">
          <button type="submit" class="button btn btn-outline-warning" name="startSale">เริ่มการขาย</button>
        </div>
      </div>
      <?php

      if (isset($_POST['search2'])) {
        $pro_id = $_POST['Pro_id'];
        $_SESSION['pro_id'] = $pro_id;
        $sql = $conn->query("SELECT * FROM product WHERE Pro_id = '$pro_id'");
        $row_pro = mysqli_fetch_array($sql);
      }
      if (isset($_POST['cal'])) {
        $pro_id = $_SESSION['pro_id'];
        $sql = $conn->query("SELECT * FROM product WHERE Pro_id = '$pro_id'");
        $row = mysqli_fetch_array($sql);
        $amount = $_POST['amount'];
        $_SESSION['Pro_amount'] = $amount;
        $discount = $_POST['discount'];
        $_SESSION['discount'] = $discount;
        $sum = ((float)$amount * (float)$row['Pro_salePrice']) - (float)$discount;
      }
      // if (isset($_POST['add'])) {
      //   $action_button = true;
      //   $sql_desc = $conn->query("SELECT * FROM sale ORDER BY Sale_id DESC");
      //   $row_desc = mysqli_fetch_array($sql_desc);
      //   $saleId = $row_desc['Sale_id'];

      //   $pro_id = $_POST['Pro_id'];
      //   $sql = $conn->query("SELECT * FROM product WHERE Pro_id = '$pro_id'");
      //   $rowe = mysqli_fetch_array($sql);
      //   $Pro_amount = $rowe['amount'];
      //   $amount = $_POST['Pro_amount'];
      //   $new_amount = $Pro_amount - $amount;
      //   $update_sql = "UPDATE product SET Pro_amount = '$new_amount' WHERE Pro_id = '$pro_id'";
      //   $conn->query($update_sql);

      //   $discount = $_POST['discount'];
      //   $sale = $row['Pro_salePrice'];
      //   $sum = ($sale * $amount);
      //   $insert = "INSERT INTO sale_detail VALUES('$saleId','$pro_id','$amount','$sum','$discount')";
      //   $result = $conn->query($insert);

      //   @$total = $sum + $total;
      //   $_SESSION['total'] = $total;
      // }
      if (isset($_POST['add'])) {
        $action_button = true;

        // Fetch the latest sale ID
        $sql_desc = $conn->query("SELECT * FROM sale ORDER BY Sale_id DESC");
        $row_desc = mysqli_fetch_array($sql_desc);
        $saleId = $row_desc['Sale_id'];

        $pro_id = $_POST['Pro_id'];

        // Fetch product details
        $sql = $conn->query("SELECT * FROM product WHERE Pro_id = '$pro_id'");
        $rowe = mysqli_fetch_array($sql);

        if ($rowe) {
          $Pro_amount = $rowe['Pro_amount'];
          $amount = $_POST['amount'];
          $new_amount = $Pro_amount - $amount;

          // Update product amount
          $update_sql = "UPDATE product SET Pro_amount = '$new_amount' WHERE Pro_id = '$pro_id'";
          $conn->query($update_sql);

          $discount = $_POST['discount'];
          $sale = $rowe['Pro_salePrice']; // Use the fetched product's sale price
          $sum = ($sale * $amount);

          // Insert sale detail
          $insert = "INSERT INTO sale_detail VALUES('$saleId','$pro_id','$amount','$sum','$discount')";
          $result = $conn->query($insert);

          // Update total
          @$total = $sum + $total; // You might need to initialize $total before using it
          $_SESSION['total'] = $total;

          echo "Data added successfully.";
        } else {
          echo "Product not found.";
        }
      }


      ?>
      <h5 class="detail">รายละเอียดการขาย</h5>
      <div class="date row">
        <div class="col">
          <input type="hidden" name="Sale_id" value="<?php echo @$_SESSION['Sale_id'] ?>">
          <label class="mb-2" for="">รหัสสินค้า</label>
          <input type="text" name="Pro_id" value="<?php echo @$row['Pro_id'] ?>" class="form-control" placeholder="">
        </div>
        <div class="col">
          <button name="search2" type="submit" class="button btn btn-outline-warning">ค้นหา</button>
        </div>
        <div class=" col1 col">
          <label class="mb-2" for="">ชื่อสินค้า</label>
          <input type="text" class="form-control" name="Pro_name" value="<?php echo @$row_pro['Pro_name'] ?>">
        </div>
        <div class=" col">
          <label class="mb-2" for="">ราคาต่อหน่วย (บาท)</label>
          <input type="text" class="form-control" name="Pro_cost" value="<?php echo @$row_pro['Pro_salePrice'] ?>">
        </div>
        <div class=" col">
          <label class="mb-2" for="">จำนวน</label>
          <input type="text" class="form-control" value="<?php echo @$_SESSION['Pro_amount'] ?>" name="amount">
        </div>
        <div class=" col">
          <label class="mb-2" for="">ส่วนลด (บาท)</label>
          <input type="text" class="form-control" value="<?php echo @$_SESSION['discount'] ?>" name="discount">
        </div>
        <div class="col">
          <button name="cal" type="submit" class="button btn btn-outline-warning">คำนวณ</button>
        </div>
        <div class=" col">
          <label class="mb-2" for="">ราคารวม (บาท)</label>
          <input type="text" class="form-control" name="total" value="<?php echo @$sum ?>">
        </div>
        <div class=" col">
          <button type="submit" name="add" class="button btn btn-outline-warning">เพิ่มสินค้า</button>
        </div>
      </div>
      <!-- table -->
      <table class="table  table-bordered border-secondary table-hover">
        <thead class="table-secondary table-bordered border-secondary text-black">
          <tr>
            <th scope="col">รหัสสินค้า</th>
            <th scope="col">ชื่อสินค้า</th>
            <th scope="col">จำนวน</th>
            <th scope="col">ราคาต่อหน่วย</th>
            <th scope="col">ลดราคา</th>
            <th scope="col">ราคารวม</th>
          </tr>
        </thead>
        <?php
        $i = 1;
        @$sql = $conn->query("SELECT * FROM sale_detail LEFT JOIN product ON sale_detail.Pro_id = product.Pro_id WHERE Sale_id = '$saleId'");
        while ($row = mysqli_fetch_array($sql)) {
          $sum = $row['Amount'] * $row['Pro_salePrice'] - $row['Discount'];
        ?>
          <tbody>
            <tr>
              <th><?php echo $i++; ?></th>
              <td><?php echo $row['Pro_name'] ?></td>
              <td><?php echo $row['Amount'] ?></td>
              <td><?php echo $row['Pro_salePrice'] ?></td>
              <td><?php echo $row['Discount']; ?></td>
              <td><?php echo $sum ?></td>
            </tr>
          </tbody>
        <?php

        }      ?>
      </table>
  </div>

  <div class="boxTwo shadow p-3 mb-5 ">
    <p>สรุปราคา</p>
    <div class="dateTwo row">
      <?php
      $sql_desc = $conn->query("SELECT * FROM sale ORDER BY Sale_id DESC");
      $row_desc = mysqli_fetch_array($sql_desc);
      $saleId = $row_desc['Sale_id'];

      if ($action_button) {
        $sql = $conn->query("SELECT SUM(Sale_price) AS Total, SUM(Discount) AS dis FROM sale_detail WHERE Sale_id = '$saleId'");
        while ($row = mysqli_fetch_array($sql)) {
          // $pro_id = $row['Pro_id'];
          // $sql = $conn->query("SELECT * FROM sale_detail LEFT JOIN product ON sale_detail.Pro_id = product.Pro_id WHERE ")
          // $discount = $discount + $row['Discount'];
          // $sum = $sum + ($row['Amount'] * $row['Pro_salePrice']);
          $_SESSION['sum'] = $row['Total'];
          $_SESSION['discount'] = $row['dis'];
          $_SESSION['total'] = $row['Total'] - $row['dis'];
        }
      }


      ?>
      <?php
      if (isset($_POST['submit1'])) {
        $income = $_POST['income'];
        $sum = $_POST['sum'];
        $discount = $_POST['discount'];
        $total = $_POST['total'];

        $out = (int)$income - (int)$total;
        $_SESSION['out'] = $out;
        // $upd = $conn->query("UPDATE sale SET Net_price = '$total', Net_discount = '$discount', Sale_status = '1' WHERE Sale_id = '$saleId'" );
      }
      if (isset($_POST['submit2'])) {
        $income = $_POST['income'];
        $sum = $_POST['sum'];
        $discount = $_POST['discount'];
        $total = $_POST['total'];

        $out = (int)$income - (int)$total;

        $sql_desc = $conn->query("SELECT * FROM sale ORDER BY Sale_id DESC");
        $row_desc = mysqli_fetch_array($sql_desc);
        $saleId = $row_desc['Sale_id'];

        $upd = $conn->query("UPDATE sale SET Net_price = '$total', Net_discount = '$discount', Sale_status = '1' WHERE Sale_id = '$saleId'");

        session_unset();
      }
      ?>
      <div class="col-auto">
        <label class="mb-2" for="">ราคารวม (บาท)</label>
        <input type="text" name="sum" value="<?php echo @$_SESSION['sum'] ?>" class="form-control">
      </div>
      <div class="col-auto">
        <label class="mb-2" for="">ส่วนลด (บาท)</label>
        <input type="text" name="dis" value="<?php echo @$_SESSION['discount'] ?>" class="form-control">
      </div>
      <div class="col-auto">
        <label class="mb-2" for="">ราคาสุทธิ (บาท)</label>
        <input type="text" name="total" value="<?php echo @$_SESSION['total'] ?>" class="form-control">
      </div>

      <div class="col-auto">
        <label class="mb-2" for="">รับเงิน (บาท)</label>
        <input type="text" name="income" class="form-control">
      </div>
      <div class="col-auto">
        <label class="mb-2" for="">เงินทอน (บาท)</label>
        <input type="text" value="<?php echo @$_SESSION['out'] ?>" class="form-control">
      </div>

      <div class="col">
        <button type="submit" name="submit1" class="btnsuccess btn btn-success">คำนวน</button>
        <button type="submit" name="submit2" class="btnsuccess btn btn-success">ยืนยันการขายสินค้า</button>
        <button type="submit" name="reset" class="btndanger btn btn-danger">ยกเลิก</button>
      </div>
      <?php
      if (isset($_POST['link'])) {
        $sql_desc = $conn->query("SELECT * FROM sale ORDER BY Sale_id DESC");
        $row_desc = mysqli_fetch_array($sql_desc);
        $saleId = $row_desc['Sale_id'];

        $_SESSION['s'] = $saleId;
        echo "<script>window.location.href='reciept.php'</script>";
      }
      ?>
      <div class="col-auto">
        <button type="submit" name="link" class="btnprint btn btn-dark"><i class="bi bi-filetype-pdf"></i> พิมพ์ใบเสร็จ</button>
      </div>
    </div>
  </div>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>

</body>

</html>