<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thong tin ca nhan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<?php
    include("connection.php");
    session_start();
    if(isset($_SESSION['tendangnhap'])){
        $sql="SELECT * FROM thanhvien WHERE tendangnhap='".$_SESSION['tendangnhap']."'";
        $result = $conn->query($sql);
    }else{
        header("Location: dangnhap.html");
    }
?>
<body>
    <?php
        while($row = $result->fetch_assoc()){
            $idtv = $row['id'];
    ?>
    <div class="row">
        <div class="col">
            <img src="<?=$row['hinhanh']?>" height="100" width="100" >
        </div>
        <div class="col">
            <div class="row">
                <div class="col">Username</div>
                <div class="col">
                <?=$row['tendangnhap']?>
                </div>
            </div>
            <div class="row">
                <div class="col">Gioi tinh</div>
                <div class="col">
                <?=$row['gioitinh']?>
                </div>
            </div>
            <div class="row">
                <div class="col">So thich</div>
                <div class="col">
                <?=$row['sothich']?>
                </div>
            </div>
            <div class="row">
                <div class="col">Nghe nghiep</div>
                <div class="col">
                <?=$row['nghenghiep']?>
                </div>
            </div>
            <div class="row">
                <div><a href="themsanpham.html">Them san pham</a><div>
            </div>
            <div class="row">
                <div><a href="danhsachsanpham.php?id=<?=$row['id']?>">Danh sach san pham</a></div>
            </div>
            <div>
                <div><a href="logout.php">Dang Xuat</a><div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>