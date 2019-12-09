<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thay doi thong tin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<?php
    include("connection.php");
    session_start();
    if(isset($_SESSION['tendangnhap'])){
        $idsp = $_GET['idsp'];
        $sql = "SELECT * FROM sanpham WHERE idsp=$idsp";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }else{
        header("Location: dangnhap.html");
    }
?>
<body>
    <form action="thaydoisanpham_xuly.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">ID san pham</div>
            <div class="col-md-3">
                <input type="number" id="temp" name='idsp' readonly value=<?php echo $idsp?>>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">Ten san pham</div>
            <div class="col-md-3">
                <input type="text" name="tensp" value=<?php echo $row['tensp']?>>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">Gia san pham</div>
            <div class="col-md-3">
                <input type="number" name="giasp" value=<?php echo $row['giasp']?>>
            </div>
            <div class="col-md-3"></div>
        </div>
        
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">Hinh anh san pham</div>
            <div class="col-md-3">
                <input type="text" value=<?php echo $row['hinhanhsp']?>>
                <input type="file" name="file" id="file" value=<?php echo $row['hinhanhsp']?>>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <button class="btn" class="btn btn-warning" name="doisp">Doi thong tin</button>
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>