<?php
   include("connection.php");
   session_start();
   if(isset($_POST['dangnhap'])){
      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM thanhvien WHERE tendangnhap='$username' AND matkhau='$password'";
      $result = $conn->query($sql);
      if($result->num_rows == 1){
         $_SESSION['tendangnhap']=$username;
         echo "<script type='text/javascript'>alert('Dang nhap thanh cong');location = 'thongtincanhan.php'</script>";
      }else{
         echo "<script type='text/javascript'>alert('Mat khau hoac tai khoan khong dung');location = 'dangnhap.html'</script>";
         
      }
   }
?>