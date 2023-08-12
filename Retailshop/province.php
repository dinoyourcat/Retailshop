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
  <link rel="stylesheet" href="style/pvstyle.css">
  <title>Home</title>
</head>

<body>
  <section>
    <div class="color"></div>
    <div class="color"></div>
    <div class="color"></div>
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
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <div class="container2">

      <table class="table caption-top">
        <caption>List of province</caption>
        <thead class="table-primary">
          <tr>
            <th scope="col">ลำดับ</th>
            <th scope="col">รหัสประเทศ</th>
            <th scope="col">รหัสจังหวัด</th>
            <th scope="col">กลุ่มจังหวัด</th>
            <th scope="col">ชื่อจังหวัด</th>
            <th scope="cols">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>test</td>
            <td>
              <button type="button" class="btn btn-outline-primary">Edit</button>
              <button type="button" class="btn btn-outline-primary">Delete</button>
            </td>


          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>test</td>
            <td>
              <button type="button" class="btn btn-outline-primary">Edit</button>
              <button type="button" class="btn btn-outline-primary">Delete</button>

            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>test</td>
            <td>
              <button type="button" class="btn btn-outline-primary">Edit</button>
              <button type="button" class="btn btn-outline-primary">Delete</button>

            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </section>

</body>

</html>