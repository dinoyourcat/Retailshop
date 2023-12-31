<?php
session_start();
include_once "../controller/connect.php";
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
  <link rel="stylesheet" href="../style/buy.css">
  <title>Buy</title>
</head>

<body>

  <!-- navbar -->
  <header>
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


  <div class="boxOne shadow p-3 mb-5 ">
    <p>ซื้อสินค้าเข้าร้าน</p>
    <h5>ข้อมูลการซื้อสินค้า</h5>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <div class="date row">
        <div class="col">

          <label class="mb-2" for="">วันที่</label>
          <input type="date" value="<?php echo date('Y-m-d') ?>" name="dateTime" readonly class="form-control"
            placeholder="" disabled>

        </div>
        <div class="col">
          <?php

            $sql = $conn->query("SELECT COUNT(Buy_id) + 1 AS count_id FROM buy");
            $row_c_s = mysqli_fetch_array($sql);
            $count = $row_c_s['count_id'];
            ?>
          <?php
            if (isset($_POST['reset'])) {
              session_destroy();
              session_unset();
            }
            ?>

          <label class="mb-2" for="">รหัสการซื้อ</label>
          <input type="text" class="form-control" name="Buy_id" value="B000<?php echo $count ?>" placeholder=""
            disabled>
        </div>
        <div class=" col">
          <label class="mb-2" for="">รหัสพนักงาน</label>
          <input type="text" class="form-control" name="Emp_id" value="<?php echo $empId; ?>" placeholder="" disabled>
        </div>
        <div class=" col">
          <label class="mb-2" for="">ชื่อ-นามสกุล</label>
          <input type="text" class="form-control " name="Emp_name" value="<?php echo $empName; ?>" placeholder=""
            disabled>
        </div>
      </div>

      <h5 class="detail">รายละเอียดการซื้อ</h5>
      <div class="search row">
        <div class="col">
          <!-- ค้นหาจากสินค้า -->
          <input type="text" class="form-control" style="width: 400px;" id="Search" name="Pro_id"
            placeholder="กรุณากรอกรหัสสินค้า">
          <button class="button btn btn-warning" onclick="Search()">ค้นหา</button>
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        </div>

        <table class="table  table-bordered text-center">
          <thead class="table table-bordered ">
            <tr>
              <th scope="col" style="color: #F3DEBA; background-color: #361500; border: #F3DEBA;">รหัสสินค้า</th>
              <th scope="col" style="color: #F3DEBA; background-color: #361500; border: #F3DEBA;">ชื่อสินค้า</th>
              <th scope="col" style="color: #F3DEBA; background-color: #361500; border: #F3DEBA;">ตัวแทนจำหน่าย</th>
              <th scope="col" style="color: #F3DEBA; background-color: #361500; border: #F3DEBA;">ราคาต่อหน่วย</th>
              <th scope="col" style="color: #F3DEBA; background-color: #361500; border: #F3DEBA;">จำนวน</th>
              <th scope="col" style="color: #F3DEBA; background-color: #361500; border: #F3DEBA;">ราคารวม</th>
              <th scope="col" style="color: #F3DEBA; background-color: #361500; border: #F3DEBA;">Action</th>
            </tr>
          </thead>
          <tbody">
            <tr>
              <th style="color: #361500;"></th>
              <td style="color: #361500;"></td>
              <td style="color: #361500;"></td>
              <td style="color: #361500;"></td>
              <td class="" style="color: #361500;">
                <input type="text" class="form-control" style="width: 100px; align-content:center;" placeholder="">
              </td>
              <td style="color: #361500;"></td>
              <td>
                <button type="button" class="button btn btn-outline-primary">เพิ่มสินค้า</button>
              </td>
              </tbody>
        </table>
        <table class="table  table-bordered text-center">
          <thead class="table table-bordered ">
            <tr>
              <th scope="col" style="color: #F3DEBA; background-color: #361500; border: #F3DEBA;">ตัวแทนจำหน่าย</th>
              <th scope="col" style="color: #F3DEBA; background-color: #361500; border: #F3DEBA;">รหัสสินค้า</th>
              <th scope="col" style="color: #F3DEBA; background-color: #361500; border: #F3DEBA;">ชื่อสินค้า</th>
              <th scope="col" style="color: #F3DEBA; background-color: #361500; border: #F3DEBA;">จำนวน</th>
              <th scope="col" style="color: #F3DEBA; background-color: #361500; border: #F3DEBA;">Action</th>
            </tr>
          </thead>
          <tbody">
            <tr>
              <th style="color: #361500;"></th>
              <td style="color: #361500;"></td>
              <td style="color: #361500;"></td>
              <td style="color: #361500;"></td>
              <td>
                <!-- Modal แก้ไข-->
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                  data-bs-target="#exampleModal2" data-bs-whatever="@fat"><i class="bi bi-pencil-square"></i></button>
                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลสั่งซื้อสินค้า</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body text-start">
                        <form>
                          <div class="mb-3">
                            <label for="" class="col-form-label">ตัวแทนจำหน่าย :</label>
                            <input type="text" class="form-control" id="" disabled>
                          </div>
                          <div class="mb-3">
                            <label for="" class="col-form-label">รหัสสินค้า :</label>
                            <input type="text" class="form-control" id="" disabled>
                          </div>
                          <div class="mb-3">
                            <label for="" class="col-form-label">ชื่อสินค้า :</label>
                            <input type="text" class="form-control" id="" disabled>
                          </div>
                          <div class="mb-3">
                            <label for="" class="col-form-label">จำนวน :</label>
                            <input type="text" class="form-control" id="">
                          </div>

                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">กลับ</button>
                        <button type="button" class="btn btn-primary">บันทึก</button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Button trigger modal -->
                <!-- Modal ปุ่มลบ-->
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                  data-bs-target="#staticBackdrop">
                  <i class="bi0 bi-trash3"></i>
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">ยืนยันการลบ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        คุณต้องการลบข้อมูลแถวนี้ใช่หรือไม่?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="button" class="btn btn-success">ยืนยัน</button>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            </tbody>
        </table>
    </form>

  </div>
  <div class="boxTwo shadow p-3 mb-5 ">
    <p>สรุปราคา</p>
    <div class="dateTwo row">
      <div class="col-auto">
        <label class="mb-2" for="">ราคาสุทธิ (บาท)</label>
        <input type="text" class="form-control" placeholder="">
      </div>
      <div class="col">
        <button type="button" class="button btn btn-success">ยืนยันการขาย</button>
        <button type="button" class="button btn btn-danger">ยกเลิก</button>
      </div>
    </div>
  </div>

  <script src="js/jquery.js"></script>
  <script>
  $(document).ready(function() {
    $('#btnradio1').click(function() {
      $()
    })
  })
  </script>
  <script>
  function Search() {
    var id = document.getElementById('Search').value;
    window.location = 'buy.php?ID=' + id;
  }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>

</body>

</html>
