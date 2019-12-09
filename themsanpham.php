<?php
    include("connection.php");
    session_start();

    if(isset($_SESSION['tendangnhap'])){
        $sql="SELECT * FROM thanhvien WHERE tendangnhap='".$_SESSION['tendangnhap']."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $idtv = $row['id'];
        // echo $row['id'];
        if(isset($_POST['luusp'])){
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
    
            $sql = "INSERT INTO sanpham(tensp,giasp,hinhanhsp,idtv) VALUES ('$tensp', $giasp, '$fileDestination', $idtv)";
            $conn->query($sql);
            header("Location: danhsachsanpham.php");
            $_SESSION['idtv']=$idtv;
        }
    }else{
        header("Location: dangnhap.html");
    }
?>