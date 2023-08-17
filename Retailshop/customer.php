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

  <!-- table -->

  <div class="container-table">
    <form class="d-flex" role="search">
      <input type="file" class="form-control" id="inputGroupFile02">
      <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
      <button class="btn btn-warning" type="submit">Upload</button>
      <div class="add">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
          data-bs-whatever="@fat">Add</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลลูกค้า</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="mb-3">
                    <label for="" class="col-form-label">รหัสลูกค้า :</label>
                    <input type="text" class="form-control" id="">
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">ชื่อ :</label>
                    <input type="text" class="form-control" id="">
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">นามสกุล :</label>
                    <input type="text" class="form-control" id="">
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">ที่อยู่ :</label>
                    <input type="text" class="form-control" id="">
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">ชื่อจังหวัด :</label>
                    <select class="form-select" aria-label="Default select example">
                      <option selected>โปรดเลือก</option>
                      <option value="1">อนุญาติให้ใช้ระบบได้</option>
                      <option value="2">ไม่อนุญาติให้เข้าใช้ระบบ</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">เบอร์โทร :</label>
                    <input type="text" class="form-control" id="">
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">วันที่ :</label>
                    <input type="date" class="form-control" id="">
                  </div>
                  <div class="mb-3">
                    <label for="" class="col-form-label">สถานะ :</label>
                    <select class="form-select" aria-label="Default select example">
                      <option selected>โปรดเลือก</option>
                      <option value="1">0</option>
                      <option value="2">1</option>
                    </select>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">กลับ</button>
                <button type="button" class="btn btn-primary">เพิ่ม</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </form>
    <table class="table  table-bordered border-primary table-hover">
      <thead class="table-info  table-bordered border-primary text-black">
        <tr>
          <th scope="col">รหัสลูกค้า</th>
          <th scope="col">ชื่อ</th>
          <th scope="col">นามสกุล</th>
          <th scope="col">ที่อยู่</th>
          <th scope="col">ชื่อจังหวัด</th>
          <th scope="col">เบอร์โทร</th>
          <th scope="col">วันที่</th>
          <th scope="col">สถานะ</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Null</td>
          <td>Null</td>
          <td>Null</td>
          <td>Null</td>
          <td>Null</td>
          <td>Null</td>
          <td>Null</td>
          <td>Null</td>
          <td>
            <button class="btn btn-outline-success"><i class="bi bi-pencil-square"></i></button>
            <button class="btn btn-outline-danger"><i class="bi bi-trash3"></i></button>
          </td>
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