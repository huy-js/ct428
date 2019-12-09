<?php
    include("connection.php");
    session_start();
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $gioitinh = $_POST['gioitinh'];
        $sothich = "";
        if(!empty($_POST['sothich'])){
                foreach($_POST['sothich'] as $selected){
                $sothich = $sothich."".$selected.".";
            }
        }
        $nghenghiep = $_POST['nghenghiep'];

        
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        print_r($fileExt);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg','jpeg','png','pdf');

        $fileDestination = '';
        if(in_array($fileActualExt,$allowed)){
            if($fileError === 0){
                if($fileSize < 1000000){
                    $fileNameNew = uniqid('',true).'.'.$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    // header("Location: index.html?uploadsuccess");
                }else{
                    echo "Your file is too big";
                }
            }else{
                echo "There was an error uploading your file";
            }
        }else{
            echo "You cannot upload files of this type";
        }
        // echo $username." ".$password." ".$gioitinh." ".$sothich." ".$nghenghiep;
        $sql = "INSERT INTO thanhvien(tendangnhap, matkhau, hinhanh, gioitinh, nghenghiep, sothich) VALUES ('$username','$password','$fileDestination','$gioitinh','$nghenghiep','$sothich')";
        // echo $sql;
        $conn->query($sql);
        
        $_SESSION['tendangnhap']=$username;
        header('Location: thongtincanhan.php');
    }
?>