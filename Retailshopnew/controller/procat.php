<?php
include '../controller/connect.php';

if (isset($_POST['insert'])) {
  $procat_id = $_POST['procatid'];
  $procat_name = $_POST['procatname'];


  $sql = "INSERT INTO product_category VALUES('$procat_id','$procat_name');";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
  } else {
    echo "<script>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
  }
}

if (isset($_POST['update'])) {
  $procat_id = $_POST['procatid'];
  $procat_name = $_POST['procatname'];

  $sql = "UPDATE product_category SET Cate_name='$procat_name' WHERE Cate_id='$procat_id'";

  $query = mysqli_query($conn, $sql);
  if (!$query) {
    echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
    header('location:procat.php');
  } else {
    header('location:procat.php');
  }
}
if (isset($_POST['delete'])) {
  $procat_id = $_POST['delete'];
  echo $procat_id;
  $sql = "SELECT * FROM product_category WHERE Cate_id ='$procat_id'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($query);
  $sql = "DELETE FROM product_category WHERE Cate_id='$procat_id'";
  $query = mysqli_query($conn, $sql);
  if (!$query) {
    echo "<script>alert('ไม่สามารถลบข้อมูลได้')</script>";
  } else {
    echo "<script>window.location.href='procat.php'</script>";
  }
}
