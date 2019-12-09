<?php
    include("connection.php");
    session_start();

    if(isset($_SESSION['tendangnhap'])){
        if(isset($_POST['doisp'])){
            $idsp = $_POST['idsp'];
            $tensp = $_POST['tensp'];
            $giasp = $_POST['giasp'];
            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];
    
            $fileExt = explode('.', $fileName);
            // print_r($fileExt);
            $fileActualExt = strtolower(end($fileExt));
    
            $allowed = array('jpg','jpeg','png','pdf');
    
            $fileDestination = '';
            if(in_array($fileActualExt,$allowed)){
                if($fileError === 0){
                    if($fileSize < 1000000){
                        $fileNameNew = uniqid('',true).'.'.$fileActualExt;
                        $fileDestination = 'product/'.$fileNameNew;
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
            echo $idsp;
            $sql = "UPDATE `sanpham` SET `tensp`='$tensp',`giasp`='$giasp',`hinhanhsp`='$fileDestination' WHERE `sanpham`.`idsp`='$idsp'";
            $sql1 = "SELECT `idtv` FROM `sanpham` WHERE `sanpham`.`idsp`='$idsp'";
            $conn->query($sql);
            $result = $conn->query($sql1);
            $row = $result->fetch_assoc();
            $id = $row['idtv'];
            header("Location: danhsachsanpham.php?id=$id");
        }
    }else{
        header("Location: dangnhap.html");
    }
?>