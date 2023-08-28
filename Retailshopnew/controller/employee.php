<?php
include '../controller/connect.php';

if (isset($_POST['insert'])) {
  $emp_ID = $_POST['empid'];
  $emp_user = $_POST['empuser'];
  $emp_pass = $_POST['emppassword'];
  $emp_name = $_POST['empname'];
  $emp_status = $_POST['empstatus'];
  $emp_type = $_POST['emptype'];

  $sql = "INSERT INTO employee VALUES('$emp_ID','$emp_user','$emp_pass','$emp_name',$emp_status,$emp_type);";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
  } else {
    echo "<script>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
  }
}

if (isset($_POST['update'])) {
  $emp_ID = $_POST['empid'];
  $emp_user = $_POST['empusername'];
  $emp_pass = $_POST['emppassword'];
  $emp_name = $_POST['empname'];
  $emp_status = $_POST['empstatus'];
  $emp_type = $_POST['emptype'];

  $sql = "UPDATE Employee SET User_name='$emp_user',Pass_word='$emp_pass',Emp_name='$emp_name',Emp_status='$emp_status',Emp_type='$emp_type'WHERE Emp_id='$emp_ID'";
  $query = mysqli_query($conn, $sql);
  if (!$query) {
    echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้')</script>";
    header('location:employee.php');
  } else {
    header('location:employee.php');
  }
}
if (isset($_POST['delete'])) {
  $emp_ID = $_POST['delete'];
  echo $emp_ID;
  $sql = "SELECT * FROM Employee WHERE Emp_id ='$emp_ID'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($query);
  $sql = "DELETE FROM Employee WHERE Emp_id='$emp_ID'";
  $query = mysqli_query($conn, $sql);
  if (!$query) {
    echo "<script>alert('ไม่สามารถลบข้อมูลได้')</script>";
  } else {
    echo "<script>window.location.href='employee.php'</script>";
  }
}
