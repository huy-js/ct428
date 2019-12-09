<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sach san pham</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<?php
    include("connection.php");
    session_start();
    if(isset($_SESSION['tendangnhap'])){
        if(isset($_GET['id'])){
            $ma=$_GET['id'];
            echo $ma;
            $sql="select * from sanpham where idtv='$ma'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
    }else{
        header("Location: dangnhap.html");
    }
?>
<body>
    <?php
        if($result->num_rows >= 0){
            while($row = $result->fetch_assoc()){
    ?>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-1"><?=$row['idsp']?></div>
        <div class="col-md-1"><?=$row['tensp']?></div>
        <div class="col-md-1"><?=$row['giasp']?></div>
        <div class="col-md-4"><?=$row['hinhanhsp']?></div>
        <div class="col-md-1"><button type="button" class="btn btn-warning"><a href="xemchitiet.php?idsp=<?=$row['idsp']?>">Xem chi tiet</a></button></div>
        <div class="col-md-1"><button type="button" class="btn btn-warning"><a href="thaydoisanpham.php?idsp=<?=$row['idsp']?>">Sua</a></button></div>
        <div class="col-md-1"><button type="button" class="btn btn-danger"><a href="xoasanpham.php?idsp=<?=$row['idsp']?>">Xoa</a></button></div>
    </div>
    <?php
        }};
    ?>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>