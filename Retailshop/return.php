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
  <link rel="stylesheet" href="style/return.css">
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

  <div class="boxOne shadow-lg p-3 mb-5 ">
    <p>คืนสินค้า</p>
    <h5>กรอกรหัสการขาย</h5>
    <div class="date row">
      <div class="col-auto">
        <label class="mb-2" for="">รหัสการขาย</label>
        <input type="text" class="form-control" placeholder="">
      </div>
      <div class="col-auto">
        <button type="button" class="button btn btn-outline-warning">ค้นหา</button>
      </div>
      <div class="col-auto">
        <label class="mb-2" for="">วันที่</label>
        <input type="text" class="form-control" placeholder="">
      </div>
      <div class=" col-auto">
        <label class="mb-2" for="">รหัสลูกค้า</label>
        <input type="text" class="form-control" placeholder="">
      </div>
      <div class="col-auto">
        <label class="mb-2" for="">ชื่อ-นามสกุล</label>
        <input type="text" class="form-control " placeholder="">
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
      <tbody>
        <tr>
          <th></th>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><input type="text" class="form-control" id=""></td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="boxTwo shadow p-3 mb-5 ">
    <p>ยืนยันการคืนสินค้า</p>
    <div class="dateTwo row">
      <div class="col-auto">
        <label class="mb-2" for="">หมายเหตุการคืนสินค้า</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="col-auto">
        <button type="button" class="btnsuccess btn btn-success">ยืนยันการขาย</button>
        <button type="button" class="btndanger btn btn-danger">ยกเลิก</button>
      </div>
      <div class="col-auto">
        <button type="button" class="btnprint btn btn-dark"><i class="bi bi-filetype-pdf"></i> พิมพ์ใบคืนสินค้า</button>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>

</body>

</html>
