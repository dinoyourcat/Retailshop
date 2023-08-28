<?php
include '../controller/connect.php';

if (isset($_POST['insert'])) {
  $shelf_no = $_POST['shelfno'];
  $shelf_name = $_POST['shelfname'];


  $sql = "INSERT INTO shelf VALUES('$shelf_no','$shelf_name');";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
  } else {
    echo "<script>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
  }
}

if (isset($_POST['update'])) {
  $shelf_no = $_POST['shelfno'];
  $shelf_name = $_POST['shelfname'];

  $sql = "UPDATE shelf SET Shelf_name='$shelf_name' WHERE Shelf_no='$shelf_no'";
  $query = mysqli_query($conn, $sql);
  if (!$query) {
    echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
    header('location:shelf.php');
  } else {
    header('location:shelf.php');
  }
}
if (isset($_POST['delete'])) {
  $shelf_no = $_POST['delete'];
  echo $shelf_no;
  $sql = "SELECT * FROM shelf WHERE Shelf_no ='$shelf_no'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($query);
  $sql = "DELETE FROM shelf WHERE Shelf_no='$shelf_no'";
  $query = mysqli_query($conn, $sql);
  if (!$query) {
    echo "<script>alert('ไม่สามารถลบข้อมูลได้')</script>";
  } else {
    echo "<script>window.location.href='shelf.php'</script>";
  }
}
