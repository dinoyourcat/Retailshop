<?php
 include 'connect.php';

 if (isset($_POST['insert'])){
    $emp_ID = $_POST['empid'];
    $emp_user = $_POST['empuser'];
    $emp_pass = $_POST['emppassword'];
    $emp_name = $_POST['empname'];
    $emp_status = $_POST['empstatus'];
    $emp_type = $_POST['emptype'];

    $sql = "INSERT INTO employee VALUES('$emp_ID','$emp_user','$emp_pass','$emp_name',$emp_status,$emp_type);";
    $query = mysqli_query($conn,$sql);
    if ($query) {
      echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
    }
    else {
      echo "<script>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
    }
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="style/employee.css">
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
                    <a href="#">จัดการข้อมูลจังหวัด</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="#">จัดการข้อมูลพนักงาน</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="#">จัดการข้อมูลตัวแทนจำหน่าย</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="#">จัดการข้อมูลลูกค้า</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="#">จัดการข้อมูลสินค้า</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="#">จัดการข้อมูลประเภทสินค้า</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="#">จัดการข้อมูลชั้นวางสินค้า</a>
                  </li>
                </ul>
              </div>
            </li>

            <li class="nav-link" style="--i: 1.1s">
              <a href="#">การจัดการสินค้า<i class="fas fa-caret-down"></i></a>
              <div class="dropdown">
                <ul>
                  <li class="dropdown-link">
                    <a href="#">ขายสินค้า</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="#">ซื้อสินค้าเข้าร้าน</a>
                  </li>
                  <li class="dropdown-link">
                    <a href="#">คืนสินค้า</a>
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
    <form class="d-flex" role="search" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
      <input type="text" class="form-control" id="inputPassword" value="Search">
      <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
      <button class="btn btn-warning" type="submit">Search</button>
      <div class="add">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
          data-bs-whatever="@fat">Add</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="" class="col-form-label">เลขที่พนักงาน :</label>
                  <input type="text" class="form-control" id="" name="empid">
                </div>
                <div class="mb-3">
                  <label for="" class="col-form-label">Username :</label>
                  <input type="text" class="form-control" id="" name="empuser">
                </div>
                <div class="mb-3">
                  <label for="" class="col-form-label">Password :</label>
                  <input type="text" class="form-control" id="" name="emppassword">
                </div>
                <div class="mb-3">
                  <label for="" class="col-form-label">ชื่อ-นามสกุล :</label>
                  <input type="text" class="form-control" id="" name="empname">
                </div>
                <div class="mb-3">
                  <label for="" class="col-form-label">สถานะของพนักงาน :</label>
                  <select class="form-select" aria-label="Default select example" name="empstatus">
                    <option selected>โปรดเลือก</option>
                    <option value="1">อนุญาติให้ใช้ระบบได้</option>
                    <option value="2">ไม่อนุญาติให้เข้าใช้ระบบ</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="" class="col-form-label">ประเภทของพนักงาน :</label>
                  <select class="form-select" aria-label="Default select example" name="emptype">
                    <option selected>โปรดเลือก</option>
                    <option value="1">ประเภทของพนักงาน</option>
                    <option value="2">ไม่อนุญาติให้เข้าใช้ระบบ</option>
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
    </form>

    <!-- table -->
    <table class="table  table-bordered border-primary table-hover">
      <thead class="table-info  table-bordered border-primary text-black">
        <tr>
          <th scope="col">เลขที่พนักงาน</th>
          <th scope="col">Username</th>
          <th scope="col">Password</th>
          <th scope="col">ชื่อ-นามสกุล</th>
          <th scope="col">สถานะของพนักงาน</th>
          <th scope="col">ประเภทของพนักงาน</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            $sql = "SELECT * FROM employee";
            $query = $conn->query($sql);
            
            while ($row = mysqli_fetch_array($query)){
          ?>
        <tr>
          <td><?php echo $row['Emp_id'];?></td>
          <td><?php echo $row['User_name'];?></td>
          <td><?php echo $row['Pass_word'];?></td>
          <td><?php echo $row['Emp_name'];?></td>
          <td><?php echo $row['Emp_status'];?></td>
          <td><?php echo $row['Emp_type'];?></td>
          <td>

            <!-- <button class="btn btn-outline-success"><i class="bi bi-pencil-square"></i></button> -->

            <!-- popup 2 ต้องเปลี่ยนชื่อ -->
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal2"
              data-bs-whatever="@fat"><i class="bi bi-pencil-square"></i></button>

            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลพนักงาน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label for="" class="col-form-label">เลขที่พนักงาน :</label>
                        <input type="text" class="form-control" id="">
                      </div>
                      <div class="mb-3">
                        <label for="" class="col-form-label">Username :</label>
                        <input type="text" class="form-control" id="">
                      </div>
                      <div class="mb-3">
                        <label for="" class="col-form-label">Password :</label>
                        <input type="text" class="form-control" id="">
                      </div>
                      <div class="mb-3">
                        <label for="" class="col-form-label">ชื่อ-นามสกุล :</label>
                        <input type="text" class="form-control" id="">
                      </div>
                      <div class="mb-3">
                        <label for="" class="col-form-label">สถานะของพนักงาน :</label>
                        <select class="form-select" aria-label="Default select example">
                          <option selected>โปรดเลือก</option>
                          <option value="1">อนุญาติให้ใช้ระบบได้</option>
                          <option value="2">ไม่อนุญาติให้เข้าใช้ระบบ</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="" class="col-form-label">ประเภทของพนักงาน :</label>
                        <select class="form-select" aria-label="Default select example">
                          <option selected>โปรดเลือก</option>
                          <option value="1">ประเภทของพนักงาน</option>
                          <option value="2">ไม่อนุญาติให้เข้าใช้ระบบ</option>
                        </select>
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
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
              data-bs-target="#staticBackdrop">
              <i class="bi bi-trash3"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
              aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
          <?php }?>

        </tr>
      </tbody>
    </table>
  </div>

  </div>





  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
</body>

</html>