<!DOCTYPE html>
<html lang="en">
<?php

include_once "../controller/supplier.php";
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="../style/customer.css">
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


  <div class="container-table">
    <div class="d-flex">
      <button class="btn btn-success" onclick="Search()">Search</button>
      <input type="text" class="form-control" id="Search" name="Search">
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <!-- <button class="btn btn-warning" type="submit" name="select_sc">Search</button> -->

        <script>
          function Search() {
            var id = document.getElementById('Search').value;
            window.location = 'supplier.php?ID=' + id;
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
                    <label for="" class="col-form-label">รหัสตัวแทน:</label>
                    <input type="text" class="form-control" name="supid">
                  </div>

                  <div class="mb-3">
                    <label for="" class="col-form-label">ชื่อ :</label>
                    <input type="text" class="form-control" name="supname">
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">ที่อยู่ :</label>
                    <input type="text" class="form-control" name="subaddress">
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">เบอร์โทร :</label>
                    <input type="text" class="form-control" name="subtell">
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">ชื่อผู้ติดต่อ :</label>
                    <input type="text" class="form-control" name="subcontact">
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">ชื่อจังหวัด :</label>
                    <?php
                    $sql_province = "SELECT * FROM province";
                    $query_province = $conn->query($sql_province);
                    ?>
                    <select class="form-select" aria-label="Default select example" name="provinceid">
                      <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
                      <?php while ($value = mysqli_fetch_array($query_province)) { ?>
                        <option value="<?php echo $value['Province_id'] ?>"><?php echo $value['Province_name'] ?></option>
                      <?php } ?>
                    </select>
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
          <th scope="col">รหัสตัวแทน</th>
          <th scope="col">ชื่อ</th>
          <th scope="col">ที่อยู่</th>
          <th scope="col">เบอร์โทร</th>
          <th scope="col">ชื่อผู้ติดต่อ</th>
          <th scope="col">จังหวัด</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_GET['ID'])) {
          $Search_id = $_GET['ID'];
          $sql = "SELECT * FROM supplier inner join province on supplier.province_id=province.province_id WHERE Sup_id LIKE '%$Search_id%'";
        } else {
          $sql = "SELECT * FROM supplier inner join province on supplier.province_id=province.province_id";
        }

        $query = $conn->query($sql);

        while ($row = mysqli_fetch_array($query)) {

        ?>

          <tr>
            <td><?php echo $row['Sup_id']; ?></td>
            <td><?php echo $row['Sup_name']; ?></td>
            <td><?php echo $row['Sup_address']; ?></td>
            <td><?php echo $row['Sup_tel']; ?></td>
            <td><?php echo $row['Contract_name']; ?></td>
            <td><?php echo $row['Province_name']; ?></td>
            <td>

              <!-- <button class="btn btn-outline-success"><i class="bi bi-pencil-square"></i></button> -->

              <!-- popup 2 ต้องเปลี่ยนชื่อ -->
              <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#select_<?php echo $row['Sup_id']; ?>" data-bs-whatever="@fat"><i class="bi bi-pencil-square" name="select_<?php echo $row['Sup_id']; ?>"></i></button>
              <div class="modal fade" id="select_<?php echo $row['Sup_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลลูกค้า</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                      <form method="POST">
                        <div class="mb-3">
                          <label for="" class="col-form-label">รหัสตัวแทน:</label>
                          <input type="text" class="form-control" name="supid" value="<?php echo $row['Sup_id']; ?>">
                        </div>

                        <div class="mb-3">
                          <label for="" class="col-form-label">ชื่อ :</label>
                          <input type="text" class="form-control" name="supname" value="<?php echo $row['Sup_name']; ?>">
                        </div>
                        <div class="mb-3">
                          <label for="" class="col-form-label">ที่อยู่ :</label>
                          <input type="text" class="form-control" name="subaddress" value="<?php echo $row['Sup_address']; ?>">
                        </div>
                        <div class="mb-3">
                          <label for="" class="col-form-label">เบอร์โทร :</label>
                          <input type="text" class="form-control" name="subtell" value="<?php echo $row['Sup_tel']; ?>">
                        </div>
                        <div class="mb-3">
                          <label for="" class="col-form-label">ชื่อผู้ติดต่อ :</label>
                          <input type="text" class="form-control" name="subcontact" value="<?php echo $row['Contract_name']; ?>">
                        </div>
                        <div class="mb-3">
                          <label for="" class="col-form-label">จังหวัด :</label>
                          <?php
                          $sql_previous = "SELECT * FROM supplier inner join province on supplier.province_id=province.province_id";
                          $query_previous = $conn->query($sql_previous);
                          $result = mysqli_fetch_array($query_previous);

                          $sql_province = "SELECT * FROM province";
                          $query_province = $conn->query($sql_province);
                          ?>
                          <select class="form-select" aria-label="Default select example" name="provinceid" value="<?php echo $row['Province_id']; ?>">
                            <option value="<?php echo $result['Province_id'] ?>"><?php echo $result['Province_name'] ?></option>
                            <?php while ($value = mysqli_fetch_array($query_province)) { ?>
                              <option value="<?php echo $value['Province_id'] ?>"><?php echo $value['Province_name'] ?></option>
                            <?php } ?>
                          </select>
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
              <button type="button" class="btn btn-outline-danger" name="DEL_<?php echo $row['Sup_id']; ?>" data-bs-toggle="modal" data-bs-target="#DEL_<?php echo $row['Sup_id']; ?>">
                <i class="bi bi-trash3"></i>
              </button>

              <!-- Modal -->
              <form action="" method="post">
                <div class="modal fade" id="DEL_<?php echo $row['Sup_id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        <button type="submit" class="btn btn-success" name="delete" value="<?php echo $row['Sup_id']; ?>">ยืนยัน</button>
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