<?php
include '../controller/connect.php';

if (isset($_POST['insert'])) {
  $provine_no = $_POST['prono'];
  $country_no = $_POST['countryno'];
  $province_id = $_POST['provinceid'];
  $province_group = $_POST['provincegroup'];
  $province_name = $_POST['provincename'];


  $sql = "INSERT INTO province VALUES('$province_id','$country_no','$province_group','$province_name','$provine_no');";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
  } else {
    echo "<script>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
  }
}

if (isset($_POST['update'])) {
  $provine_no = $_POST['prono'];
  $country_no = $_POST['countryno'];
  $province_id = $_POST['provinceid'];
  $province_group = $_POST['provincegroup'];
  $province_name = $_POST['provincename'];

  $sql = "UPDATE province SET Province_id='$province_id',Country_id='$country_no',Province_group_id='$province_group',Province_name='$province_name',Province_sorting='$provine_no'";
  $query = mysqli_query($conn, $sql);
  if (!$query) {
    echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
    header('location:province.php');
  } else {
    header('location:province.php');
  }
}
if (isset($_POST['delete'])) {
  $Province_id = $_POST['delete'];
  echo $Province_id;
  $sql = "SELECT * FROM province WHERE Province_id ='$Province_id'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($query);
  $sql = "DELETE FROM province WHERE Province_id='$Province_id'";
  $query = mysqli_query($conn, $sql);
  if (!$query) {
    echo "<script>alert('ไม่สามารถลบข้อมูลได้')</script>";
  } else {
    echo "<script>window.location.href='province.php'</script>";
  }
}
