<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<?php
include_once "../controller/product.php";
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="../style/employee.css">
  <title>Home</title>
</head>

<body>

  <div class="color1"></div>
  <div class="color2"></div>
  <div class="color3"></div>


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


  <div class="container-table">
    <div class="d-flex">
      <button class="btn btn-success" onclick="Search()">Search</button>
      <input type="text" class="form-control" id="Search" name="search" placeholder="search">
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <!-- <button class="btn btn-warning" type="submit" name="select_sc">Search</button> -->

        <script>
          function Search() {
            var id = document.getElementById('Search').value;
            window.location = 'product.php?ID=' + id;
          }
        </script>

        <!-- เพิ่มข้อมูลในตาราง -->
        <div class="add">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Add</button>


          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="" class="col-form-label">รหัสสินค้า :</label>
                    <input type="text" class="form-control" name="proid">
                  </div>

                  <div class="mb-3">
                    <label for="" class="col-form-label">ชื่อสินค้า :</label>
                    <input type="text" class="form-control" name="proname">
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">ราคาทุน :</label>
                    <input type="text" class="form-control" name="procost">
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">ราคาขาย:</label>
                    <input type="text" class="form-control" name="prosale">
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">ราคาสมาชิก:</label>
                    <input type="text" class="form-control" name="promemprice">
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">จำนวนในคลัง:</label>
                    <input type="text" class="form-control" name="proamount">
                  </div>

                  <div class="mb-3">
                    <label for="" class="col-form-label">ประเภทสินค้า :</label>
                    <?php
                    $sql_procat = "SELECT * FROM product_category";
                    $query_procat = $conn->query($sql_procat);
                    ?>
                    <select class="form-select" aria-label="Default select example" name="procat">
                      <option value="" selected disabled>-กรุณาเลือกประเภทสินค้า-</option>
                      <?php while ($value = mysqli_fetch_array($query_procat)) { ?>
                        <option value="<?php echo $value['Cate_id'] ?>"><?php echo $value['Cate_name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="" class="col-form-label">ชั้นวาง:</label>
                    <input type="text" class="form-control" name="proshelf">
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">ตัวแทนจัดจำหน่าย:</label>
                    <input type="text" class="form-control" name="supplier">
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">จำนวนจุดขาย:</label>
                    <input type="text" class="form-control" name="propoint">
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">สถานะ:</label>
                    <input type="text" class="form-control" name="prostatus">
                  </div>



                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="insert">Add</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </form>
    <!-- table -->
    <table class="table  table-bordered border-dark table-hover">
      <thead class="table-secondary  table-bordered border-dark text-black">
        <tr>
          <th scope="col">รหัสสินค้า</th>
          <th scope="col">ชื่อสินค้า</th>
          <th scope="col">ราคาทุน</th>
          <th scope="col">ราคาขาย</th>
          <th scope="col">ราคาสมาชิก</th>
          <th scope="col">จำนวนในคลัง</th>
          <th scope="col">ประเภทสินค้า</th>
          <th scope="col">ชั้นวาง</th>
          <th scope="col">ตัวแทนจัดจำหน่าย</th>
          <th scope="col">จำนวนจุดขาย</th>
          <th scope="col">สถานะ</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_GET['ID'])) {
          $Search_id = $_GET['ID'];
          $sql = "SELECT * FROM product WHERE Pro_id LIKE '%$Search_id%'";
        } else {
          $sql = "SELECT * FROM product";
        }

        $query = $conn->query($sql);

        while ($row = mysqli_fetch_array($query)) {

        ?>
          <tr>
            <td><?php echo $row['Pro_id']; ?></td>
            <td><?php echo $row['Pro_name']; ?></td>
            <td><?php echo $row['Pro_cost']; ?></td>
            <td><?php echo $row['Pro_salePrice']; ?></td>
            <td><?php echo $row['Pro_memberPrice']; ?></td>
            <td><?php echo $row['Pro_amount']; ?></td>
            <td><?php echo $row['Cate_id']; ?></td>
            <td><?php echo $row['Shelf_no']; ?></td>
            <td><?php echo $row['Sup_id']; ?></td>
            <td><?php echo $row['Point_ofSale']; ?></td>
            <td><?php echo $row['Pro_status']; ?></td>
            <td>

              <!-- <button class="btn btn-outline-success"><i class="bi bi-pencil-square"></i></button> -->

              <!-- popup 2 ต้องเปลี่ยนชื่อ -->
              <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#select_<?php echo $row['Pro_id']; ?>" data-bs-whatever="@fat"><i class="bi bi-pencil-square" name="select_<?php echo $row['Pro_id']; ?>"></i></button>
              <div class="modal fade" id="select_<?php echo $row['Pro_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลสินค้า</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                      <form method="POST">
                        <div class="mb-3">
                          <label for="" class="col-form-label">รหัสสินค้า :</label>
                          <input type="text" class="form-control" name="proid" value="<?php echo $row['Pro_id']; ?>">
                        </div>

                        <div class="mb-3">
                          <label for="" class="col-form-label">ชื่อสินค้า :</label>
                          <input type="text" class="form-control" name="proname" value="<?php echo $row['Pro_name']; ?>">
                        </div>
                        <div class="mb-3">
                          <label for="" class="col-form-label">ราคาทุน :</label>
                          <input type="text" class="form-control" name="procost" value="<?php echo $row['Pro_cost']; ?>">
                        </div>
                        <div class="mb-3">
                          <label for="" class="col-form-label">ราคาขาย:</label>
                          <input type="text" class="form-control" name="prosale" value="<?php echo $row['Pro_salePrice']; ?>">
                        </div>
                        <div class="mb-3">
                          <label for="" class="col-form-label">ราคาสมาชิก:</label>
                          <input type="text" class="form-control" name="promemprice" value="<?php echo $row['Pro_memberPrice']; ?>">
                        </div>
                        <div class="mb-3">
                          <label for="" class="col-form-label">จำนวนในคลัง:</label>
                          <input type="text" class="form-control" name="proamount" value="<?php echo $row['Pro_amount']; ?>">
                        </div>
                        <div class="mb-3">
                          <label for="" class="col-form-label">ประเภทสินค้า :</label>
                          <?php
                          $sql_procat = "SELECT * FROM product_category";
                          $query_procat = $conn->query($sql_procat);
                          ?>
                          <select class="form-select" aria-label="Default select example" name="proid">
                            <option value="" selected disabled>-กรุณาเลือกประเภทสินค้า-</option>
                            <?php while ($value = mysqli_fetch_array($query_procat)) { ?>
                              <option value="<?php echo $value['Cate_id'] ?>"><?php echo $value['Cate_name'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="" class="col-form-label">ชั้นวาง:</label>
                          <input type="text" class="form-control" name="proshelf" value="<?php echo $row['Shelf_no']; ?>">
                        </div>
                        <div class="mb-3">
                          <label for="" class="col-form-label">ตัวแทนจัดจำหน่าย:</label>
                          <input type="text" class="form-control" name="supplier" value="<?php echo $row['Sup_id']; ?>">
                        </div>
                        <div class="mb-3">
                          <label for="" class="col-form-label">จำนวนจุดขาย:</label>
                          <input type="text" class="form-control" name="propoint" value="<?php echo $row['Point_ofSale']; ?>">
                        </div>
                        <div class="mb-3">
                          <label for="" class="col-form-label">สถานะ:</label>
                          <input type="text" class="form-control" name="prostatus" value="<?php echo $row['Pro_status']; ?>">
                        </div>




                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">กลับ</button>
                          <button type="submit" class="btn btn-primary" name="update">บันทึก</button>
                        </div>


                    </div>

                  </div>
                </div>
              </div>
              </form>

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-danger" name="DEL_<?php echo $row['Pro_id']; ?>" data-bs-toggle="modal" data-bs-target="#DEL_<?php echo $row['Pro_id']; ?>">
                <i class="bi bi-trash3"></i>
              </button>

              <!-- Modal -->
              <form action="" method="post">
                <div class="modal fade" id="DEL_<?php echo $row['Pro_id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        <button type="submit" class="btn btn-success" name="delete" value="<?php echo $row['Pro_id']; ?>">ยืนยัน</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </td>
          <?php } ?>

          </tr>
      </tbody>
    </table>
  </div>

  </div>





  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
</body>

</html>