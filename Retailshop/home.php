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
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="style/homestyle.css">
  <title>Home</title>
</head>

<body>
  <section>
    <div class="color"></div>
    <div class="color"></div>
    <div class="color"></div>
    <header>
      <div class="container">
        <input type="checkbox" name="" id="check">

        <div class="logo-container">
          <h3 class="logo">Retial<span>Shop</span></h3>
        </div>

        <div class="nav-btn">
          <div class="nav-links">
            <ul>

              <li class="nav-link" style="--i: .85s">
                <a href="#">จัดการข้อมูลทั่วไป</a>
                <div class="dropdown">
                  <ul>
                    <li class="dropdown-link">
                      <a href="province.php">จัดการข้อมูลจังหวัด</a>
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

    <div class="row">
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <img src="images/dollar.png" alt="" class="rounded float-end " style="width:80px;">
            <h5 class="card-title">Total Sales</h5>
            <p class="card-text">$1,650,000</p>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <img src="images/group.png" alt="" class="rounded float-end " style="width:80px;">
            <h5 class="card-title">Site visit</h5>
            <p class="card-text">1,001,025</p>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <img src="images/search.png" alt="" class="rounded float-end " style="width:80px;">
            <h5 class="card-title">Searches</h5>
            <p class="card-text">250,125</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row2">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Dashboard</h5>
            <p class="card-text">Dashboard</p>
          </div>
        </div>
      </div>
    </div>

  </section>

</body>

</html>