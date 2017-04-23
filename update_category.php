<?php 
  // Lấy dữ liệu được chọn ra list
  $conn = mysqli_connect("localhost","root","","db");
  $cat_name = $_POST["cat_name"];
  $sql = "SELECT * FROM tbl_category WHERE cat_name == $cat_name";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
  	$row = mysqli_fetch_assoc($result);
  }
  else echo "Loi hoac ton tai >= 2 cat_name giong nhau";


  // Cập nhập lại dữ liệu


  
  // Update vào cơ sở dư liệu và load lại bảng

?>