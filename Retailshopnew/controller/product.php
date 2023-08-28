<?php
include '../controller/connect.php';

if (isset($_POST['insert'])) {
  $pro_id = $_POST['proid'];
  $pro_name = $_POST['proname'];
  $pro_cost = $_POST['procost'];
  $pro_salePrice = $_POST['prosale'];
  $pro_memberPrice = $_POST['promemprice'];
  $pro_amount = $_POST['proamount'];
  $cate_id = $_POST['procat'];
  $shelf_no = $_POST['proshelf'];
  $sup_id = $_POST['supplier'];
  $point_ofSale = $_POST['propoint'];
  $pro_status = $_POST['prostatus'];

  $sql = "INSERT INTO product VALUES('$pro_id','$pro_name','$pro_cost','$pro_salePrice','$pro_memberPrice','$pro_amount','$cate_id',' $shelf_no',' $sup_id',' $point_ofSale',' $pro_status');";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
  } else {
    echo "<script>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
  }
}

if (isset($_POST['update'])) {
  $pro_id = $_POST['proid'];
  $pro_name = $_POST['proname'];
  $pro_cost = $_POST['procost'];
  $pro_salePrice = $_POST['prosale'];
  $pro_memberPrice = $_POST['promemprice'];
  $pro_amount = $_POST['proamount'];
  $cate_id = $_POST['Cate_id'];
  $shelf_no = $_POST['proshelf'];
  $sup_id = $_POST['supplier'];
  $point_ofSale = $_POST['propoint'];
  $pro_status = $_POST['prostatus'];

  $sql = "UPDATE product SET Pro_id='$pro_id',Pro_name='$pro_name',Pro_cost='$pro_cost',Pro_salePrice='$pro_salePrice',Pro_memberPrice='$pro_memberPrice',Pro_amount='$pro_amount',Cate_id='$cate_id',Shelf_no='$shelf_no',Sup_id='$sup_id',Point_ofSale='$point_ofSale',Pro_status='$pro_status'WHERE Pro_id='$pro_id'";
  $query = mysqli_query($conn, $sql);
  if (!$query) {
    echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
    header('location:product.php');
  } else {
    header('location:product.php');
  }
}
if (isset($_POST['delete'])) {
  $pro_id = $_POST['delete'];
  echo $pro_id;
  $sql = "SELECT * FROM product WHERE Pro_id ='$pro_id'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($query);
  $sql = "DELETE FROM product WHERE Pro_id='$pro_id'";
  $query = mysqli_query($conn, $sql);
  if (!$query) {
    echo "<script>alert('ไม่สามารถลบข้อมูลได้')</script>";
  } else {
    echo "<script>window.location.href='product.php'</script>";
  }
}
