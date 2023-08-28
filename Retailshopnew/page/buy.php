<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="../style/buy.css">
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
  <div class="boxOne shadow p-3 mb-5 ">
    <p>ซื้อสินค้าเข้าร้าน</p>
    <h5>ข้อมูลการซื้อสินค้า</h5>
    <div class="date row">
      <div class="col">

        <label class="mb-2" for="">วันที่</label>
        <input type="date" value="<?php echo date('Y-m-d') ?>" name="dateTime" readonly class="form-control" placeholder="">

      </div>
      <div class="col">

        <label class="mb-2" for="">รหัสการซื้อ</label>
        <input type="text" class="form-control" placeholder="" disabled>


      </div>
      <div class=" col">
        <label class="mb-2" for="">รหัสพนักงาน</label>
        <input type="text" class="form-control" placeholder="" disabled>
      </div>
      <div class=" col">
        <label class="mb-2" for="">ชื่อ-นามสกุล</label>
        <input type="text" class="form-control " placeholder="" disabled>
      </div>
    </div>

    <h5 class="detail">รายละเอียดการซื้อ</h5>
    <div class="btn-group mb-4" role="group" aria-label="">
      <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
      <label class="btn btn-outline-warning" style="color: #361500;" for="btnradio1">ค้นหาจากรหัสหรือชื่อสินค้า</label>

      <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
      <label class="btn btn-outline-warning" style="color: #361500;" for="btnradio2">ค้นหาจากรหัสหรือชื่อตัวแทนจำหน่าย</label>
    </div>

    <div class="search row">
      <div class="col mt-2">
        <!-- ค้นหาจากสินค้า -->
        <div class="col" id="productSearch">
          <label class="" for=""></label>
          <input type="text" class="form-control " style="width: 400px;" placeholder="กรุณากรอกรหัสหรือชื่อสินค้า">
          <button type="button" class="button btn btn-outline-warning">ค้นหา</button>
        </div>

        <!-- ค้นหาจากตัวแทน -->
        <style>
          #agentSearch {
            display: none;
          }
        </style>
        <div class="col" id="agentSearch">
          <label class="" for=""></label>
          <input type="text" class="form-control" style="width: 400px;" placeholder="กรุณากรอกรหัสหรือชื่อตัวแทนจำหน่าย">
          <button type="button" class="button btn btn-outline-warning">ค้นหา</button>
        </div>
      </div>
    </div>

    <script>
      const productRadio = document.getElementById('btnradio1');
      const agentRadio = document.getElementById('btnradio2');
      const productSearchDiv = document.getElementById('productSearch');
      const agentSearchDiv = document.getElementById('agentSearch');

      productRadio.addEventListener('click', () => {
        productSearchDiv.style.display = 'block';
        agentSearchDiv.style.display = 'none';
      });

      agentRadio.addEventListener('click', () => {
        productSearchDiv.style.display = 'none';
        agentSearchDiv.style.display = 'block';
      });
    </script>

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
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@fat"><i class="bi bi-pencil-square"></i></button>
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              <i class="bi0 bi-trash3"></i>
            </button>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>

</body>

</html>