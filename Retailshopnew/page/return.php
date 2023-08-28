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
  <link rel="stylesheet" href="../style/return.css">
  <title>Return</title>
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

  <div class="boxOne shadow-lg p-3 mb-5 ">
    <p>คืนสินค้า</p>
    <h5>กรอกรหัสการขาย</h5>
    <?php
      if(isset($_POST['search'])){
        $saleId = $_POST['Sale_id'];
        $_SESSION['Sale_id'] = $saleId;
        $sql = $conn->query("SELECT * FROM sale LEFT JOIN sale_detail ON sale.Sale_id = sale_detail.Sale_id LEFT JOIN customer ON sale.Cust_id = customer.Cust_id WHERE sale.Sale_id = '$saleId'");
        $row = mysqli_fetch_array($sql);
      }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="date row">
      <div class="col-auto">
        <label class="mb-2" for="">รหัสการขาย</label>
        <input type="text" name="Sale_id" value="<?php echo @$row['Sale_id'] ?>" class="form-control" placeholder="">
      </div>
      <div class="col-auto">
        <button type="submit" name="search" class="button btn btn-outline-warning">ค้นหา</button>
      </div>
      <div class="col-auto">
        <label class="mb-2" for="">วันที่</label>
        <input type="text" readonly value="<?php echo @$row['Sale_date'] ?>" class="form-control" placeholder="">
      </div>
      <div class=" col-auto">
        <label class="mb-2" for="">รหัสลูกค้า</label>
        <input type="text" readonly value="<?php echo @$row['Cust_id'] ?>" class="form-control" placeholder="">
      </div>
      <div class="col-auto">
        <label class="mb-2" for="">ชื่อ-นามสกุล</label>
        <input type="text" readonly readonly value="<?php echo @$row['Cust_name']." ".@$row['Cust_lastName'] ?>" class="form-control " placeholder="">
      </div>
    </div>

    <h5 class="detail">รายการสินค้าที่ต้องการคืน</h5>

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
          <th scope="col">จำนวนการคืน</th>
        </tr>
      </thead>
      <?php
          if(isset($_POST['submit'])){
            $saleId = $_POST['Sale_id'];
            $_SESSION['sale'] = $saleId;
            $dateTime = date('Y-m-d');
            $comment = $_POST['comment'];
            $sql = $conn->query("SELECT * FROM sale_detail WHERE Sale_id = '$saleId'");
            while($row = mysqli_fetch_array($sql)){
              $return = "return";
              $pro_id = $row['Pro_id'];
              
              $value = $_POST[$return.$pro_id];
              if($value != ""){
                $insert = $conn->query("INSERT INTO re_turn VALUES('$saleId','$pro_id','$value','$dateTime','$comment','2') ");
                
                $sql2 = $conn->query("SELECT * FROM product WHERE Pro_id = '$pro_id'");
                $row_pro = mysqli_fetch_array($sql2);
                $sum = $row_pro['Pro_amount'] + $value;
                $upd = $conn->query("UPDATE product SET Pro_amount = '$sum' WHERE Pro_id = '$pro_id'");
              }
              if($value == ""){

              }
              
            }
           
            // echo $saleId;
            // $sql = $conn->query("SELECT * FROM sale_detail LEFT JOIN product ON sale_detail.Pro_id = product.Pro_id WHERE sale_detail.Sale_id = '$saleId'");
            // while($row = mysqli_fetch_array($sql)){
            //   echo $return;
            // }

           

            
          }
          $i = 1;
          @$saleId = $_SESSION['Sale_id'];
          $sql = $conn->query("SELECT * FROM sale_detail LEFT JOIN product ON sale_detail.Pro_id = product.Pro_id WHERE sale_detail.Sale_id = '$saleId'");
          while($row = mysqli_fetch_array($sql)){
        ?>
      <tbody>
        <tr>
          <input type="hidden" name="Sale_id" value="<?php echo $saleId ?>">
          <th><?php echo $i++ ?></th>
          <td><?php echo $row['Pro_name'] ?></td>
          <td><?php echo $row['Amount'] ?></td>
          <td><?php echo $row['Pro_cost'] ?></td>
          <td><?php echo $row['Discount'] ?></td>
          <td><?php echo $row['Sale_price'] ?></td>
          <td><input type="text" class="form-control" name="return<?php echo $row['Pro_id'] ?>"></td>

        </tr>
      </tbody>
      <?php
        }
      ?>
    </table>
  </div>

  <div class="boxTwo shadow p-3 mb-5 ">
    
    <p>ยืนยันการคืนสินค้า</p>
    <div class="dateTwo row">
      <div class="col-auto">
        <label class="mb-2" for="">หมายเหตุการคืนสินค้า</label>
        <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="col-auto">
        <button type="submit" name="submit" class="btnsuccess btn btn-success">ยืนยันการคืนสินค้า</button>
        <button type="button" class="btndanger btn btn-danger">ยกเลิก</button>
      </div>
      <?php
            ?>
      <div class="col-auto">
        <a href='returnform.php?Sale_id=<?php echo $_SESSION['sale'] ?>' class="btnprint btn btn-dark"><i class="bi bi-filetype-pdf"></i> พิมพ์ใบเสร็จ</a>
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