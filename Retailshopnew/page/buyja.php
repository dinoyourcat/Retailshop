<!DOCTYPE html>
<html lang="en">
<?php
include '../controller/connect.php';
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="../style/buyja.css">
  <title>Buy</title>
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
                    <a href="employee.php">จัดการข้อมูลลูกค้า</a>
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
  if (isset($_POST['search'])) {
    $empId = $_POST['Emp_id'];
    $empName = $_POST['Emp_name'];
    $_SESSION['Emp_id'] = $empId;
    $_SESSION['Emp_name'] = $empName;
    if ($empId != "") {
      $sql = "SELECT * FROM employee WHERE Emp_id = '$empId'";
    } else if ($empId == "") {
      if ($empName != "") {
        $sql = "SELECT * FROM employee WHERE Emp_name LIKE '%$empName%'";
      }
    }

    $query = $conn->query($sql);
    $row = mysqli_fetch_array($query);
  }
  ?><form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="boxOne shadow-lg p-3 mb-5 ">
      <p>ซื้อสินค้าเข้าร้าน</p>
      <h5>ข้อมูลลูกค้า</h5>

      <div class="date row">
        <div class="col">
          <label class="mb-2" for="">รหัสลูกค้า</label>
          <input type="text" class="form-control" name="Emp_id" value="<?php echo @$row['Emp_id'] ?>" placeholder="">
        </div>
        <div class="col1 col">
          <label class="mb-2" for="">ชื่อ-นามสกุล</label>
          <input type="text" class="form-control" name="Emp_name" value="<?php echo @$row['Emp_name'] . " " . @$row['Cust_lastName'] ?>" placeholder="">
        </div>
        <div class="col">
          <button type="submit" name="search" class="button btn btn-outline-warning">ค้นหา</button>
        </div>
        <h5>ข้อมูลการซื้อสินค้า</h5>
        <div class="row">
          <div class="col">
            <?php
            $count = 1;
            $sql = $conn->query("SELECT * FROM buy");
            while ($row = mysqli_fetch_array($sql)) {
              $count = $count + 1;
            }
            if (isset($_POST['startBuy'])) {
              $empId = $_SESSION['Emp_id'];
              $sql = $conn->query("SELECT * FROM employee WHERE Emp_id ='$empId'");
              $row = mysqli_fetch_array($sql);
              $empName = $row['Emp_name'];
              $buyId = $_POST['Buy_id'];
              $dateTime = $_POST['dateTime'];

              $insert = $conn->query("INSERT INTO buy VALUES('$buyId','$empId','$dateTime','$dateTime','$dateTime','0.00','$empName','$empName','0')");
            }

            ?>
            <label class="mb-2" for="">วันที่</label>
            <input type="date" value="<?php echo date('Y-m-d') ?>" name="dateTime" readonly class="form-control" placeholder="">
          </div>
          <div class=" col1 col">
            <label class="mb-2" for="">รหัสการซื้อ</label>
            <input type="text" class="form-control" name="Buy_id" value="B000<?php echo $count ?>" placeholder="">
          </div>
          <div class="col">
            <button name="startBuy" type="submit" class="button btn btn-outline-warning">เริ่มการซื้อ</button>
          </div>
        </div>
        <?php
        if (isset($_POST['searchPro'])) {
          $proId = $_POST['Pro_id'];
          $_SESSION['pro_id'] = $proId;
          $sql = $conn->query("SELECT * FROM product WHERE Pro_id = '$proId'");
          $row = mysqli_fetch_array($sql);
        }
        if (isset($_POST['cal'])) {

          $pro_id = $_SESSION['pro_id'];

          $sql = $conn->query("SELECT * FROM product WHERE Pro_id = '$pro_id'");
          $row = mysqli_fetch_array($sql);
          $amount = $_POST['amount'];
          // $_SESSION['amount'] = $amount;

          $_SESSION['Pro_amount'] = $amount;
          $sum = $amount * $row['Pro_salePrice'];
        }

        if (isset($_POST['add'])) {
          $sql_desc = $conn->query("SELECT * FROM buy ORDER BY Buy_id DESC");
          $row_desc = mysqli_fetch_array($sql_desc);
          $buyId = $row_desc['Buy_id'];

          $pro_id = $_POST['Pro_id'];
          $sql = $conn->query("SELECT * FROM product WHERE Pro_id = '$pro_id'");
          $row = mysqli_fetch_array($sql);
          $amount = $_POST['amount'];
          $sale = $row['Pro_salePrice'];
          $sum = ($sale * $amount);
          $insert = "INSERT INTO buy_detail VALUES('$pro_id','$buyId','$amount','$sum')";
          $result = $conn->query($insert);
          $inAmount = $amount + $row['Pro_amount'];
          $upd = $conn->query("UPDATE product SET Pro_amount = '$inAmount' WHERE Pro_id = '$pro_id'");
          session_unset();
        }
        ?>
        <h5 class="detail">รายละเอียดการซื้อ</h5>
        <div class="row">
          <div class="col">
            <label class="mb-2" for="">รหัสสินค้า</label>
            <input type="text" name="Pro_id" value="<?php echo @$row['Pro_id'] ?>" class="form-control" placeholder="">
          </div>
          <div class=" col">
            <button type="submit" class="button btn btn-outline-warning" name="searchPro">ค้นหา</button>
          </div>
          <div class=" col1 col">
            <label class="mb-2" for="">ชื่อสินค้า</label>
            <input type="text" class="form-control" name="Pro_name" value="<?php echo @$row['Pro_name'] ?>">
          </div>

          <div class=" col">
            <label class="mb-2" for="">ราคาต่อหน่วย (บาท)</label>
            <input type="text" class="form-control" name="Pro_cost" value="<?php echo @$row['Pro_salePrice'] ?>">
          </div>
          <div class=" col">
            <label class="mb-2" for="">จำนวน</label>
            <input type="text" class="form-control" value="<?php echo @$_SESSION['Pro_amount'] ?>" name="amount">
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
              <th scope="col">ราคารวม</th>
            </tr>
          </thead>
          <?php
          $i = 1;
          @$sql = $conn->query("SELECT * FROM buy_detail LEFT JOIN product ON buy_detail.Pro_id = product.Pro_id WHERE Buy_id = '$buyId'");
          while ($row = mysqli_fetch_array($sql)) {
            $sum = $row['Amount'] * $row['Pro_salePrice'];
            @$total = $sum + $total;
            $_SESSION['total'] = $total;
            // $total = $sum + $total;
            // $_SESSION['price_total'] = $total;
          ?>
            <tbody>
              <tr>
                <th><?php echo $i++; ?></th>
                <td><?php echo $row['Pro_name'] ?></td>
                <td><?php echo $row['Amount'] ?></td>
                <td><?php echo $row['Pro_salePrice'] ?></td>
                <td><?php echo $sum ?></td>
              </tr>
            </tbody>
          <?php
          }

          ?>
        </table>
      </div>



      <div class="boxTwo shadow p-3 mb-5 ">
        <p>สรุปราคา</p>
        <?php
        if (isset($_POST['submit1'])) {

          $sql_desc = $conn->query("SELECT * FROM buy ORDER BY Buy_id DESC");
          $row_desc = mysqli_fetch_array($sql_desc);
          $buyId = $row_desc['Buy_id'];
          @$total = $_SESSION['total'];
          $upd = $conn->query("UPDATE buy SET Net_price = '$total', Buy_status = '1' WHERE Buy_id = '$buyId'");
          session_unset();
        }
        if (isset($_POST['reset'])) {
          session_unset();
        }

        ?>
        <div class="dateTwo row">
          <div class="col-auto">
            <label class="mb-2" for="">ราคารวม (บาท)</label>
            <input type="text" class="form-control" value="<?php echo @$_SESSION['total'] ?>" placeholder="">
          </div>
          <div class="col-auto">
            <label class="mb-2" for="">ราคาสุทธิ (บาท)</label>
            <input type="text" class="form-control" value="<?php echo @$_SESSION['total'] ?>" placeholder="">
          </div>

          <div class="col">
            <button type="submit" name="submit1" class="button btn btn-success">ยืนยันการขาย</button>
            <button type="submit" name="reset" class="button btn btn-danger">ยกเลิก</button>
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