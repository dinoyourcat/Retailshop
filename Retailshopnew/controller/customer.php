<?php
include '../controller/connect.php';

if (isset($_POST['insert'])) {
  $cus_id = $_POST['cusid'];
  $cus_name = $_POST['cusname'];
  $cus_lastname = $_POST['cuslastname'];
  $cus_address = $_POST['cusaddress'];
  $province_id = $_POST['provinceid'];
  $cus_tel = $_POST['custel'];
  $date = $_POST['date'];
  $cusa_status = $_POST['cusstatus'];

  $sql = "INSERT INTO customer VALUES('$cus_id','$cus_name','$cus_lastname','$cus_address','$province_id','$cus_tel',$date,' $cusa_status');";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
  } else {
    echo "<script>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
  }
}

if (isset($_POST['update'])) {
  $cus_id = $_POST['cusid'];
  $cus_name = $_POST['cusname'];
  $cus_lastname = $_POST['cuslastname'];
  $cus_address = $_POST['cusaddress'];
  $province_id = $_POST['provinceid'];
  $cus_tel = $_POST['custel'];
  $date = $_POST['date'];
  $cusa_status = $_POST['cusstatus'];

  $sql = "UPDATE customer SET Cust_id='$cus_id',Cust_name='$cus_name',Cust_lastName='$cus_lastname',Cust_address='$cus_address',Province_id='$province_id',Cust_tel='$cus_tel',Admit_date='$date',Cust_status='$cusa_status'WHERE Cust_id='$cus_id'";
  $query = mysqli_query($conn, $sql);
  if (!$query) {
    echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
    header('location:customer.php');
  } else {
    header('location:customer.php');
  }
}
if (isset($_POST['delete'])) {
  $cus_id = $_POST['delete'];
  echo $cus_id;
  $sql = "SELECT * FROM customer WHERE Cust_id ='$cus_id'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($query);
  $sql = "DELETE FROM customer WHERE Cust_id='$cus_id'";
  $query = mysqli_query($conn, $sql);
  if (!$query) {
    echo "<script>alert('ไม่สามารถลบข้อมูลได้')</script>";
  } else {
    echo "<script>window.location.href='customer.php'</script>";
  }
}
