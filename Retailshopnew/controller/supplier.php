<?php
include '../controller/connect.php';

if (isset($_POST['insert'])) {
  $sup_id = $_POST['supid'];
  $sub_name = $_POST['supname'];
  $sub_address = $_POST['subaddress'];
  $sub_tel = $_POST['subtell'];
  $sub_contact = $_POST['subcontact'];
  $province_id = $_POST['provinceid'];


  $sql = "INSERT INTO supplier VALUES('$sup_id','$sub_name','$sub_address','$sub_tel','$sub_contact','$province_id,');";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
  } else {
    echo "<script>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
  }
}

if (isset($_POST['update'])) {
  $sup_id = $_POST['supid'];
  $sub_name = $_POST['supname'];
  $sub_address = $_POST['subaddress'];
  $sub_tel = $_POST['subtell'];
  $sub_contact = $_POST['subcontact'];
  $province_id = $_POST['provinceid'];

  $sql = "UPDATE supplier SET Sup_name='$sub_name',Sup_address='$sub_address',Sup_tel='$sub_tel',Contract_name='$sub_contact',Province_id='$province_id' WHERE Sup_id='$sup_id'";
  $query = mysqli_query($conn, $sql);
  if (!$query) {
    echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
    header('location:supplier.php');
  } else {
    header('location:supplier.php');
  }
}
if (isset($_POST['delete'])) {
  $sup_id = $_POST['delete'];
  echo $sup_id;
  $sql = "SELECT * FROM supplier WHERE Sup_id ='$sup_id'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($query);
  $sql = "DELETE FROM supplier WHERE Sup_id='$sup_id'";
  $query = mysqli_query($conn, $sql);
  if (!$query) {
    echo "<script>alert('ไม่สามารถลบข้อมูลได้')</script>";
  } else {
    echo "<script>window.location.href='supplier.php'</script>";
  }
}
