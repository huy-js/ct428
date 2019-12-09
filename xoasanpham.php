<?php
    include("connection.php");
    session_start();
    if(isset($_SESSION['tendangnhap'])){
        $idsp = $_GET['idsp'];
        $sql = "SELECT idtv FROM sanpham WHERE idsp='$idsp'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $id = $row['idtv'];
        $sql1 = "DELETE FROM sanpham WHERE idsp='$idsp'";
        $result1 = $conn->query($sql1);
        if($result == TRUE && $result1 == TRUE){
            echo "<script type='text/javascript'>alert('Xoa thanh cong');</script>";
            header("Location: danhsachsanpham.php?id=$id");
        }else{
            echo "<script type='text/javascript'>alert('Xay ra loi');</script>";
        }
    }
?>